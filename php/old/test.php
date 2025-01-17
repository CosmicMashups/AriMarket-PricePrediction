<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$concern = "I am very happy with the service.";  // Sample text for testing

// Redirect standard output to output.txt and errors to error_log.txt
$command = "python ../py/sentiment.py " . escapeshellarg($concern) . " > ../py/output.txt 2> ../py/error_log.txt &";
exec($command);

$attempts = 0;
while ($attempts < 10) { // Maximum of 10 checks
    // Check for either output or error file
    if ((file_exists('../py/output.txt') && filesize('../py/output.txt') > 0) ||
        (file_exists('../py/error_log.txt') && filesize('../py/error_log.txt') > 0)) {
        $output = file_exists('../py/output.txt') ? file_get_contents('../py/output.txt') : '';
        $error = file_exists('../py/error_log.txt') ? file_get_contents('../py/error_log.txt') : '';
        break;
    }
    sleep(3); // Wait 3 seconds before checking again
    $attempts++;
}

// Display the sentiment result or the error message
if (!empty($error)) {
    echo "Python Error: " . htmlspecialchars($error);
} else {
    echo "Sentiment: " . htmlspecialchars($output);
}

// Clean up files
@unlink('../py/output.txt');
@unlink('../py/error_log.txt');
?>