<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php

include_once ('templates/header.inc.php');

$topTitle = 'Notes!';

if (isset($_GET['user']) || isset($_SESSION['user'])) {
  if (isset($_GET['user'])) {
    $changeTitle = true;
    $handle = $_GET['user'];
    $query = "SELECT * FROM notes WHERE private = 0 AND owner = '".$handle."'";
  }
  else {
    $handle = $_SESSION['user'];
    $query = "SELECT * FROM notes WHERE owner = '".$handle."'";
  }

  $result = mysqli_query($conn, $query);
  $usernotes = mysqli_fetch_all($result, MYSQLI_ASSOC);

  if (isset($changeTitle)) {
    if(empty($usernotes)){
      $topTitle = "No notes found for user @".htmlspecialchars($handle);
    }
    else {
      $topTitle = "@".htmlspecialchars($handle)."'s notes.";
    }
  }

}


$text = $title = $handle = '';
$errors = ['Content' => null, 'Title' => null, 'User' => null];

if (isset($_POST['savenote'])) {
  $private = isset($_POST['private']);
  $validForm = true;

  if(!empty($_POST['notetxt'])){
    $text = $_POST['notetxt'];
  }
  else {
    $validForm = false;
    $errors['Content'] = 'The note should have some content.';
  }

  if(!empty($_POST['title'])){
    $title = $_POST['title'];

    if(preg_match('/^[a-zA-Z\s]+$/', $title)){
      $errors['Title'] = null;
    }
    else{
      $validForm = false;
      $errors['Title'] = 'The title should be of letters and spaces only.';
    }
  }
  else {
    $validForm = false;
    $errors['Title'] = 'Title is required.';
  }

  if(isset($_SESSION['user'])){
    $handle = $_SESSION['user'];
  }
  else {
    $validForm = false;
    $error['User'] = 'User not logged in.';
  }

  if ($validForm) {
    $sql = "INSERT INTO notes (owner, title, note, private) VALUES ('".$handle."', '".$title."', '".$text."', '".$private."')";
    if ($conn->query($sql) === TRUE) {
      header('Location: notes.php'); //201
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

?>
<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        <?php echo $topTitle; ?>
      </h1>
      <h2 class="subtitle">
        <?php echo (isset($_SESSION['user'])) ? '' : 'Login or Sign Up to write notes.' ; ?>
      </h2>
    </div>
  </div>
</section>
<section class="hero is-medium is-light">
  <div class="hero-body">
    <div class="container">
      <?php
        if (isset($_SESSION['user']) && !isset($_GET['user'])){
          $charCount = true;
      ?>
      <div class="columns">
        <div class="column is-three-quarters">
          <h1 class="title">
            <?php echo (isset($_POST['editnote']))? "Edit note" : "Create New Note"; ?>
          </h1>
          <form class ="form box has-background-success" action="notes.php" method="post">
            <div class="field">
              <div class="control">
                <textarea name="notetxt" class="textarea is-primary has-fixed-size" placeholder="Write your note here ..." rows="10" maxlength="1000" id="notetxt" value="<?php echo htmlspecialchars($notetxt) ?>"></textarea>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <div class="columns">
                  <div class="column">
                    <label class="checkbox has-text-white">
                      <input type="checkbox" name="private">
                      Private Note
                    </label>
                  </div>
                  <div class="column">
                    <label class="help has-text-white has-text-right">
                      <span id="chars">0</span>/1000
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <div class="columns is-desktop">
                  <div class="column is-three-quarters-desktop">
                    <input class="input is-primary is-fullwidth" type="text" name="title" placeholder="Insert Title">
                  </div>
                  <div class="column has-text-right">
                    <div class="buttons has-addons is-right">
                      <input class="button is-danger "type="submit" name="deletenote" value="Delete" <?php echo (isset($_POST['editnote']))? '' : 'disabled'; ?>>
                      <input class="button is-warning "type="submit" name="savenote" value="Save">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="column">
          <?php if(isset($_POST['savenote'])): ?>
          <div class="notification is-danger is-light">
            <button class="delete"></button>
            <?php
            echo "<strong>Error</strong><br>";
            foreach ($errors as $field => $error){
              if($error){
                echo "<strong>" . $field . "<br></strong>" . $error . "<br>";
              }
            }
            ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    <?php
      }
      include_once ('templates/latestnotes.php');
    ?>
    </div>
  </div>
</section>
<?php include_once ('templates/footer.inc.php') ?>
</html>
