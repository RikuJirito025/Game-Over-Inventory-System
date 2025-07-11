<?php
session_start();
if ($_SESSION['username'] !== 'admin') {
  header("Location: Login.html");
  exit();
}

// Load current prices
include 'GamePrices.php';

// Load sales if file exists
if (file_exists('GameSales.php')) {
  include 'GameSales.php';
} else {
  $game_sales = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $game = $_POST['game'];
  $new_price = $_POST['price'];
  $sale_percentage = $_POST['sale'] ?? 0;

  // Update price
  $game_prices[$game] = $new_price;

  // Update sale
  $game_sales[$game] = $sale_percentage;

  // Save updated prices
  $price_code = "<?php\n\$game_prices = [\n";
  foreach ($game_prices as $g => $p) {
    $price_code .= "  \"" . addslashes($g) . "\" => \"" . addslashes($p) . "\",\n";
  }
  $price_code .= "];\n?>";
  file_put_contents('GamePrices.php', $price_code);

  // Save updated sales
  $sale_code = "<?php\n\$game_sales = [\n";
  foreach ($game_sales as $g => $s) {
    $sale_code .= "  \"" . addslashes($g) . "\" => " . intval($s) . ",\n";
  }
  $sale_code .= "];\n?>";
  file_put_contents('GameSales.php', $sale_code);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Games - Admin</title>
  <link rel="stylesheet" href="Style.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;800&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

  <div class="top-bar">
    <div class="nav">
      <a href="AdminPage.html">
        <img src="Logo.png" alt="Logo">
      </a>

      <form action="ViewAccounts.php" method="get">
        <button class="tab-link" type="submit">View All Accounts</button>
      </form>

      <form action="logout.php" method="post">
        <button class="tab-link" type="submit">Logout</button>
      </form>
    </div>
  </div>

  <div class="main">
    <h1 style="text-align: center;">Manage Game Prices & Sales</h1>

    <div class="center-tabs">
      <form method="post">
        <label for="game"><strong>Select Game:</strong></label><br>
        <select name="game" id="game" class="box" required>
          <option value="Stardew Valley">Stardew Valley</option>
          <option value="Cabernet">Cabernet</option>
          <option value="Mega Man X Legacy Collection 1+2">Mega Man X Legacy Collection 1+2</option>
        </select><br><br>

        <label for="price"><strong>New Price (₱):</strong></label><br>
        <input type="text" name="price" id="price" class="box" placeholder="₱0.00" required><br><br>

        <label for="sale"><strong>Sale Percentage (%):</strong></label><br>
        <input type="number" name="sale" id="sale" class="box" min="0" max="100" value="0"><br><br>

        <button class="tab-link" type="submit">Update Game</button>
      </form>
    </div>
  </div>

</body>
</html>
