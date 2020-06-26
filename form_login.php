<?php require "secu.php"?>

<?php
     
     try{
         $pdo = new PDO('mysql:host=localhost;dbname=magasincovid;port=3308','root','');
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   $nom=$_POST['nom'];
                    $sth = $pdo->prepare("SELECT * FROM users WHERE nom=:nom");
                   
                    $sth->execute(array(
                        'nom'=>$nom));       
                    $resultat = $sth->fetch();
                    $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);
   
                    if (!$resultat )
                    {
                        echo 'Mauvais identifiant ou mot de passe mauvais role!';
    
                    }
                    else
                    {
                        if ($isPasswordCorrect){
                            session_start();
                            $_SESSION['id_user'] = $resultat['id_user'];
                            $_SESSION['nom'] = $nom;
                            $_SESSION['roll']=$resultat['roll'];
                            echo 'Vous êtes connecté !';
                        }
                        else {
                            echo 'Mauvais identifiant ou mot de passe !';
                        }
                    }

                     }
       catch(PDOException $e){
                    echo "Erreur : " . $e->getMessage();
                }
                header('location:index.php');
     ?>