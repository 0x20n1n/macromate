<template>
  <div class="p-6 bg-transparent">
    <form @submit.prevent="submitForm" class="space-y-6">
      <!-- Gender Selection -->
      <div>
        <label class="text-white font-medium mb-2 block">Gender</label>
        <div class="flex space-x-4">
          <div class="flex items-center">
            <input type="radio" id="male" v-model="form.gender" value="male" class="form-check-input mr-2">
            <label for="male" class="text-white">Male</label>
          </div>
          <div class="flex items-center">
            <input type="radio" id="female" v-model="form.gender" value="female" class="form-check-input mr-2">
            <label for="female" class="text-white">Female</label>
          </div>
        </div>
        <p v-if="errors.gender" class="text-red-300 text-sm mt-1">{{ errors.gender[0] }}</p>
      </div>

      <!-- Age Input -->
      <div>
        <label for="age" class="text-white font-medium mb-2 block">Age</label>
        <input type="number" id="age" v-model="form.age" class="form-control" min="1" max="120">
        <p v-if="errors.age" class="text-red-300 text-sm mt-1">{{ errors.age[0] }}</p>
      </div>

      <!-- Height Input -->
      <div>
        <label for="height" class="text-white font-medium mb-2 block">Height (cm)</label>
        <input type="number" id="height" v-model="form.height" class="form-control" step="0.1" min="1" max="300">
        <p v-if="errors.height" class="text-red-300 text-sm mt-1">{{ errors.height[0] }}</p>
      </div>

      <!-- Weight Input -->
      <div>
        <label for="weight" class="text-white font-medium mb-2 block">Weight (kg)</label>
        <input type="number" id="weight" v-model="form.weight" class="form-control" step="0.1" min="1" max="500">
        <p v-if="errors.weight" class="text-red-300 text-sm mt-1">{{ errors.weight[0] }}</p>
      </div>

      <!-- Activity Level -->
      <div>
        <label for="activity_id" class="text-white font-medium mb-2 block">Activity Level</label>
        <select id="activity_id" v-model="form.activity_id" class="form-control">
          <option value="">Select your activity level</option>
          <option v-for="activity in activities" :key="activity.id" :value="activity.id">
            {{ activity.name }} - {{ activity.description }}
          </option>
        </select>
        <p v-if="errors.activity_id" class="text-red-300 text-sm mt-1">{{ errors.activity_id[0] }}</p>
      </div>

      <!-- Formula Selection -->
      <div>
        <label class="text-white font-medium mb-2 block">Calculation Formula</label>
        <div class="flex space-x-4">
          <div class="flex items-center">
            <input type="radio" id="mifflin_st_jeor" v-model="form.formula" value="mifflin_st_jeor" class="form-check-input mr-2">
            <label for="mifflin_st_jeor" class="text-white">Mifflin-St Jeor</label>
          </div>
          <div class="flex items-center">
            <input type="radio" id="katch_mcardle" v-model="form.formula" value="katch_mcardle" class="form-check-input mr-2">
            <label for="katch_mcardle" class="text-white">Katch-McArdle</label>
          </div>
        </div>
        <p v-if="errors.formula" class="text-red-300 text-sm mt-1">{{ errors.formula[0] }}</p>
      </div>

      <!-- Body Fat Percentage (shows only when Katch-McArdle is selected) -->
      <div v-if="form.formula === 'katch_mcardle'">
        <label for="body_fat" class="text-white font-medium mb-2 block">Body Fat Percentage (%)</label>
        <input type="number" id="body_fat" v-model="form.body_fat" class="form-control" step="0.1" min="1" max="100">
        <p v-if="errors.body_fat" class="text-red-300 text-sm mt-1">{{ errors.body_fat[0] }}</p>
      </div>

      <!-- Main Error Message -->
      <div v-if="formError" class="goal-box loss">
        <p class="text-red-300">{{ formError }}</p>
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit" class="btn btn-primary w-full py-2 px-4 rounded" :disabled="isLoading">
          <span v-if="isLoading">Calculating...</span>
          <span v-else>Calculate</span>
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: {
    initialActivities: {
      type: Array,
      default: () => [],
    },
    onCalculationCompleted: {
      type: Function,
      default: null
    }
  },
  data() {
    return {
      form: {
        gender: 'male',
        age: null,
        height: null,
        weight: null,
        activity_id: '',
        formula: 'mifflin_st_jeor',
        body_fat: null,
      },
      errors: {},
      formError: null,
      isLoading: false,
      activities: [],
    };
  },
  mounted() {
    if (this.initialActivities && this.initialActivities.length > 0) {
      this.activities = this.initialActivities;
    } else {
      this.fetchActivities();
    }
  },
  methods: {
    async fetchActivities() {
      try {
        const response = await fetch('/api/activities');
        if (!response.ok) {
          throw new Error(`Failed to fetch activities: ${response.status} ${response.statusText}`);
        }
        const data = await response.json();
        this.activities = data;
      } catch (error) {
        console.error('Error fetching activities:', error);
      }
    },
    submitForm() {
      // Reset errors
      this.errors = {};
      this.formError = null;
      
      // Check for empty values
      if (!this.form.age) {
        this.errors.age = ['Please enter your age'];
        return;
      }
      
      if (!this.form.height) {
        this.errors.height = ['Please enter your height'];
        return;
      }
      
      if (!this.form.weight) {
        this.errors.weight = ['Please enter your weight'];
        return;
      }
      
      if (!this.form.activity_id) {
        this.errors.activity_id = ['Please select your activity level'];
        return;
      }
      
      if (this.form.formula === 'katch_mcardle' && !this.form.body_fat) {
        this.errors.body_fat = ['Please enter your body fat percentage'];
        return;
      }
      
      // Set loading state
      this.isLoading = true;
      
      // Make the AJAX request
      fetch('/calculate', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(this.form),
      })
      .then(response => {
        if (!response.ok) {
          if (response.status === 422) {
            // Validation errors
            return response.json().then(data => {
              this.errors = data.errors || {};
              throw new Error('Validation failed');
            });
          } else if (response.status === 500) {
            throw new Error('Server error occurred. Please try again later.');
          } else {
            throw new Error(`Request failed with status: ${response.status}`);
          }
        }
        return response.json();
      })
      .then(data => {
        console.log('Calculation successful:', data);
        
        // Try multiple approaches to update results
        // 1. Use the callback from props if available
        if (typeof this.onCalculationCompleted === 'function') {
          this.onCalculationCompleted(data);
        }
        
        // 2. Use the global function if available
        try {
          if (typeof window.showCalculationResults === 'function') {
            window.showCalculationResults(data);
          }
        } catch (error) {
          console.warn('Error using global function:', error);
        }
        
        // 3. Emit the event for parent components
        this.$emit('calculation-completed', data);
        
        // 4. Dispatch a DOM event as the final fallback
        document.dispatchEvent(new CustomEvent('calculation-completed', { detail: data }));
      })
      .catch(error => {
        console.error('Error:', error);
        if (error.message !== 'Validation failed') {
          this.formError = error.message || 'An error occurred while processing your request.';
        }
      })
      .finally(() => {
        this.isLoading = false;
      });
    },
  },
};
</script> 