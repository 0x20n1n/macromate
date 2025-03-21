import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue';
import CalculationForm from './components/CalculationForm.vue';
import CalculationResult from './components/CalculationResult.vue';

// Global variable to store calculation results
let currentCalculationResult = null;

// Define the global function for showing calculation results
window.showCalculationResults = function(result) {
    console.log('Showing calculation results:', result);
    
    // Store the result for any components that might mount later
    currentCalculationResult = result;
    
    // Emit a custom event to notify all components
    document.dispatchEvent(new CustomEvent('calculation-completed', { detail: result }));
    
    // Scroll to results section
    setTimeout(() => {
        const resultsSection = document.getElementById('results-section');
        if (resultsSection) {
            resultsSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }, 200);
};

document.addEventListener('DOMContentLoaded', () => {
    // Mount calculation form components
    const formElements = document.querySelectorAll('calculation-form');
    formElements.forEach(element => {
        // Get initial activities from the element's attribute
        let initialActivities = [];
        try {
            initialActivities = JSON.parse(element.getAttribute('initial-activities') || '[]');
        } catch (e) {
            console.warn('Failed to parse initial activities:', e);
        }
        
        // Create a Vue app for this form component
        const app = createApp(CalculationForm, {
            initialActivities,
            onCalculationCompleted: (result) => {
                window.showCalculationResults(result);
            }
        });
        
        // Mount it on this element
        app.mount(element);
    });
    
    // Mount calculation result components
    const resultElements = document.querySelectorAll('calculation-result');
    resultElements.forEach(element => {
        // Create a Vue app instance with the CalculationResult component
        const app = createApp({
            components: {
                CalculationResult
            },
            data() {
                return {
                    calculationResult: currentCalculationResult
                };
            },
            template: '<calculation-result :result="calculationResult" />'
        });
        
        // Mount it on this element
        const vm = app.mount(element);
        
        // Listen for calculation completed events
        document.addEventListener('calculation-completed', (event) => {
            if (vm && event.detail) {
                // Update the data property instead of the prop directly
                vm.calculationResult = event.detail;
                console.log('Updated result component via event');
            }
        });
    });
});
