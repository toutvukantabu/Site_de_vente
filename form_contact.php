
<?php require "secu.php"?>
<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=magasincovid;port=3308','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $contact_nom =verif_donnees($_POST['contact_nom']);
    $contact_prenom = verif_donnees($_POST['contact_prenom']);
    $contact_mail = verif_donnees($_POST['contact_mail']);
    $contact_textarea =verif_donnees($_POST['contact_textarea']);
  
   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO contact(contact_nom,contact_prenom,contact_textarea,contact_mail)
        VALUES (:contact_nom,:contact_prenom,:contact_textarea,:contact_mail)
    ");
    $sth->execute(array(
                        ':contact_nom' =>$contact_nom,
                        ':contact_prenom' =>$contact_prenom,
                        ':contact_textarea' =>$contact_textarea ,
                        ':contact_mail' =>$contact_mail,));
    echo "Entrée ajoutée dans la table";
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

header('location:index.php');
?>
