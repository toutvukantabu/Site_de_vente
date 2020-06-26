<?php require "html5_header.html.php"?>
<?php require "navbar.php"?>

<?php try{
         $pdo = new PDO('mysql:host=localhost;dbname=magasincovid;port=3308','root','');
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $id= $_GET['id_produit']; 
                    /*Sélectionne toutes les valeurs dans la table users*/
                    $sth = $pdo->prepare("SELECT * FROM produits  WHERE id_produit =".$id);
                    $sth->execute();
                   
                    /*Retourne un tableau associatif pour chaque entrée de notre table
                     *avec le nom des colonnes sélectionnées en clefs*/
                    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);  
     ?>


<div class="container">
  <div class="row ajout_produits">
  <?php  foreach ($resultat as $key=>$value){   ?>
    <form class="col s12 " action="form_update_produit.php?id_produit=<?php echo $value['id_produit']?>" method="post" enctype="multipart/form-data">
    <h5 class="center-align">modifier le produits</h5>
      <div class="row">
        <div class="input-field col s12 m6 l6 ">
          <input type="text" class="validate" name="nom_produit" value="<?php echo $value['nom_produit']?>" >
          <label >nom du produit</label>
        </div>
        <div class="input-field col s12 m6 l6">
          <input type="text" class="validate" name="fiche_technique" value="<?php echo $value['fiche_technique']?>">
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
          <input type="number" class="validate" name="prix" value="<?php echo $value['prix']?>">
          <label>prix</label>
        </div>
        <input type="hidden" name="urlImage" value="<?php echo $value['image'] ?>"></input>
        <button class="btn btnBdd waves-effect waves-light" type="submit" name="envoyer">ajouter à la base de donnée
          <i class="material-icons right">send</i>
        </button>
  
      </div>
    </form>
  </div>
</div>
<?php }
                }
       catch(PDOException $e){
                    echo "Erreur : " . $e->getMessage();
                }
            ?>

<?php require "footer.html.php"?>
<?php require "html5_body.html.php"?>