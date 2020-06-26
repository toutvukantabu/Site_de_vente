<?php require "secu.php"?>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

?>


<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=magasincovid;port=3308','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $nom_produit = verif_donnees($_POST['nom_produit']);
    $fiche_technique =verif_donnees ($_POST['fiche_technique']);
    $prix= verif_donnees($_POST['prix']);
    $image = "uploads/".$_FILES["fileToUpload"]["name"];
   
 
   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO produits(nom_produit,fiche_technique,prix,image)
        VALUES (:nom_produit,:fiche_technique,:prix,:image)
    ");
    $sth->execute(array(
                        ':nom_produit' => $nom_produit,
                        ':fiche_technique' =>$fiche_technique,
                        ':prix' =>$prix,
                        ':image' => $image,));
    echo "Entrée ajoutée dans la table";
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

header('location:admin.php');
?>
<!-- SUPPRIMER UNE ENTREE -->
<!-- ++++++++++++++++++++++++++++++ -->


