<?php require "secu.php"?>
      
      <?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=magasincovid;port=3308','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $id_produit= verif_donnees($_GET['id_produit']);
    $nom_produit = verif_donnees($_POST['nom_produit']);
    $fiche_technique = verif_donnees($_POST['fiche_technique']);
    $prix = verif_donnees($_POST['prix']);
  
    if ($_FILES["fileToUpload"]['name'] != '') {
      $image = "uploads/".$_FILES["fileToUpload"]["name"];
  }else {
      $image = $_POST['urlImage'];
  }


              //On prépare la requête et on l'exécute
               $sth = $pdo->prepare("
                 UPDATE `produits`
                 SET`nom_produit`='$nom_produit',
                 `fiche_technique`='$fiche_technique',
                 `prix`='$prix',
                 `image` = '$image'
                 WHERE`id_produit`= $id_produit
               ");
               $sth->execute();

              // header("location:administration.php");
           }
                
           catch(PDOException $e){
               echo "Erreur : " . $e->getMessage();
           }
           header('location:admin.php');
       ?>
