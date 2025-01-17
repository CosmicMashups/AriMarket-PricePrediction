<?php
// Start the session to access session variables
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dialog Box | AriMarket</title>
    <link rel="stylesheet" href="../css/dialog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">    
</head>

<body>

    <?php
    // Example values for dialog type and message
    $message = "We’re thrilled that you enjoyed your experience on our website.";
    $dialog_type = "positive";
    ?>

    <button type='button' class='btn' onclick='openDialog()'>Open Dialog</button>
    
    <!-- Dialog Box -->
    <div class="dialog-overlay" id="dialogOverlay" onclick="closeDialog()">
        <div class="dialog-box <?php echo $dialog_type; ?>" id="dialogBox" onclick="event.stopPropagation()">
            <!-- Show the positive or negative image based on dialog type -->
            <?php if ($dialog_type == 'positive') { ?>
                <img src='../images/dialog/positive.png' alt="Positive feedback">
            <?php } else { ?>
                <img src='../images/dialog/negative.png' alt="Negative feedback">
            <?php } ?>
            
            <h2>Thank You!</h2>
            <p><?php echo $message; ?></p>
            <button type='button' onclick='closeDialog()'>OK</button>
        </div>
    </div>
    <script>
        var dialogType = "<?php echo $dialog_type; ?>";
    </script>

    <!-- Scripts -->
    <script src="../js/new_dialog.js"></script>

</body>
</html>