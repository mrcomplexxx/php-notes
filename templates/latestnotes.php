<?php

$query = "SELECT * FROM notes WHERE private = 0 ORDER BY created_at DESC LIMIT 4";

$res = mysqli_query($conn, $query);

$latest = mysqli_fetch_all($res, MYSQLI_ASSOC);

?>

<h2 class="subtitle">Latest Public Notes:</h2>
<div class="columns mb-6">
  <?php
  foreach ($latest as $noteInfo) {
    include ('templates/note.view.php');
  }
  ?>
</div>
