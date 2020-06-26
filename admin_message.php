<?php require "html5_header.html.php"?>
<?php require "navbar.php"?>

<?php
     
     try{
         $pdo = new PDO('mysql:host=localhost;dbname=magasincovid;port=3308','root','');
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
                    /*Sélectionne toutes les valeurs dans la table users*/
                    $sth = $pdo->prepare("SELECT * FROM contact");
                    $sth->execute();
                   
                    /*Retourne un tableau associatif pour chaque entrée de notre table
                     *avec le nom des colonnes sélectionnées en clefs*/
                    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
      
     ?>


<table class="striped responsive-table" >
        <thead>
          <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Message</th>
              <th>répondre</th>
              <th>supprimer message</th>

          </tr>
        </thead>

        <tbody>
        <?php  foreach ($resultat as $key=>$value){   ?>
          <tr>
            <td><?php echo $value['contact_nom'] ?></td>
            <td><?php echo $value['contact_prenom']?></td>
            <td><?php echo $value['contact_textarea']?></td>
            <td> <a href="mailto:<?php echo $value['contact_mail']?>"><button class="btn waves-effect waves-light" type="submit" name="action"> répondre
            <i class="material-icons right">send</i></button></a></td>
            <td> <a href="supp_message.php?id_contact=<?php echo $value['id_contact']?>"><button class="btn waves-effect waves-light red" type="submit" name="action">supprimer message
            <i class="material-icons right">delete</i></button></a></td>

          </tr>
          <?php }
                }
       catch(PDOException $e){
                    echo "Erreur : " . $e->getMessage();
                }
            ?>
        </tbody>
      </table>
      <?php require "footer.html.php"?>
  <?php require "html5_body.html.php"?>
