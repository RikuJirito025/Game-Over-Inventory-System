<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Signup - Game Inventory</title>
  <link rel="stylesheet" href="Style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;800&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="login-body">

  <div class="blurred-bg-login"></div>

  <div class="top-bar">
    <div class="nav">
      <a href="index.php">
        <img src="Logo.png" alt="Logo">
      </a>
      <button class="tab-link" onclick="location.href='index.php'">BROWSE</button>
      <button class="tab-link" onclick="location.href='Login.html'">LOGIN</button>
      <button class="tab-link" disabled title="Coming soon">PRODUCT LIST</button>
      <button class="tab-link" onclick="location.href='Sales.php'">VIEW SALES</button>
      <button class="tab-link" onclick="location.href='Manage.php'">MANAGE PROFILE</button>
      <button class="tab-link" onclick="location.href='Cart.php'">VIEW CART</button>
    </div>
    <div class="search-box">
      <input type="text" placeholder="Search games...">
    </div>
  </div>

  <div class="login-container">
    <h1>Create Your Account</h1>
    <form action="register.php" method="post">

      <label for="username">Username</label>
      <input type="text" id="username" name="username" required />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />

      <label for="birthday">Birthday</label>
      <input type="date" id="birthday" name="birthday" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />

      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm_password" required />

      <button type="submit">Sign Up</button>
      <p class="signup-link">Already have an account? <a href="Login.html">Log in</a></p>
    </form>
  </div>

  <div class="hero-section">
    <h1>Welcome to GameOver!</h1>
    <p>Your one-stop shop for digital adventures and amazing deals!</p>
    <p>Educational Purposes Only!</p>
  </div>

  <div class="why-choose-us">
    <h2>Why Sign Up With Us?</h2>
    <ul>
      <li>🎮 Wide Selection of Popular & Indie Games</li>
      <li>💸 Regular Discounts and Bundles</li>
      <li>⭐ Trusted by Gamers Nationwide</li>
    </ul>
  </div>

</body>
</html>
