<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', $url);
$activePage = $segments[sizeof($segments)-1];


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
    <a class="navbar-item" href="#">
      <img src="assets/img/logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a href="#" class="navbar-item">
        Home
      </a>

      <a href="#" class="navbar-item">
        Gallery Search
      </a>

      <a href="#" class="navbar-item">
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
