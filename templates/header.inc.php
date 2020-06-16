<?php

$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', $url);
$activePage = $segments[sizeof($segments)-1];

include "templates/db.inc.php"

?>
<head>
  <meta charset="utf-8">
  <title>Image Gallery</title>
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/bulma.min.css">
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
        <div class="buttons">
          <a href="#" class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a href="#" class="button is-light">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
