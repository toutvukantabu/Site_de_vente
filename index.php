
<?php require "html5_header.html.php"?>
<?php require "navbar.php"?>

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

    <div class="parallax-container">
        <div class="parallax"><img
                src="https://remeng.rosselcdn.net/sites/default/files/dpistyles_v2/ena_16_9_extra_big/2020/03/31/node_142537/11596673/public/2020/03/31/B9723087703Z.1_20200331080011_000%2BGIKFQG0KI.1-0.jpg?itok=RxagCbwr1585634418">
        </div>
    </div>
    <div class="section brown  grey lighten-2">
    <div class="container container_prez">
        <div class="row">
            <?php  foreach ($resultat as $key=>$value){   ?>
            <div class="col s12 m6 l4 xl4">
                <div class="card" id="price">
                    <div class="card-image">
                    <span class="card-price  " ><?php echo $value['prix']?>€</span>
                        <img class="materialboxed"width="650"src="<?php echo $value['image']?>">
                    </div>
                    <div class="card-content">
                    <span class="card-title"><?php echo $value['nom_produit'] ?></span><br>
                        <p name="fiche_technique"><?php echo $value['fiche_technique']?></p>
                    </div>
                </div>
            </div>
            <?php }
                }
       catch(PDOException $e){
                    echo "Erreur : " . $e->getMessage();
                }
            ?>
        </div></div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="https://www.selection.ca/wp-content/uploads/2019/01/chien-bizarre-carlin-pug.jpg"></div>
    </div>


<?php require "footer.html.php"?>
<?php require "html5_body.html.php"?>
