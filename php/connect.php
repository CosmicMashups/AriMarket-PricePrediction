<?php
session_start(); // Start the session at the beginning of the script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $concern = htmlspecialchars($_POST['concern']);

    // Database connection
    $password = '';  // Add password if required, otherwise leave as an empty string
    $conn = new mysqli('localhost', 'root', $password, 'arimarket');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Run Python script for sentiment analysis
    $command = "python ../py/sentiment.py " . escapeshellarg($concern) . " > ../py/output.txt &";
    exec($command);

    $attempts = 0;
    while ($attempts < 10) { // Maximum of 10 checks
        if (file_exists('../py/output.txt') && filesize('../py/output.txt') > 0) {
            $output = trim(file_get_contents('../py/output.txt')); // Trim whitespace or newline characters
            break;
        }
        sleep(3); // Wait 3 seconds before checking again
        $attempts++;
    }

    // Display the sentiment result for debugging
    echo !empty($output) ? "Sentiment: " . htmlspecialchars($output) : 'Output is empty';
    
    // Clean up file
    @unlink('../py/output.txt');

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, concern, sentiment) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die('Prepare Failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters, including the sentiment result
    $stmt->bind_param("ssss", $name, $email, $concern, $output);

    // Debugging: Check the parameters being bound
    echo "Binding Parameters: Name: $name, Email: $email, Concern: $concern, Sentiment: $output";

    // Execute the statement
    if ($stmt->execute()) {
        // Prepare the message based on sentiment analysis result
        if (strtolower($output) === "positive") {
            $message = "We’re thrilled that you enjoyed your experience on our website.";
            $dialog_type = "positive";
        } else {
            $message = "We’re sorry to hear that your experience didn't meet expectations.";
            $dialog_type = "negative";
        }

        // Set session variables for the dialog box message and type
        $_SESSION['dialog_message'] = $message;
        $_SESSION['dialog_type'] = $dialog_type;

        // Debugging: Output session variables to verify
        echo "Session Message: " . $_SESSION['dialog_message'] . " | Dialog Type: " . $_SESSION['dialog_type'];

        // Redirect to home.php with the message
        header("Location: ../html/home.php");
        exit();
    } else {
        // Debugging: Output any errors that occurred during execution
        echo "Error executing statement: " . htmlspecialchars($stmt->error);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    header("Location: ../html/home.php");
    exit();
}
?>