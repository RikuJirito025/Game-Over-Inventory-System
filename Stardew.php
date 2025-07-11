<?php
session_start();
include 'GamePrices.php';
$price = $game_prices["Stardew Valley"] ?? "N/A";
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

<div class="blurred-bg-stardew"></div>

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
        <button class="tab-link" onclick="location.href='Sales.php'">VIEW SALES</button>
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
  
  <h1>Stardew Valley</h1>

  <img class="main-game-image" src="https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/413150/capsule_616x353.jpg?t=1711128146" alt="Stardew Valley">

  <div class="product-actions">
    <a href="index.php">
      <button>Back</button>
    </a>
        <form method="post" action="AddtoCart.php" style="display:inline;">
  <input type="hidden" name="game" value="Stardew Valley">
  <button type="submit">Add to Cart</button>
</form>
  </div>

  <div class="game-details">

    <div class="game-desc">
      <div class="description-image">
        <img src="https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/413150/extras/animalStrip2.png?t=1711128146" alt="divider">
      </div>

      <p>You’ve inherited your grandfather’s old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life.</p>

      <div class="description-image">
        <img src="https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/413150/ss_f79d2066dfaf32bbe87868d36db4845f771eddbd.1920x1080.jpg?t=1711128146" alt="farming">
      </div>

      <p>Grow crops, raise animals, fish, mine, and befriend townsfolk. Each season brings new events and surprises.</p>

      <div class="description-image">
        <img src="https://oyster.ignimgs.com/mediawiki/apis.ign.com/stardew-valley/0/0d/Luau2.JPG?width=640" alt="exploration">
      </div>

      <p>Explore caves full of treasures and monsters. Build the farm of your dreams!</p>

      <div class="description-image">
        <img src="https://oyster.ignimgs.com/mediawiki/apis.ign.com/stardew-valley/1/1f/Skull_Cavern.png" alt="divider">
      </div>

      <p>Invite 1-7 players to join you in the valley online! Players can work together to build a thriving farm, share resources, and improve the local community.</p>

      <div class="description-image">
        <img src="https://cdn.mos.cms.futurecdn.net/v2/t:0,l:0,cw:1280,ch:720,q:80,w:1280/uWS5Y9MYZC2qijq47ZogLH.jpg" alt="divider">
      </div>

      <p>There are 12 available bachelors and bachelorettes to woo, each with unique character progression cutscenes!</p>

      <div class="description-image">
        <img src="https://voxelsmash.com/wp-content/uploads/2023/04/How-to-make-wedding-dress-Stardew-Valley.jpg" alt="divider">
      </div>
    </div>

    <div class="game-info-class">
      <div class="game-info">
        <h4>Game Information</h4>
        <p><strong>Price:</strong> ₱<?php echo $price; ?></p>
        <p><strong>Rating:</strong> ★★★★★</p>
        <p><strong>Genre:</strong> Farming, Life Sim, RPG</p>
        <p><strong>Works On:</strong> Windows 7, 8, 10, 11</p>
        <p><strong>Release Date:</strong> February 26, 2016</p>
        <p><strong>Company:</strong> ConcernedApe</p>
        <p><strong>Size:</strong> 500 MB</p>
      </div>

      <div class="time-beat">
        <h4>Time to Beat</h4>
        <p><strong>Main Story:</strong> 52 Hours</p>
        <p><strong>Main + Extras:</strong> 80 Hours</p>
        <p><strong>Completionist:</strong> 155 Hours</p>
        <p><strong>All Styles:</strong> 90 Hours</p>
      </div>

      <div class="stardew-reviews">
        <h4>Reviews</h4>
        <div class="review-item">
            <p><strong>“Far more than just a farming game, this one-man labor of love is filled with seemingly endless content and heart.”</strong></p>
            <p>5/5 – Giant Bomb</p>
        </div>
        <div class="review-item">
            <p><strong>“The core mechanics and relaxing aesthetic merge so well together that players will sink in to the experience and never want to leave.”</strong></p>
            <p>95 – Destructoid</p>
        </div>
        <div class="review-item">
            <p><strong>“Stardew Valley has been the most rich and heartwarming experience I’ve had in a game in years.”</strong></p>
            <p>95 – CGMagazine</p>
        </div>
        </div>


        


      <div class="stardew-achievement">
        <h4>Achievements</h4>

        <div class="achievement-item">
          <img src="https://cdn.fastly.steamstatic.com/steamcommunity/public/images/apps/413150/fdd74e80dbb3a7f2581461ab160ffd34ad000990.jpg" alt="achievement">
          <p><strong>Local Legend</strong></p>
        </div>

        <div class="achievement-item">
          <img src="https://cdn.fastly.steamstatic.com/steamcommunity/public/images/apps/413150/c0330b9f16d6491c4ac9569270d9edce2ce3cd7a.jpg" alt="achievement">
          <p><strong>The Beloved Farmer</strong></p>
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
