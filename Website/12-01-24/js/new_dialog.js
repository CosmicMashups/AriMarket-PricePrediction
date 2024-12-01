let dialog = document.getElementById('dialogBox');
let overlay = document.getElementById('dialogOverlay');
let button = dialog.querySelector('button');

function openDialog() {
    dialog.style.transform = 'scale(1)';  // Apply the scale transformation
    dialog.classList.add('open-dialog');
    overlay.style.visibility = 'visible';

    // Change button color based on dialog type
    if (dialogType === 'negative') {
        button.style.backgroundColor = '#d76a6a'; // Red for negative
    } else {
        button.style.backgroundColor = '#6fd649'; // Green for positive
    }
}

function closeDialog() {
    dialog.style.transform = 'scale(0.1)';  // Reset the scale when closing
    dialog.classList.remove('open-dialog');
    overlay.style.visibility = 'hidden';
}