<?php require "secu.php"?>


<?php

           try{
            $pdo = new PDO('mysql:host=localhost;dbname=magasincovid;port=3308','root','');
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
              
               $supprimer = verif_donnees($_GET['id_produit']);

               $sql = "DELETE FROM produits WHERE id_produit=" .$supprimer;
               
               $sth = $pdo->prepare($sql);
               
               
               $sth->execute(
                
            );

           }
                
           catch(PDOException $e){
               echo "Erreur : " . $e->getMessage();
           }
           header('location:admin.php');
       ?>
