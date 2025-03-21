<template>
  <div v-if="result" class="mt-8 results-card">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800 dark:text-white">Your Results</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Main Results -->
      <div class="results-card">
        <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Calorie Information</h3>
        <div class="space-y-4">
          <div>
            <p class="text-sm text-gray-500 dark:text-gray-400">Basal Metabolic Rate (BMR)</p>
            <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ Math.round(result.bmr) }} calories/day</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">The calories your body needs at complete rest</p>
          </div>
          
          <div>
            <p class="text-sm text-gray-500 dark:text-gray-400">Total Daily Energy Expenditure (TDEE)</p>
            <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-300">{{ Math.round(result.tdee) }} calories/day</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">The total calories you burn in a day</p>
          </div>
          
          <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-600 dark:text-gray-300">Formula used: <span class="font-medium">{{ formatFormula(result.formula) }}</span></p>
            <p class="text-sm text-gray-600 dark:text-gray-300">Activity multiplier: <span class="font-medium">{{ result.activity_multiplier }}</span></p>
          </div>
        </div>
      </div>
      
      <!-- Macro Splits -->
      <div class="results-card">
        <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Recommended Macro Splits</h3>
        
        <div class="space-y-6">
          <!-- Balanced -->
          <div v-if="result.macro_split && result.macro_split.balanced">
            <h4 class="font-medium text-gray-700 dark:text-white mb-2">Balanced (Default)</h4>
            <div class="grid grid-cols-3 gap-2">
              <div class="macro-box balanced">
                <p class="text-xs text-gray-500 dark:text-gray-400">Protein</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ result.macro_split.balanced.protein }}g</p>
              </div>
              <div class="macro-box balanced">
                <p class="text-xs text-gray-500 dark:text-gray-400">Carbs</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ result.macro_split.balanced.carbs }}g</p>
              </div>
              <div class="macro-box balanced">
                <p class="text-xs text-gray-500 dark:text-gray-400">Fat</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ result.macro_split.balanced.fat }}g</p>
              </div>
            </div>
          </div>
          
          <!-- Low Carb -->
          <div v-if="result.macro_split && result.macro_split.low_carb">
            <h4 class="font-medium text-gray-700 dark:text-white mb-2">Low Carb</h4>
            <div class="grid grid-cols-3 gap-2">
              <div class="macro-box low-carb">
                <p class="text-xs text-gray-500 dark:text-gray-400">Protein</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ result.macro_split.low_carb.protein }}g</p>
              </div>
              <div class="macro-box low-carb">
                <p class="text-xs text-gray-500 dark:text-gray-400">Carbs</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ result.macro_split.low_carb.carbs }}g</p>
              </div>
              <div class="macro-box low-carb">
                <p class="text-xs text-gray-500 dark:text-gray-400">Fat</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ result.macro_split.low_carb.fat }}g</p>
              </div>
            </div>
          </div>
          
          <!-- High Carb -->
          <div v-if="result.macro_split && result.macro_split.high_carb">
            <h4 class="font-medium text-gray-700 dark:text-white mb-2">High Carb</h4>
            <div class="grid grid-cols-3 gap-2">
              <div class="macro-box high-carb">
                <p class="text-xs text-gray-500 dark:text-gray-400">Protein</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ result.macro_split.high_carb.protein }}g</p>
              </div>
              <div class="macro-box high-carb">
                <p class="text-xs text-gray-500 dark:text-gray-400">Carbs</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ result.macro_split.high_carb.carbs }}g</p>
              </div>
              <div class="macro-box high-carb">
                <p class="text-xs text-gray-500 dark:text-gray-400">Fat</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ result.macro_split.high_carb.fat }}g</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Weight Goals -->
    <div class="mt-6 results-card">
      <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Calorie Targets for Your Goals</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="goal-box loss">
          <h4 class="font-medium text-gray-700 dark:text-white mb-1">Weight Loss</h4>
          <p class="text-xl font-bold text-gray-800 dark:text-white">{{ Math.round(result.tdee * 0.8) }} calories/day</p>
          <p class="text-xs text-gray-500 dark:text-gray-400">20% calorie deficit</p>
        </div>
        
        <div class="goal-box maintain">
          <h4 class="font-medium text-gray-700 dark:text-white mb-1">Maintenance</h4>
          <p class="text-xl font-bold text-gray-800 dark:text-white">{{ Math.round(result.tdee) }} calories/day</p>
          <p class="text-xs text-gray-500 dark:text-gray-400">Stay at current weight</p>
        </div>
        
        <div class="goal-box gain">
          <h4 class="font-medium text-gray-700 dark:text-white mb-1">Weight Gain</h4>
          <p class="text-xl font-bold text-gray-800 dark:text-white">{{ Math.round(result.tdee * 1.1) }} calories/day</p>
          <p class="text-xs text-gray-500 dark:text-gray-400">10% calorie surplus</p>
        </div>
      </div>
    </div>
    
    <!-- Disclaimer -->
    <div class="mt-6 text-sm text-gray-500 dark:text-gray-400">
      <p>These calculations provide estimates based on standard formulas. Individual results may vary. Always consult with a healthcare or nutrition professional before making significant changes to your diet.</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    result: {
      type: Object,
      default: null
    }
  },
  methods: {
    formatFormula(formula) {
      if (formula === 'mifflin_st_jeor') {
        return 'Mifflin-St Jeor';
      } else if (formula === 'katch_mcardle') {
        return 'Katch-McArdle';
      }
      return formula;
    }
  }
};
</script> 