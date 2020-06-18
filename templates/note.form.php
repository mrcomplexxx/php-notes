<?php

$edit = isset($_POST['editnote']);



if (isset($_POST['savenote'])) {
  $validForm = true;
}

?>
<div class="columns">
  <div class="column is-three-quarters">
    <h1 class="title">
      <?php echo ($edit)? "Edit note" : "Create New Note"; ?>
    </h1>
    <form class ="form box has-background-success" action="index.html" method="post">
      <div class="field">
        <div class="control">
          <textarea class="textarea is-primary has-fixed-size" placeholder="Write your note here ..." rows="10"></textarea>
        </div>
      </div>
      <div class="field">
        <div class="control">
          <div class="columns">
            <div class="column">
              <label class="checkbox has-text-white">
                <input type="checkbox">
                Private Note
              </label>
            </div>
            <div class="column">
              <label class="help has-text-white has-text-right">
                0/1000
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="field">
        <div class="control">
          <div class="columns">
            <div class="column is-three-quarters">
              <input class="input is-primary" type="text" name="title" placeholder="Insert Title">
            </div>
            <div class="column has-text-right">
              <div class="buttons has-addons is-right">
                <input class="button is-danger "type="submit" name="deletenote" value="Delete" disabled>
                <input class="button is-warning "type="submit" name="savenote" value="Save">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="column">
    <?php if(isset($errorMessage)): ?>
      <div class="notification is-danger is-light">
        <button class="delete"></button>
        <?php echo $errorMessage; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
