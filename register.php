<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php

include_once ('templates/header.inc.php');

$name = $email = $password = $confirm_password = $handle = '';
$errors = ['name' => null, 'email' => null, 'password' => null, 'confirm_password' => null, 'handle' => null];

if(isset($_POST['register'])){
  $validForm = true;

  if(!empty($_POST['name'])){
    $name = $_POST['name'];

    if(preg_match('/^[a-zA-Z\s]+$/', $name)){
      $errors['name'] = null;
    }
    else{
      $validForm = false;
      $errors['name'] = 'The name should be of letters and spaces only.';
    }
  }
  else {
    $validForm = false;
    $errors['name'] = 'Name is required.';
  }

  if(!empty($_POST['email'])){
    $email = $_POST['email'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $query = "SELECT * FROM users WHERE email = '".$email."'";
      $result = $conn->query($query);

      if(!$result->num_rows){
        $errors['email'] = null;
      }
      else {
        $validForm = false;
        $errors['email'] = 'The email is allready in use.';
      }
    }
    else{
      $validForm = false;
      $errors['email'] = 'The email should be a valid email adress.';
    }
  }
  else {
    $validForm = false;
    $errors['email'] = 'Email is required.';
  }

  if(!empty($_POST['password'])){
    $password = $_POST['password'];

    if(strlen($password)>=6){
      $errors['password'] = null;
    }
    else{
      $validForm = false;
      $errors['password'] = 'The password should be at least 6 characters.';
    }
  }
  else{
    $validForm = false;
    $errors['password'] = 'Password is required.';
  }


  if(!empty($_POST['confirm_password'])){
    $confirm_password = $_POST['confirm_password'];

    if($confirm_password != $password){
      $validForm = false;
      $errors['confirm_password'] = 'The passwords are not identical';
    }
    else{
      $errors['confirm_password'] = null;
    }
  }
  else {
    $validForm = false;
    $errors['confirm_password'] = 'You must re-write your password.';
  }

  if(!empty($_POST['handle'])){
    $handle = $_POST['handle'];

    if(strlen($handle)<4){
      $validForm = false;
      $errors['handle'] = 'Handle should be at least 4 characters.';
    }
    else{
      $query = "SELECT * FROM users WHERE handle = '".$handle."'";
      $result = $conn->query($query);

      if(!$result->num_rows){
        $errors['handle'] = null;
      }
      else {
        $validForm = false;
        $errors['handle'] = 'The handle is allready in use.';
      }
    }
  }
  else {
    $validForm = false;
    $errors['handle'] = 'A handle is required.';
  }

  if ($validForm) {
    $hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
    $sql = "INSERT INTO users (name, email, password, handle) VALUES ('".$name."', '".$email."', '".$hash."', '".$handle."')";

    if ($conn->query($sql) === TRUE) {
      session_start();
      $_SESSION["user"] = $handle;
      header('Location: index.php'); //201
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

?>
<section class="hero is-light is-fullheight-with-navbar">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
        <div class="column is-three-quarters">
          <h1 class="title">
            Register a new account and start uploading!
          </h1>
          <form method="post" action="register.php" class="form">
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input name="name" class="input" type="text" placeholder="Name" value="<?php echo htmlspecialchars($name) ?>">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
                <span class="icon is-small is-right is-hidden">
                  <i class="fas fa-check"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input name="email" class="input" type="email" placeholder="Email" value="<?php echo htmlspecialchars($email) ?>">
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
                <span class="icon is-small is-right is-hidden">
                  <i class="fas fa-check"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input name="password" class="input" type="password" placeholder="Password" value="<?php echo htmlspecialchars($password) ?>">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
                <span class="icon is-small is-right is-hidden">
                  <i class="fas fa-check"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input name="confirm_password" class="input" type="password" placeholder="Re-Type Password" value="<?php echo htmlspecialchars($confirm_password) ?>">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
                <span class="icon is-small is-right is-hidden">
                  <i class="fas fa-check"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input name="handle" class="input" type="text" placeholder="Handle" value="<?php echo htmlspecialchars($handle) ?>">
                <span class="icon is-small is-left">
                  <i class="fas fa-at"></i>
                </span>
                <span class="icon is-small is-right is-hidden">
                  <i class="fas fa-check"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control">
                <input name="register" type="submit" value="Register" class="button is-primary">
              </p>
            </div>
          </form>
        </div>
        <div class="column">
          <div class="notification is-danger is-light">
            <button class="delete"></button>
            <?php
            if (isset($_POST['register'])) {
              echo "<strong>Error</strong><br>";
              foreach ($errors as $field => $error){
                if($error){
                  echo "<strong>" . $field . "<br></strong>" . $error . "<br>";
                }
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include_once ('templates/footer.inc.php') ?>
</html>
