<?php
session_start();
$is_logged_in = isset($_SESSION['username']);
$username = $_SESSION['username'] ?? '';
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
        <a href="index.php">
      <button class="tab-link">Product List</button>
            </a>
      <a href="Sales.php">
        <button class="tab-link">View Sales</button>
      </a>
      

    <button class="tab-link" onclick="location.href='Manage.php'">Manage Profile</button>
    <button class="tab-link" onclick="location.href='Cart.php'">View Cart</button>
    </div>

<div class="product-card">
<?php if ($is_logged_in): ?>
  <div style="text-align: center;">
    <img src="https://i.pinimg.com/originals/c0/c2/16/c0c216b3743c6cb9fd67ab7df6b2c330.jpg" alt="Profile" style="width: 100px; height: 100px; border-radius: 50%;">
    <h2><?php echo htmlspecialchars($username); ?></h2>

    <h3>Owned Games:</h3>
    <ul>
      <?php
      $owned = file('owned_games.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      $user_owned = array_filter($owned, function($line) use ($username) {
        return strpos($line, "$username|") === 0;
      });

      if (!empty($user_owned)) {
        foreach ($user_owned as $line) {
          list($user, $game) = explode('|', $line);
          echo "<li>" . htmlspecialchars($game) . "</li>";
        }
      } else {
        echo "<li><em>No games owned yet.</em></li>";
      }
      ?>
    </ul>
  </div>
<?php else: ?>
  <p style="text-align: center;">No user profile detected..</p>
<?php endif; ?>

</div>


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

</body>
</html>


