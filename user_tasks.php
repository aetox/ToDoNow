<?php include_once('entete.php') ?>
<?php include_once('db.php') ?>

<?php

// fonction ajout d'une tache dans la base de donnée de l'utilisateur
// Requete qui recupere les info de l'utilisateur connecté et le stock dans un tableau

$user_id_user = $_SESSION['user_id'];


?>


    <h1>Bienvenue <?php echo $_SESSION['prenom']?> </h1>

    <h2>Taches en cours :</h2>
    <?php 
    $info = array();


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

    <?php 
        // Affichage taches en cours :

        $query_tasks = "SELECT * FROM `tasks` WHERE user_id='$user_id_user'";
        $result_tasks = mysqli_query($mysqli,$query_tasks) or die(mysqli_error($mysqli));
    
        if (mysqli_num_rows($result_tasks) > 0) {    ?>

                        <table>

                            <tr>
                                <th>Titre</th>
                                <th>Date Début</th>
                                <th>Date Fin</th>
                                <th>Description</th>
                                <th>Statut</th>
                            </tr>
                        </table>    

            
            <?php
            while($task = mysqli_fetch_array($result_tasks)){ ?>
                    
                    <table>
                            <tr>
                                <td><?php echo $task['Titre'] ?></td>
                                <td><?php echo $task['date_debut'] ?></td>
                                <td><?php echo $task['date_fin'] ?></td>
                                <td><?php echo $task['description'] ?></td>
                                <td><form action="#" method="post"><input type="checkbox" name="#" id="#"></form></td>

                            </tr>
                    </table>

                       <?php } ?>

        <?php } ?>


<?php 

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



    <h2>Nouvelle tache</h2>
    <form  method="post"  action="user_tasks.php" name="ajout_tache_form" >

        <label for="titre_nouvelle_tache">Titre :</label>
        <input type="text" name="titre_nouvelle_tache" id="titre_nouvelle_tache">
        
        <label for="debut_nouvelle_tache">Date debut de tache:</label>
        <input type="date" name="debut_nouvelle_tache" id="debut_nouvelle_tache">


        <label for="fin_nouvelle_tache">Date fin de tache:</label>
        <input type="date" name="fin_nouvelle_tache" id="fin_nouvelle_tache">

        <label for="decription_nouvelle_tache">Decription de tache:</label>
        <textarea name="decription_nouvelle_tache" id="decription_nouvelle_tache" cols="8" rows="5"></textarea>

        <button type="submit" value="submit_tache" name="ajout_tache_button">Ajouter</button>
        <button type="reset" value="reset_tache">Annuler</button>


    </form>



<?php include_once('footer.php') ?>