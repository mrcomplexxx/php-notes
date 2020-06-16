<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include ('templates/header.inc.php') ?>
<section class="hero is-light is-fullheight-with-navbar">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
        <div class="column is-three-quarters">
          <h1 class="title">
            Register a new account and start uploading!
          </h1>
          <form class="form" action="index.html" method="post">
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input class="input" type="text" placeholder="Name">
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
                <input class="input" type="email" placeholder="Email">
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
                <input class="input" type="password" placeholder="Password">
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
                <input class="input" type="password" placeholder="Re-Type Passowrd">
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
                <input class="input" type="text" placeholder="Handle">
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
                <button class="button is-primary">
                  Register
                </button>
              </p>
            </div>
          </form>
        </div>
        <div class="column">
        </div>
      </div>
    </div>
  </div>
</section>
<?php include ('templates/footer.inc.php') ?>
</html>
