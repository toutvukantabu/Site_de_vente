
<?php require "secu.php"?>
<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=magasincovid;port=3308','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $nom= verif_donnees($_POST['nom']);
    $mdp = password_hash( $_POST['mdp'], PASSWORD_DEFAULT) ;
  
   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO users(nom,mdp)
        VALUES (:nom,:mdp)
    ");
    $sth->execute(array(
                        ':nom' => $nom,
                        ':mdp' => $mdp,));
    echo "Entrée ajoutée dans la table";
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

header('location:index.php');
?>
