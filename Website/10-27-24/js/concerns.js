document.getElementById('send-button').addEventListener('click', function () {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const concern = document.getElementById('concern').value;

    // Sending the data to the server via a POST request
    fetch('/update-file', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ name, email, concern }),
    })
    .then(response => response.json())
    .then(data => {
        alert('Data successfully sent to the server and added to the file!');
    })
    .catch(error => {
        console.error('Error:', error);
    });
});