const express = require('express');
const fs = require('fs');
const path = require('path');

const app = express();
const PORT = process.env.PORT || 3000;

// Serve static files from the css, js, images, and fonts folders
app.use('/css', express.static(path.join(__dirname, 'css')));
app.use('/js', express.static(path.join(__dirname, 'js')));
app.use('/images', express.static(path.join(__dirname, 'images')));
app.use('/fonts', express.static(path.join(__dirname, 'fonts')));

// Define routes for each HTML page
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'html', 'contacts.html'));
});

app.get('/about', (req, res) => {
    res.sendFile(path.join(__dirname, 'html', 'about.html'));
});

app.get('/contacts', (req, res) => {
    res.sendFile(path.join(__dirname, 'html', 'contacts.html'));
});

// Add more routes for additional pages here
app.get('/commodities', (req, res) => {
    res.sendFile(path.join(__dirname, 'html', 'commodities.html'));
});

// Function to read all files in a directory recursively
function readDirectoryRecursively(directoryPath) {
    fs.readdir(directoryPath, { withFileTypes: true }, (err, files) => {
        if (err) {
            console.error(`Error reading directory ${directoryPath}:`, err);
            return;
        }

        files.forEach((file) => {
            const fullPath = path.join(directoryPath, file.name);
            if (file.isDirectory()) {
                // If it's a directory, call the function recursively
                readDirectoryRecursively(fullPath);
            } else {
                // It's a file, log the file name
                console.log(fullPath); // or process the file as needed
            }
        });
    });
}

// Call the function for the root project folder
const projectRoot = __dirname; // Assuming this file is in the root of the project
readDirectoryRecursively(projectRoot);

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});