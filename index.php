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

      <?php if ($is_logged_in && $username === 'admin'): ?>
        <button class="tab-link" onclick="location.href='AdminPage.html'">Admin Page</button>
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
      <button class="tab-link">Product List</button>
      <button class="tab-link" onclick="location.href='Sales.php'">VIEW SALES</button>
      <button class="tab-link" onclick="location.href='Manage.php'">Manage Profile</button>
      <button class="tab-link" onclick="location.href='Cart.php'">View Cart</button>
    </div>

<!-- StarDew Valley -->
<div class="product-card">
        <div class="img">
        <img src="https://theyetee.com/cdn/shop/collections/stardew_1024x.png?v=1559770092" alt="Game Image">
    </div>


    <button class="tab-link" onclick="location.href='Stardew.php'"><h2>Stardew Valley</h2></button>
  
    <p>★★★★★</p>
    <p>Farming, Life Sim, RPG</p>

    <div class="product-actions">
  <?php if ($is_logged_in): ?>
    <form method="post" action="AddtoCart.php">
      <input type="hidden" name="game" value="Stardew Valley">
      <button type="submit">Add to Cart</button>
    </form>
  <?php else: ?>
    <form method="get" action="Login.html">
      <button type="submit">Add to Cart</button>
    </form>
  <?php endif; ?>
  <a href="Stardew.php"><button>Product Page</button></a>
</div>

</div>

<!-- Cabernet -->
<div class="product-card">
        
  <div class="img2">
    <img src="https://images.gog-statics.com/0b411c548fa781b3a30b4cb24e3bf21176d1e969c49d524fa429bdd2e238973b.jpg" alt="Game Image">
  </div>

      <button class="tab-link" onclick="location.href='Cabernet.php'"><h2>Cabernet</h2></button>
  
  <p>★★★★★</p>
  <p>Vampire, Horror, Visual Novel</p>
  <div class="product-actions">
<?php if ($is_logged_in): ?>
    <form method="post" action="AddtoCart.php">
      <input type="hidden" name="game" value="Cabernet">
      <button type="submit">Add to Cart</button>
    </form>
  <?php else: ?>
    <form method="get" action="Login.html">
      <button type="submit">Add to Cart</button>
    </form>
  <?php endif; ?>
  <a href="Cabernet.php"><button>Product Page</button></a>
  </div>
</div>

    <!-- Mega Man X Legacy Collection -->
<div class="product-card">
  <div class="img3">
    <img src="https://i.ytimg.com/vi/Ic0vouH43_o/maxresdefault.jpg" alt="Mega Man X Legacy Collection">
  </div>

  <button class="tab-link" onclick="location.href='MegamanX.php'"><h2>Mega Man X Legacy Collection 1+2</h2></button>
  
  <p>★★★★☆</p>
  <p>Action, Platformer, Classic Series</p>
  
  <div class="product-actions">
    <?php if ($is_logged_in): ?>
    <form method="post" action="AddtoCart.php">
      <input type="hidden" name="game" value="Mega Man X Legacy Collection 1+2">
      <button type="submit">Add to Cart</button>
    </form>
  <?php else: ?>
    <form method="get" action="Login.html">
      <button type="submit">Add to Cart</button>
    </form>
  <?php endif; ?>
  <a href="MegamanX.php"><button>Product Page</button></a>
  </div>
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
