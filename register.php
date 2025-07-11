<?php
// register.php

// Get POST data
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$birthday = $_POST['birthday'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? ''; // must match form name

// Output HTML header first
echo "<!DOCTYPE html><html><head><title>Register Result</title>
<link rel='stylesheet' href='Style.css'>
</head><body><div class='register-result'><h1>Sign Up Result</h1>";


// Input validation
if (empty($username) || empty($email) || empty($birthday) || empty($password) || empty($confirm_password)) {
    echo "<p class='error'>❌ Please fill out all fields.</p>";

    exit;
}

if ($password !== $confirm_password) {
    echo "<p style='color:red;'>❌ Passwords do not match.</p>";
    exit;
}

// Save to file
$accountLine = "$username|$email|$birthday|$password\n";
$file = "accounts.txt";

if (file_put_contents($file, $accountLine, FILE_APPEND | LOCK_EX)) {
    echo "<p class='success'>✅ Account for <strong>$username</strong> registered successfully!</p>";
    echo "<p><a href='Login.html'>Click here to log in</a></p>";
} else {
    echo "<p style='color:red;'>❌ Failed to save account. Please try again.</p>";
}

// Close HTML
echo "</div></body></html>";
?>
