<?php
session_start();
if ($_SESSION['username'] !== 'admin') {
  header("Location: Login.html");
  exit();
}

// Read accounts.txt and parse lines into array
$accounts = [];
$file = 'accounts.txt';
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $parts = explode('|', $line);
        if (count($parts) === 4) {
            $accounts[] = [
                'username' => $parts[0],
                'email' => $parts[1],
                'birthday' => $parts[2],
                'password' => $parts[3]
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>View All Accounts</title>
  <link rel="stylesheet" href="Style.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;800&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

  <div class="top-bar">
    <div class="nav">
      <a href="AdminPage.html">
        <img src="Logo.png" alt="Logo">
      </a>
      <form action="ManageGames.php" method="get" style="display:inline;">
        <button class="tab-link" type="submit">Manage Games</button>
      </form>
      <form action="logout.php" method="post" style="display:inline;">
        <button class="tab-link" type="submit">Logout</button>
      </form>
    </div>
  </div>

  <div class="main">
    <h1 style="text-align: center;">All Registered Accounts</h1>
    
    <div class="product-card" style="overflow-x:auto;">
      <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Birthday</th>
            <th>Password</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($accounts) > 0): ?>
            <?php foreach ($accounts as $acc): ?>
              <?php if ($acc['username'] === 'admin') continue; // skip admin ?>
                <tr>
                  <td><?php echo htmlspecialchars($acc['username']); ?></td>
                  <td><?php echo htmlspecialchars($acc['email']); ?></td>
                  <td><?php echo htmlspecialchars($acc['birthday']); ?></td>
                  <td>••••••••••••</td> <!-- hide password nicely -->
                </tr>
             <?php endforeach; ?>

          <?php else: ?>
            <tr><td colspan="4" style="text-align:center;">No accounts found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
