<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
include ('templates/header.inc.php');

if(isset($_POST['formSubmitted'])){
  if(isset($_POST['email'], $_POST['password'])){
    $name = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '" . $name . "' AND password = '" . $password . "'";

    $result = $conn->query($query);
    if($result){

      $user = $result->fetch_assoc();

      session_start();
      $_SESSION["id"] = $user['id'];
      header('Location: index.php');
    }
    else{
      $errorMessage = 'Wrong credentials';
    }
  }
  else{
    $errorMessage = 'Enter the required data';
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
                <input name="email" class="input" type="email" placeholder="Email">
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
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
                <button name="formSubmitted" type="submit" class="button is-primary">
                  Login
                </button>
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
<?php include ('templates/footer.inc.php') ?>
</html>
