<?php require "html5_header.html.php"?>

<?php require "navbar.php"?>



<div class="container">
  <div class="row ajout_produits">
    <form class="col s12  m12 l12 " action="form_admin.php" enctype="multipart/form-data" method="post">
      <h5 class="center-align">Ajout de produits</h5>
      <div class="row">
        <div class="input-field col s12 m6 l6 ">
          <input type="text" class="validate" name="nom_produit">
          <label>nom du produit</label>
        </div>
        <div class="input-field col s12 m6 l6">
          <input type="text" class="validate" name="fiche_technique">
          <label>fiche technique</label>
        </div>
      </div>
      <div class="row">

        <div class="file-field input-fieldcol  s12  m6 l6 ">
          <div class="btn">
            <span>selectionnez une image produit</span>
            <input type="file" name="fileToUpload" id="fileToUpload">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path  input-fieldpath s12  m6 l6     validate" type="text">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m6 l6 ">
          <input type="number" class="validate" name="prix">
          <label>prix</label>
        </div>

        <button class="btn btnBdd waves-effect waves-light" type="submit" name="envoyer">ajouter à la base de donnée
          <i class="material-icons right">send</i>
        </button>

      </div>
    </form>
  </div>
</div>
<?php
     
     try{
         $pdo = new PDO('mysql:host=localhost;dbname=magasincovid;port=3308','root','');
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
                    /*Sélectionne toutes les valeurs dans la table users*/
                    $sth = $pdo->prepare("SELECT * FROM produits");
                    $sth->execute();
                   
                    /*Retourne un tableau associatif pour chaque entrée de notre table
                     *avec le nom des colonnes sélectionnées en clefs*/
                    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
     ?>
<div class="container container_prez">
  <div class="row ">
    <?php  foreach ($resultat as $key=>$value){   ?>
    <div class="col s12 m6 l6 xl4">
      <div class="card ">
        <div class="card-image">
          <span class="card-price right "><?php echo $value['prix']?>€</span>
          <img class="responsive-img" src="<?php echo $value['image']?>">
        </div>

        <div class="card-content">
          <span class="card-title"><?php echo $value['nom_produit']?></span>

          <p name="fiche_technique "><?php echo $value['fiche_technique']?></p>

          <div class="fixed-action-btn vertical" style="position: absolute; display: inline-block; right: 24px;">
          <a class="btn-floating btn-large red">
              <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
              <li><a class="btn-floating red" href="form_supp_produits.php?id_produit=<?php echo $value['id_produit']?>" ><i class="material-icons">
                    delete </i></a></li>
              <li><a class="btn-floating yellow darken-1"
                  href="update_produit.php?id_produit=<?php echo $value['id_produit']?>"><i
                    class="material-icons">update</i>
                  </a>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php }
                }
       catch(PDOException $e){
                    echo "Erreur : " . $e->getMessage();
                }
            ?>
  </div>
</div>

<?php require "footer.html.php"?>


<?php require "html5_body.html.php"?>