<?php
session_start();
include 'GamePrices.php';
$price = $game_prices["Cabernet"] ?? "N/A";
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

<div class="blurred-bg"></div>

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
    </div>

<div class="game-page">
        
  <h1>Cabernet</h1>

  <img class="main-game-image" src="https://images.gog-statics.com/0b411c548fa781b3a30b4cb24e3bf21176d1e969c49d524fa429bdd2e238973b.jpg" alt="Game">

    <div class="product-actions">
    <a href="index.php">    
        <button>Back</button>
    </a>
    <form method="post" action="AddtoCart.php" style="display:inline;">
  <input type="hidden" name="game" value="Cabernet">
  <button type="submit">Add to Cart</button>
</form>

  </div>
  
<div class = "game-details">

    <div class="game-desc">

    <div class ="description-image">
        <img src = "https://items.gog.com/cabernet/Divider_02c-84edd.png" alt="cabernet">
    </div>

    <p>Cabernet is a 2D narrative RPG set in a 19th century Eastern European inspired world, with a modern twist. 
    Guide Liza, a young vampire in her new unlife among the unsuspecting townsfolk. Will you retain your humanity 
    or descend further into the horror you have become?</p>

    
    <div class ="description-image">
        <img src = "https://items.gog.com/cabernet/CAB_Graphic_GIF-1_616x100_V1-c71f6.gif" alt="cabernet">
    </div>

    <p>Use the moonlit sky to plan your next feast and explore. Mingle among vampiric society and the humans who feed them. Uncover who can aid your new kin and whose only purpose is to be drained. </p>


    <div class ="description-image">
        <img src = "https://items.gog.com/cabernet/CAB_Drink_Less_Banner__1_-e7812.gif" alt="cabernet">
    </div>

    <p>Vampirism isn't just an unholy transformation of your body-- it also threatens to transform your mind. Will you choose to indulge your empathetic humanity or embrace your newfound nihilism?</p>

    <div class ="description-image">
        <img src = "https://items.gog.com/cabernet/CAB_Graphic_GIF-2_616x100_V1-d1455.gif" alt="cabernet">
    </div>

    <p>But to lure your next meal somewhere safe and secluded, you'll need to understand who they are and what they desire. A kind-hearted, alcoholic coachman? A fraying newlywed couple? A greedy, yet charming charlatan? Their lives are yours to aid or unravel.</p>

    <div class ="description-image">
        <img src = "https://items.gog.com/cabernet/CAB_Graphic_GIF-4_616x100_V1-319c2.gif" alt="cabernet">
    </div>

    <p> Art, literature, history, science, these are the skills you'll require to succeed. Your knowledge will be your greatest weapon in a world where the cunning drain the brutal of life. </p>

    <div class ="description-image">
        <img src = "https://items.gog.com/cabernet/Divider_02c-84edd.png" alt="cabernet">
    </div>
    
    </div>

  <div class="game-info-class">
  <div class="game-info">

  <h4>Game Information</h4>
  <p><strong>Price:</strong> ₱<?php echo $price; ?></p>
  <p><strong>Rating:</strong> ★★★★★</p>
  <p><strong>Genre:</strong> Vampire, Horror, Visual Novel</p>
  <p><strong>Works On:</strong> Windows 10, 11</p>
  <p><strong>Release Date:</strong> February 20, 2025</p>
  <p><strong>Company:</strong> Party for Introverts / Akupara Games</p>
  <p><strong>Size:</strong> 2.9 GB</p>

  </div>

  <div class="time-beat">

  <h4>Time to Beat</h4>
  <p><strong>Main Story:</strong> 9 Hours</p>
  <p><strong>Main Story + Side Stories:</strong> 12 Hours</p>
  <p><strong>Completionist: </strong> -----</p>
  <p><strong>All Styles:</strong> 11 Hours</p>

  </div>

  <div class="cabernet-dlc"> 

  <h4>DLCs</h4>
  
  <img src="https://images.gog-statics.com/45fcec4248a7d09202ceb6d669d7c67e879288c8d0ee5d02efb002e72d847f3d_product_card_v2_logo_480x285.png" alt="artbook">
  <p><strong>Cabernet Artbook</strong></p>

  <img src="https://images.gog-statics.com/14c035d3994979274124184e94341e18c00e881c34d178a4a47323b99c992a60_product_card_v2_logo_480x285.png" alt="soundtrack">
  <p><strong>Cabernet Soundtrack</strong></p>

  </div>

  <div class="cabernet-achievement">

    <h4> Achievements </h4>

    <div class ="achievement-item">

    <img src="https://images.gog.com/813d945d6a4055b1c646f057bc03ceea42ec77acd713cb10cd36aa8fbd5a9c41_gac_60.jpg" alt="achievement 1">
    <p><strong>Read 5 Books</strong></p>

    </div>

    <div class ="achievement-item">
    <img src="https://images.gog.com/9f1f3058dbda36d64df13ce4eb0198627e4ef9e63175cda1abe56c5af94569d5_gac_60.jpg" alt="achievement 2">
    <p><strong>Give a gift to a character</strong></p>
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
