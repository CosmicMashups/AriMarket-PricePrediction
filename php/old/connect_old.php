<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $concern = $_POST['concern'];

    // Database Connection
    // Make sure to set the correct password here. If no password is set, use an empty string.
    $password = ''; // Update this to the correct password or '' if there's no password
    $conn = new mysqli('localhost', 'root', $password, 'arimarket');

    // Check connection
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, concern) VALUES (?, ?, ?)");
    
    if ($stmt === false) {
        die('Prepare Failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters
    $stmt->bind_param("sss", $name, $email, $concern);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Concern successfully sent...";
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect if accessed directly without form submission
    header("Location: ../html/contacts.php"); // Redirect to your form page
    exit();
}
?>
