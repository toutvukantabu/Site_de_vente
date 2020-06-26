<?php
                    
           try{
            $pdo = new PDO('mysql:host=localhost;dbname=magasincovid;port=3308','root','');
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
               $supprimer_contact = $_GET['id_contact'];
               

               $sql = "DELETE FROM contact WHERE id_contact =" .$supprimer_contact;
               
               $sth = $pdo->prepare($sql);
               $sth->execute(
                
            );
           }
                
           catch(PDOException $e){
               echo "Erreur : " . $e->getMessage();
           }
           header('location:admin_message.php');
      ?>
