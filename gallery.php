<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php

include_once ('templates/header.inc.php');

if (isset($_GET['user'])) {
  $user = $_GET['user'];
  
  $query = "SELECT * FROM users WHERE handle = '".$user."'";
  $result = $conn->query($query);

  if($result->num_rows){
    $user = $result->fetch_assoc();
  }

}

?>
<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Gallery
      </h1>
      <h2 class="subtitle">
        Search for a user's gallery by entering their handle.
      </h2>
    </div>
  </div>
</section>
<?php include_once ('templates/footer.inc.php') ?>
</html>
