<?php include_once('entete.php') ?>
<?php include_once('db.php') ?>


<?php 

$info = array();
session_start();

if(isset($_POST['mail'],$_POST['password'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
  if(empty($_POST['mail'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
    array_push($info, "Le champ mail est vide");
  } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM user WHERE email='".$_POST['mail']."'"))==0){//on vérifie que ce mail n'est pas déjà utilisé par un autre membre
    array_push($info, "Aucun compte avec cette adresse mail");
  } elseif(empty($_POST['password'])){//le champ mot de passe est vide
    array_push($info, "Le champ Mot de passe est vide");
    // elseif(){}
        
  } else {
      //toutes les vérifications sont faites, on passe à la connexion
        
        $mail = stripslashes($_REQUEST['mail']);
        $mail = mysqli_real_escape_string($mysqli, $mail);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($mysqli, $password);
            $query = "SELECT * FROM `user` WHERE email='$mail' and password='".hash('sha256', $password)."'";
            $prenom = "SELECT prenom FROM `user` WHERE email='$mail' and password='".hash('sha256', $password)."'";
            $result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
        $rows = mysqli_num_rows($result);
        if($rows == 1){

            $_SESSION['mail'] = $mail;
            header("Location: ToDo.php");
        }else{
          array_push($info, "L'email ou le mot de passe est incorrect");
        }
    }
}

?>



    <div class="form">

    <h1>Connexion</h1>

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

        
        

        <form method="post" class="connexion" >
                <label for="mail">Mail :</label>
                <input type="mail" name =" mail" >

                <label for="password">Mot de passe :</label>
                <input type="password" name ="password" >

                <button type="submit">Se connecter</button>
            </form>
            <h2 class="message_contact"> Pas encore de compte ? <a href="inscription.php"> Créer un compte</a></h2>

    </div>





<?php include_once('footer.php') ?>