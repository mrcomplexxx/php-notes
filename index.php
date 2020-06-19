<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include ('templates/header.inc.php') ?>
<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Welcome
      </h1>
      <h2 class="subtitle">
        This is the home page !
      </h2>
    </div>
  </div>
</section>
<section class="hero is-medium is-light">
  <div class="hero-body">
    <div class="container">
      <?php include_once ('templates/latestnotes.php') ?>
    </div>
  </div>
</section>
<?php include ('templates/footer.inc.php') ?>
</html>
