<?php require "html5_header.html.php"?>
<?php require "navbar.php"?>

  <div class="container">
    <div class="row">
      <form class="col s12 " action="form_login.php" method="post">
        <h5 class="center-align">login</h5>
        <div class="row">
          <div class="input-field col s12 m4">
            <input type="text" class="validate" name="nom">
            <label>Entrer votre login</label>
          </div>
          <div class="input-field col s12 m4">
            <input type="password" class="validate" name="mdp">
            <label>entrer votre mot de passe</label>
          </div>
                  <div class="row">
          <button class="btn waves-effect waves-light  " type="submit" value=envoyer>vous logguer
            <i class="material-icons right">send</i>
          </button>
        </div>
      </form>
    </div>
  </div>


  <?php require "footer.html.php"?>
  <?php require "html5_body.html.php"?>
