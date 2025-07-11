<?php
session_start();
include 'GamePrices.php';
include 'GameSales.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']); // Clears the cart
    header("Location: Cart.php");
    exit();
}

$is_logged_in = isset($_SESSION['username']);
$username = $_SESSION['username'] ?? '';
$cart = $_SESSION['cart'] ?? [];

$total_price = 0;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Game Inventory</title>
  <link rel="stylesheet" href="Style.css">
</head>
<body>

<div class="blurred-bg"></div>

<div class="top-bar">
  <div class="nav">
    <a href="index.php">
      <img src="Logo.png" alt="Logo">
    </a>
    <button class="tab-link">BROWSE</button>
    <?php if (!$is_logged_in): ?>
      <button class="tab-link" onclick="location.href='Login.html'">LOGIN</button>
    <?php endif; ?>
  </div>

  <?php if ($is_logged_in): ?>
    <p>Welcome, <?php echo htmlspecialchars($username); ?>!</p>
  <?php endif; ?>

  <div class="search-box">
    <input type="text" placeholder="Search games...">
  </div>
</div>

<div class="game-page">
  <h1>Shopping Cart</h1>
  <div class="game-details">
    <div class="game-desc">
      <?php if (!empty($cart)): ?>
        <ul>
          <?php foreach ($cart as $item): ?>
            <?php
              $price_str = $game_prices[$item] ?? '0';
              $original_price = floatval(str_replace(['₱', ','], '', $price_str));
              $sale_percent = $game_sales[$item] ?? 0;
              $final_price = $original_price;

              if ($sale_percent > 0) {
                $final_price -= $original_price * ($sale_percent / 100);
              }

              $total_price += $final_price;
            ?>
            <li>
              <?php echo htmlspecialchars($item); ?> -
              <?php if ($sale_percent > 0): ?>
                <span><del>₱<?php echo number_format($original_price, 2); ?></del> <strong style="color:green;">₱<?php echo number_format($final_price, 2); ?></strong> (<?php echo $sale_percent; ?>% off)</span>
              <?php else: ?>
                ₱<?php echo number_format($final_price, 2); ?>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>

        <form action="Confirm.php" method="post">
          <button type="submit">Purchase All</button>
        </form>

        <form method="post" action="Cart.php" onsubmit="return confirm('Are you sure you want to clear your cart?');">
          <input type="hidden" name="clear_cart" value="1">
          <button type="submit">Clear Cart</button>
        </form>
      <?php else: ?>
        <p>There seems to be no game in your cart.. add a game!</p>
      <?php endif; ?>
    </div>

    <div class="game-info-class">
      <div class="game-info">
        <h4>Estimated Price: ₱<?php echo number_format($total_price, 2); ?></h4>
        <p>Sales tax will be calculated during checkout where applicable</p>
      </div>
    </div>

    <div class="recommendation">
      <p><strong>Recommendations: </strong></p>
      <div class="img-row">
        <img src="https://theyetee.com/cdn/shop/collections/stardew_1024x.png?v=1559770092" onclick="location.href='Stardew.php'" alt="Game Image">
        <div class="img2">
          <img src="https://images.gog-statics.com/0b411c548fa781b3a30b4cb24e3bf21176d1e969c49d524fa429bdd2e238973b.jpg" onclick="location.href='Cabernet.php'" alt="Game Image">
        </div>
      </div>
    </div>
  </div>

  <div class="footer">
    <button onclick="location.href='index.php'">Continue Shopping</button>
  </div>
</div>

</body>
</html>
