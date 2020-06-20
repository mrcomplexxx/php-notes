<?php

if(!isset($noteInfo)){
  return;
}

?>

<div class="column is-one-quarter">
  <div class="box has-background-success">
    <textarea type="text" class="textarea is-primary has-fixed-size" rows="8" readonly><?php echo htmlspecialchars($noteInfo['note']); ?></textarea>
    <nav class="level is-mobile">
      <div class="level-left">
        <div class="level-item">
          <p class="subtitle has-text-white">
            <?php echo htmlspecialchars($noteInfo['title']); ?>
          </p>
        </div>
      </div>
      <div class="level-right">
        <div class="level-item">
          <p class="has-text-light" name="timeago"><?php echo $noteInfo['created_at']; ?></p>
        </div>
      </div>
    </nav>
    <form action="notes.php" method="post">
      <input type="number" name="noteId" value="<?php echo $noteInfo['id']; ?>" hidden>
      <input type="text" name="noteTitle" value="<?php echo htmlspecialchars($noteInfo['title']); ?>" hidden>
      <input type="text" name="noteText" value="<?php echo htmlspecialchars($noteInfo['note']); ?>" hidden>
      <div class="buttons has-addons is-right">
      <?php
      if(isset($_SESSION['user'])){
        if ($_SESSION['user']!==$noteInfo['owner']){
      ?>
        <a class="button is-fullwidth mt-6 mb-2" href="<?php echo 'notes.php?user='.htmlspecialchars($noteInfo['owner']); ?>"><?php echo '@'.htmlspecialchars($noteInfo['owner']); ?></a>
      <?php }else{ ?>
        <input class="button is-danger is-fullwidth" type="submit" name="deletenote" value="Delete Note">
        <input class="button is-warning is-fullwidth" type="submit" name="editnote" value="Edit Note">
      <?php }}else { ?>
        <a class="button is-fullwidth mt-6 mb-2" href="<?php echo 'notes.php?user='.htmlspecialchars($noteInfo['owner']); ?>"><?php echo '@'.htmlspecialchars($noteInfo['owner']); ?></a>
      <?php } ?>
      </div>
    </form>
  </div>
</div>
