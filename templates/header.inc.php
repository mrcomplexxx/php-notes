<?php

session_start();

$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', $url);
$activePage = $segments[sizeof($segments)-1];

include "templates/db.inc.php";
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Image Gallery</title>
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/bulma.min.css">
  <script src="https://kit.fontawesome.com/ddaf057a3b.js" crossorigin="anonymous"></script>
</head>

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <img src="assets/img/logo.png" width="112" height="28">
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a href="index.php" class="navbar-item">
        Home
      </a>

      <a href="gallery.php" class="navbar-item">
        Gallery Search
      </a>

      <a href="about.php" class="navbar-item">
        About
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
      <?php if(!isset($_SESSION['user'])):?>
        <div class="buttons">
          <a href="register.php" class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a href="login.php" class="button is-light">
            Log in
          </a>
        </div>
      <?php else: ?>
        <div class="field has-addons ml-4">
          <form class="control" action="gallery.php" method="get">
            <input class="button is-info" type="submit" name="user" value="<?php echo "@" . $_SESSION['user']; ?>">
          </form>
          <form class="control" action="logout.php" method="post">
            <input class="button is-warning" type="submit" name="logout" value="Log Out">
          </form>
        </div>
      <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
