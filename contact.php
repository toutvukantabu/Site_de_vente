<?php require "html5_header.html.php"?>
<?php require "navbar.php"?>

<div class="container"  >
  <div class="row">
    <form class="col s12 " action="form_contact.php" method="post">
      <h5 class="center-align">nous contacter</h5>
      <div class="row">
        <div class="input-field col s4">
          <input type="text" class="validate" name="contact_nom">
          <label>Nom</label>
        </div>
        <div class="input-field col s4">
          <input type="text" class="validate" name="contact_prenom">
          <label>prenom</label>
        </div>
        <div class="input-field col s4">
          <input type="email" class="validate" name="contact_mail">
          <label>email</label>
        </div>
      </div>
           <div class="row">
           <div class="input-field col s12">
            <textarea id="textarea2" class="materialize-textarea" data-length="120" name="contact_textarea" > </textarea>
            <label for="textarea2">Textarea</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="envoyer">Envoyez votre demande
          <i class="material-icons right">send</i>
        </button>
      </div>
    </form>
  </div>
  </div>
  <?php require "footer.html.php"?>
  <?php require "html5_body.html.php"?>
