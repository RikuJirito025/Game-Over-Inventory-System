<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    $file = fopen("accounts.txt", "r");
    $valid = false;

    while (($line = fgets($file)) !== false) {
    $line = trim($line); // Remove newline
    $parts = explode("|", $line);

    if (count($parts) === 4) {
        list($username, $email, $birthday, $password) = $parts;

        if ($username === $enteredUsername && $password === $enteredPassword) {
            $valid = true;
            $_SESSION['username'] = $username;
            break;
        }
    }
}


    fclose($file);

    if ($valid) {
        // Redirect to homepage or dashboard
        header("Location: index.php");
        exit();
    } else {
        header("Location: wronglogin.php");
        exit();

    }
} else {
    echo "Invalid access.";
}
?>
