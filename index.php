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
<section class="hero is-large is-light">
  <div class="hero-body">
    <div class="container">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="field">
          <div class="file is-medium is-centered is-boxed is-success has-name">
            <label class="file-label">
              <input class="file-input" type="file" name="uploadFile" id="uploadFile">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Chose Picture
                </span>
              </span>
              <span class="file-name">
                Name of select file will appear here
              </span>
            </label>
          </div>
        </div>
        <input class="button is-centered is-success" type="submit" value="Upload Image" name="submit">
      </form>
    </div>
  </div>
</section>
<?php include ('templates/footer.inc.php') ?>
</html>
