<?php include_once('entete.php') ?>
<?php include_once('db.php') ?>



<?php

session_start();

$info = array();

if(isset($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['password'],$_POST['password_confirm'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
  if(empty($_POST['nom'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
    array_push($info, "Le champ Nom est vide");
  } elseif(empty($_POST['prenom'])){//le champ mot de passe est vide
    array_push($info, "Le champ Prénom est vide");
  } elseif (empty($_POST['mail'])) { //le champ mot de passe est vide
    array_push($info, "Le champ Mail est vide");
  } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM user WHERE email='".$_POST['mail']."'"))==1){//on vérifie que ce mail n'est pas déjà utilisé par un autre membre
    array_push($info, "Ce mot de passe est déjà utilisé");
  } elseif(empty($_POST['password'])){//le champ mot de passe est vide
    array_push($info, "Le champ Mot de passe est vide");
  } elseif(empty($_POST['password_confirm'])){//le champ mot de passe est vide
    array_push($info, "Le champ Confirmer votre mot de passe est vide");
  } elseif($_POST['password'] != $_POST['password_confirm']){
    array_push($info, "Les mots de passes ne correspondent pas");
        
  } else {
      //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
      //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
      if(!mysqli_query($mysqli,"INSERT INTO user SET nom='".$_POST['nom']."',prenom ='".$_POST['prenom']."',email ='".$_POST['mail']."', password='".hash('sha256', $_POST['password'])."'")){//on crypte le mot de passe avec la fonction propre à PHP: md5()
        array_push($info, "Erreur").mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
      } else {
        array_push($info, "Vous êtes inscrit !");
      }
  }
}

    

?>
    

    <div class="form">

        <h1>Inscription</h1>

        <?php 

            // affiche message d'erreur
                
                
                if(isset($info)){ ?>
                <?php 

                for($i = 0; $i < count($info); ++$i) { ?>
                  <p class="request_message" style ="color: red">
                  <?= print_r($info[$i],true); ?>
                  </p>
                 
                 <?php
                }
              }

            ?>
        <form method="post" action ="inscription.php" class="inscription">

                
                <label for="nom">Nom :</label>
                <input type="mail" name ="nom" required>

                <label for="prenom">Prénom :</label>
                <input type="mail" name ="prenom" required>

                <label for="mail">Mail :</label>
                <input type="mail" name ="mail" required>

                <label for="password">Mot de passe :</label>
                <input type="password" name ="password" required>
                
                <label for="password_confirm">Confirmer votre mot de passe :</label>
                <input type="password" name ="password_confirm" required>

                <button type="submit" name="envoyer">Se connecter</button>
            </form>
            <h2 class="message_contact"> Déjà un compte ? <a href="index.php"> Se connecter</a></h2>

    </div>



<?php include_once('footer.php') ?>