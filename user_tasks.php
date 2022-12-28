<?php include_once('entete.php') ?>
<?php include_once('db.php') ?>

<?php

// fonction ajout d'une tache dans la base de donnée de l'utilisateur
// Requete qui recupere les info de l'utilisateur connecté et le stock dans un tableau

error_reporting(E_ALL);
ini_set("display_errors", 1);

$user_id_user = $_SESSION['user_id'];

// function changement format date

function transformDate($date){

    $dt = Datetime::createFromFormat('Y-m-d',$date);
    return $dt-> format('d/m/Y');

}

function deleteTask($idtask){

   mysqli_query($mysqli, "DELETE FROM `tasks` WHERE `id_tache` = $idtask") or die(mysqli_error($mysqli));

}



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

        function dateDiff($date1, $date2){
            $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
            $retour = array();
         
            $tmp = $diff;
            $retour['second'] = $tmp % 60;
         
            $tmp = floor( ($tmp - $retour['second']) /60 );
            $retour['minute'] = $tmp % 60;
         
            $tmp = floor( ($tmp - $retour['minute'])/60 );
            $retour['hour'] = $tmp % 24;
         
            $tmp = floor( ($tmp - $retour['hour'])  /24 );
            $retour['day'] = $tmp;
         
            return $retour;
        }
    
        if (mysqli_num_rows($result_tasks) > 0) {    ?>

                        <table id="task_titre">
                            <tr>
                                <th>Titre</th>
                                <th>Date Début</th>
                                <th>Date Fin</th>
                                <th>Jours restants</th>
                                <th>Description</th>
                                <th>Statut</th>
                                <th>ID tache</th>
                                <th>Supprimer</th>


                            </tr>
                        </table> 
                        <hr>   

            
            <?php
            while($task = mysqli_fetch_array($result_tasks)){ ?>

                    <?php
                    $debut = new DateTime('now'); 
                    $fin = new DateTime($task['date_fin']);
                    $interval = $debut->diff($fin);

                    // Ajouter if() afin de vérifier si les jours restants son négatifs ou non

                    $idtask = $task['id_tache'] ;

                    
                    
                    ?>

      
            
                    
                    <table class="task">
                            <tr>
                                <td><?php echo $task['Titre'] ?></td>
                                <td><?php echo transformDate($task['date_debut']) ?></td>
                                <td><?php echo transformDate($task['date_fin']) ?></td>
                                <!-- Colonne jours restants ?  -->
                                <td><?php echo $interval->format('%R%d');?> jours restants</td>
                                <td><?php echo $task['description'] ?></td>
                                <td><?php echo "En cours" ?></td>
                                <td><?php echo $task['id_tache'] ?></td>
                                <!-- le bouton supprime toute les taches ciao -->
                                <td><button onclick="<?php mysqli_query($mysqli, "DELETE FROM `tasks` WHERE `id_tache` = $idtask") or die(mysqli_error($mysqli)); ?>">Supprimer</button></td>



                                
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