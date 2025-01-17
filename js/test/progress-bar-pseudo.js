let progress = 0;

function moveProgressBar() {
    if (progress < 100) {
        progress += 10;
        document.getElementById('progress-bar').style.width = progress + '%';
        document.getElementById('progress-bar').innerText = progress + '%';
    }
}

window.onload = function() {
    const progressFill = document.querySelector('.progress-fill');
    progressFill.style.width = '70%'; // Change this to the desired final width percentage
};