let currentStep = 1;

function showStep(step) {
    // Hide all steps
    document.querySelectorAll('.tutorial-step').forEach(step => step.style.display = 'none');
    // Show the current step
    document.getElementById(`step-${step}`).style.display = 'block';
}

// Function to go to the next step
function nextStep(step) {
    currentStep = step + 1;
    showStep(currentStep);
}

// Function to go to the previous step
function prevStep(step) {
    currentStep = step;
    showStep(currentStep);
}

// Function to end the tutorial
function endTutorial() {
    document.getElementById('tutorial-overlay').style.display = 'none';
}

// Start the tutorial by showing the first step
document.addEventListener('DOMContentLoaded', () => showStep(currentStep));
