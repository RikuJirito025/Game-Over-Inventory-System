<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Login.html");
    exit();
}

$game = $_POST['game'] ?? '';
$username = $_SESSION['username'];

if ($game) {
    $owned_file = 'owned_games.txt';
    $owned_games = file_exists($owned_file) ? file($owned_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

    $already_owned = false;
    foreach ($owned_games as $line) {
        list($user, $owned_game) = explode('|', $line);
        if ($user === $username && $owned_game === $game) {
            $already_owned = true;
            break;
        }
    }

    if ($already_owned) {
        echo "<script>
            alert('You already own this game!');
            window.location.href = 'index.php';
        </script>";
        exit();
    }

    // Add to session cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!in_array($game, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $game;
    }

    header("Location: Cart.php");
    exit();
}
?>
