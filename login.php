<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
include_once ('templates/header.inc.php');

if(isset($_POST['submit'])){
  if(!empty($_POST['account']) && !empty($_POST['password'])){
    $account = $_POST['account'];
    $password = $_POST['password'];
    if (filter_var($account, FILTER_VALIDATE_EMAIL)){
      $query = "SELECT * FROM users WHERE email = '" . $account . "'";
    }
    else {
      $query = "SELECT * FROM users WHERE handle = '" . $account . "'";
    }
    
    $result = $conn->query($query);
    if($result->num_rows){
      $user = $result->fetch_assoc();
      if(password_verify ($password , $user['password'])){
        session_start();
        $_SESSION["user"] = $user['handle'];
        header('Location: index.php');
      }
      else {
        $errorMessage = 'Incorrect Password.';
      }

    }
    else{
      $errorMessage = 'No user with that email or handle.';
    }
  }
  else{
    $errorMessage = 'Enter both email and password.';
  }
}
?>
<section class="hero is-light is-fullheight-with-navbar">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
        <div class="column is-three-quarters">
          <h1 class="title">
            Login to your account.
          </h1>
          <form class="form" action="login.php" method="POST">
            <div class="field">
              <p class="control has-icons-left">
                <input name="account" class="input" type="text" placeholder="Email or Handle">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-icons-left">
                <input name="password" class="input" type="password" placeholder="Password">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control">
                <input type="submit" name="submit" value="Log in" class="button is-primary">
              </p>
            </div>
          </form>
        </div>
        <div class="column">
          <h2 class="subtitle">
            If you don't have an account you can register one by clicking the sing up button up top!
          </h2>
          <?php if(isset($errorMessage)) { ?>
            <div class="notification is-danger is-light">
              <button class="delete"></button>
              <?php echo $errorMessage; ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include_once ('templates/footer.inc.php') ?>
</html>
