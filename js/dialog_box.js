document.getElementById('contactForm').onsubmit = function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Send the form data to the server
    var formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Check if the server response contains 'POSITIVE' or 'NEGATIVE'
        let message = '';
        let dialogType = '';
        
        if (data.includes('positive')) {
            message = "Thank you for your positive feedback! We're glad you had a great experience.";
            dialogType = 'positive';
        } else if (data.includes('negative')) {
            message = "We're sorry to hear that you had a negative experience. Your feedback is important to us.";
            dialogType = 'negative';
        }

        // Set the message and dialog type in the dialog box
        document.getElementById('dialog-message').innerText = message;
        
        // Update the dialog box class based on type
        const dialogBox = document.getElementById('dialogBox');
        dialogBox.classList.remove('hidden');
        dialogBox.classList.add(dialogType);  // Add the dialog type class (positive or negative)
    })
    .catch(error => console.error('Error:', error));
};

// Close the dialog box when the close button is clicked
document.getElementById('dialog-close').onclick = function() {
    document.getElementById('dialogBox').classList.add('hidden');
};

// Close the dialog when clicking outside of the dialog content
window.onclick = function(event) {
    var dialogBox = document.getElementById('dialogBox');
    if (event.target === dialogBox) {
        dialogBox.classList.add('hidden');
    }
};