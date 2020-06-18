<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php

include_once ('templates/header.inc.php');

if (isset($_GET['user']) || isset($_SESSION['user'])) {
  if (isset($_GET['user'])) {
    $handle = $_GET['user'];

    $query = "SELECT * FROM notes WHERE  AND handle = '".$handle."'";
    $result = $conn->query($query);

    if($result->num_rows){
      $user = $result->fetch_assoc();
    }
  }
  else {
    $query = "SELECT * FROM notes WHERE handle = '".$_SESSION['user']."'";
    $result = $conn->query($query);
  }

}

?>
<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        My Notes
      </h1>
      <h2 class="subtitle">
        Search for a user's notes by entering their handle.
      </h2>
    </div>
  </div>
</section>
<section class="hero is-medium is-light">
  <div class="hero-body">
    <div class="container">
      <?php include_once ('templates/note.form.php') ?>
    </div>
  </div>
</section>
<?php include_once ('templates/footer.inc.php') ?>
</html>
