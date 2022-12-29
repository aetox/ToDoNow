<?php 

$user_id_user = $_SESSION['user_id'];
$info = array();


        if(isset($_POST['ajout_tache_button'])){

            extract($_POST);
        
            if(mysqli_query($mysqli, "INSERT INTO tasks SET 
            Titre='" . $_POST['titre_nouvelle_tache'] . "',
            date_debut ='" . $_POST['debut_nouvelle_tache'] . "',
            date_fin ='" . $_POST['fin_nouvelle_tache'] . "',
            description ='" . $_POST['decription_nouvelle_tache'] . "', 
            user_id ='" . $user_id_user . "'") or die(mysqli_error($mysqli)) ){
                array_push($info, "Vous êtes inscrit !");
              } else {
                array_push($info, "Erreur").mysqli_error($mysqli);
              }

       


     }   ?>
