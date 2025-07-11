<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$cart = $_SESSION['cart'];
$payment_method = $_POST['payment_method'] ?? 'Unknown';


// Save purchases
$owned_file = 'owned_games.txt';

// Format: username|game1
foreach ($cart as $game) {
    $line = $username . '|' . $game . "\n";
    file_put_contents($owned_file, $line, FILE_APPEND);
}


// Clear cart
$_SESSION['cart'] = [];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Thank You - Game Inventory</title>
  <link rel="stylesheet" href="Style.css">
</head>
<body>
  <div class="top-bar">
    <div class="nav">
      <a href="index.php">
        <img src="Logo.png" alt="Logo">
      </a>
    </div>
  </div>

  <div class="login-container">
    <h1>Thank You for Your Purchase!</h1>
    <p>You paid with: <strong><?php echo htmlspecialchars($payment_method); ?></strong></p>
    <p>Your games have been added to your account.</p>
    <a href="Manage.php"><button>Go to Profile</button></a>
  </div>
</body>
</html>
