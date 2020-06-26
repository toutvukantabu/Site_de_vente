

<?php  session_start(); ?>

<div class="navbar-fixed">
      
            <nav>
                <div class="nav-wrapper brown lighten-2">
                  
                    <a href="#" class="brand-logo ">Canin World</a>

                    <ul  class="right hide-on-med-and-down">
                    <?php if (isset($_SESSION['nom']) AND ($_SESSION['roll'] == 'user')) {
                    echo "<li class='hello'>Bonjour " . $_SESSION['nom'] . "</h4></li>
                            <li><a href='index.php'>accueil</a></li>
                            <li><a href='contact.php' >nous contacter</a></li>
                            <li><a href='logout.php' >vous deconnecter</a></li>   ";
                }  
                
              elseif(isset($_SESSION['nom']) AND ($_SESSION['roll'] == 'admin')) {
                    echo "<li class='hello'>Bonjour " . $_SESSION['nom'] . "</h4></li>
                    <li><a href='admin_message.php'>Acces messagerie</a></li>
                    <li><a href='index.php'>Ma petite boutique canine</a></li>
                    <li><a href='admin.php '  target='_blank'>acces admin</a></li>
                    <li><a href='http://localhost/phpmyadmin/index.php?server=2 ' target='_blank'>acces base de donnée</a></li>
                    <li><a href='logout.php' >vous deconnecter</a></li> ";
                }
              
              else{?>
                    <li><a href="index.php">accueil</a></li>
                    <li><a href='contact.php' >nous contacter</a></li>   
                    <li><a href="login.php" >login</a></li>
                    <li><a href="register.php" >vous enregistrer</a></li>
                    <?php }?>
                    </ul>
            </nav>
 </div>