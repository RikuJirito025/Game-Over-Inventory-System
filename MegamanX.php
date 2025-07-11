<?php
session_start();
include 'GamePrices.php';
$price = $game_prices["Mega Man X Legacy Collection 1+2"] ?? "N/A";
$is_logged_in = isset($_SESSION['username']);
$username = $_SESSION['username'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Game Inventory</title>
  <link rel="stylesheet" href="Style.css">
</head>
<body>

<div class="blurred-bg-megaman"></div>


  <div class="top-bar">
    <div class="nav">
      <a href="index.php">
        <img src="Logo.png" alt="Logo">
      </a>
      <button class="tab-link" onclick="location.href='index.php'">BROWSE</button>
      <?php if (!$is_logged_in): ?>
        <button class="tab-link" onclick="location.href='Login.html'">LOGIN</button>
      <?php endif; ?>
      <button class="tab-link" disabled title="Coming soon">PRODUCT LIST</button>
      <button class="tab-link" onclick="location.href='Sales.html'">VIEW SALES</button>
      <button class="tab-link" onclick="location.href='Manage.php'">MANAGE PROFILE</button>
    </div>
    <?php if ($is_logged_in): ?>
      <p>Welcome, <?php echo htmlspecialchars($username); ?>!</p>
    <?php endif; ?>
    <div class="search-box">
      <input type="text" placeholder="Search games...">
    </div>
  </div>

<div class="game-page">
  
  <h1>Mega Man X Legacy Collection 1+2</h1>

  <img class="main-game-image" src="https://i.ytimg.com/vi/Ic0vouH43_o/maxresdefault.jpg" alt="Mega Man X Legacy Collection">

  <div class="product-actions">
    <a href="index.php">
      <button>Back</button>
    </a>
        <form method="post" action="AddtoCart.php" style="display:inline;">
  <input type="hidden" name="game" value="Mega Man X Legacy Collection 1+2">
  <button type="submit">Add to Cart</button>
</form>
  </div>

  <div class="game-details">

    <div class="game-desc">
      <div class="description-image">
        <img src="https://fanatical.imgix.net/product/original/982b591f-4f5b-4865-88ba-abe3462b4944.jpeg?auto=compress,format&w=870&fit=crop&h=489" alt="screenshot">
      </div>

      <p>Play through the evolution of the legendary Maverick Hunter, X, in this action-packed collection that includes **Mega Man X1 through X8**. Witness the transition from SNES classics to the stylish 32-bit and 3D titles that redefined the franchise.</p><br>

      <div class="description-image">
        <img src="https://i.gifer.com/7XBK.gif" alt="action">
      </div>

      <p>Dash, climb, blast, and slash through dangerous stages, take on memorable bosses, and upgrade your armor with heart tanks and sub-tanks. Includes extra content like Boss Rush mode, concept art, and the animated film *The Day of Σ*.</p><br>

      <div class="description-image">
        <img src="https://media.tenor.com/Lq46bUUTQrgAAAAM/mega-man-x.gif" alt="Collection Screenshot">
      </div>

      <p>Whether you're a veteran fan or a new recruit to the X universe, this collection delivers pure retro adrenaline and rock-solid platforming.</p><br>

      <div class="description-image">
        <img src="https://64.media.tumblr.com/28edb5430e864e940c0cd2c068668816/tumblr_n7fsg7TPyi1rk816mo6_500.gifv" alt="sigma">
      </div>
    </div>

    <div class="game-info-class">
      <div class="game-info">
        <h4>Game Information</h4>
        <p><strong>Price:</strong> ₱<?php echo $price; ?></p>
        <p><strong>Rating:</strong> ★★★★☆</p>
        <p><strong>Genre:</strong> Action, Platformer, Retro</p>
        <p><strong>Works On:</strong> Windows 7, 8.1, 10 (64-bit)</p>
        <p><strong>Release Date:</strong> July 24, 2018</p>
        <p><strong>Company:</strong> Capcom</p>
        <p><strong>Size:</strong> Approx. 7.4 GB</p>
      </div>

      <div class="time-beat">
        <h4>Time to Beat</h4>
        <p><strong>Main Story:</strong> 15 Hours</p>
        <p><strong>Main + Extras:</strong> 25 Hours</p>
        <p><strong>Completionist:</strong> 40+ Hours</p>
        <p><strong>All Styles:</strong> 20 Hours</p>
      </div>

      <div class="stardew-reviews">
        <h4>Reviews</h4>
        <div class="review-item">
            <p><strong>“A lovingly crafted collection that gives the blue bomber's X series the attention it deserves.”</strong></p>
            <p>8.5/10 – Game Informer</p>
        </div>
        <div class="review-item">
            <p><strong>“An essential retro package with smooth gameplay and nostalgic flair.”</strong></p>
            <p>4/5 – Hardcore Gamer</p>
        </div>
        <div class="review-item">
            <p><strong>“Mega Man X Legacy Collection is a blast from the past with modern polish.”</strong></p>
            <p>9/10 – IGN</p>
        </div>
      </div>

      <div class="stardew-achievement">
        <h4>Achievements</h4>

        <div class="achievement-item">
          <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/88/MEGAMANXCharacters.png/250px-MEGAMANXCharacters.png" alt="achievement">
          <p><strong>True Maverick Hunter</strong></p>
        </div>

        <div class="achievement-item">
          <img src="https://img.favpng.com/19/20/5/mega-man-x3-video-game-art-armour-png-favpng-j4QHbETVCJYFgvs89LKaQEUZ7.jpg" alt="achievement">
          <p><strong>Armor Collector</strong></p>
        </div>

      </div>
    </div>

  </div>
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
