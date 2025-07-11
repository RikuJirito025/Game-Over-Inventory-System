<?php
session_start();
include 'GamePrices.php';
include 'GameSales.php'; // Make sure this file exists with sale percentages

$is_logged_in = isset($_SESSION['username']);
$username = $_SESSION['username'] ?? '';

if (!$is_logged_in || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}

$cart = $_SESSION['cart'];
$total_price = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Confirm Purchase - Game Inventory</title>
  <link rel="stylesheet" href="Style.css" />
</head>
<body class="login-body">

  <div class="blurred-bg-login"></div>

  <div class="top-bar">
    <div class="nav">
      <a href="index.php">
        <img src="Logo.png" alt="Logo">
      </a>
    </div>
    <div class="search-box">
      <input type="text" placeholder="Search games...">
    </div>
  </div>

  <div class="login-container">
    <h1>Confirm Purchase</h1>

    <h3>Games in Cart:</h3>
    <ul>
      <?php foreach ($cart as $item): ?>
        <?php
          $price = floatval($game_prices[$item] ?? 0);
          if (isset($game_sales[$item])) {
              $discount = $game_sales[$item];
              $discounted_price = $price - ($price * ($discount / 100));
              echo "<li><strong>$item</strong> - <s>₱" . number_format($price, 2) . "</s> <span style='color:red;'>₱" . number_format($discounted_price, 2) . " ({$discount}% OFF)</span></li>";
              $total_price += $discounted_price;
          } else {
              echo "<li><strong>$item</strong> - ₱" . number_format($price, 2) . "</li>";
              $total_price += $price;
          }
        ?>
      <?php endforeach; ?>
    </ul>

    <h4>Subtotal: ₱<?php echo number_format($total_price, 2); ?></h4>
    <h4>Total: ₱<?php echo number_format($total_price, 2); ?> </h4>
    <p>All prices include VAT where applicable.</p>

    <form action="Purchase.php" method="post">
      <label for="payment">Choose payment method:</label><br>
      <input type="radio" name="payment_method" value="Gcash" required> Gcash<br>
      <input type="radio" name="payment_method" value="Credit Card" required> Credit Card<br><br>

      <button type="submit">Confirm Purchase</button>
    </form>
  </div>

</body>
</html>
