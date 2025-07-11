<?php
session_start();
include 'GamePrices.php';
include 'GameSales.php';

$is_logged_in = isset($_SESSION['username']);
$username = $_SESSION['username'] ?? '';

// Check if there are any sales
$has_sales = false;
foreach ($game_sales as $game => $percent) {
    if ($percent > 0) {
        $has_sales = true;
        break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Game Inventory</title>
  <link rel="stylesheet" href="Style.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;800&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

  <div class="top-bar">
    <div class="nav">
      <a href="index.php">
        <img src="Logo.png" alt="Logo">
      </a>
      <button class="tab-link" onclick="location.href='index.php'">BROWSE</button>
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

  <div class="main">
    <div class="grid">
      <button class="image-button">
        <img src="GameCatalogue.jpg" alt="Catalogue">
        <span>Game Catalogue</span>
      </button>
      <button class="image-button">
        <img src="https://www.rgj.com/gcdn/presto/2023/06/29/PREN/ce59bfc5-9afe-4ac4-9eb5-d54f7f71058d-Steam_Summer_Sale_2023.jpg" alt="Deals">
        <span>Fantastic Deals</span>
      </button>
    </div>

    <div class="center-tabs">
      <a href="index.php"><button class="tab-link">Product List</button></a>
      <a href="Sales.php"><button class="tab-link">View Sales</button></a>
      <button class="tab-link" onclick="location.href='Manage.php'">Manage Profile</button>
      <button class="tab-link" onclick="location.href='Cart.php'">View Cart</button>
    </div>

    <?php if ($has_sales): ?>
      <div class="product-card" style="border: 2px solid #33cc33;">
        <h2 style="text-align: center;">🔥 Ongoing Sales 🔥</h2>
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
          <thead>
            <tr>
              <th>Game</th>
              <th>Original Price</th>
              <th>Sale %</th>
              <th>Discounted Price</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($game_sales as $game => $percent): ?>
              <?php if ($percent > 0): ?>
                <?php
                  $price_str = $game_prices[$game] ?? '0';
                  $price = floatval(str_replace(['₱', ','], '', $price_str));
                  $discounted = $price - ($price * ($percent / 100));
                ?>
                <tr>
                  <td><?php echo htmlspecialchars($game); ?></td>
                  <td><del>₱<?php echo number_format($price, 2); ?></del></td>
                  <td style="color: green;"><?php echo $percent; ?>%</td>
                  <td><strong>₱<?php echo number_format($discounted, 2); ?></strong></td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="product-card">
        <p style="text-align: center;">There are currently no sales going on...</p>
      </div>
    <?php endif; ?>

    <div class="hero-section">
      <h1>Welcome to GameOver!</h1>
      <p>Your one-stop shop for digital adventures and amazing deals!</p>
      <p>Educational Purposes Only!</p>
    </div>

    <div class="why-choose-us">
      <h2>Why Shop With Us?</h2>
      <ul>
        <li>🎮 Wide Selection of Popular & Indie Games</li>
        <li>💸 Regular Discounts and Bundles</li>
        <li>⭐ Trusted by Gamers Nationwide</li>
      </ul>
    </div>

    <?php if ($is_logged_in): ?>
      <div class="footer">
        <form action="logout.php" method="post">
          <button type="submit">Logout</button>
        </form>
        <form action="Cart.php" method="get">
          <button type="submit">Return to cart</button>
        </form>
      </div>
    <?php endif; ?>
  </div>

</body>
</html>
