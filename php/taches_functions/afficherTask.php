<?php 
        // Affichage taches en cours :

        $query_tasks = "SELECT * FROM `tasks` WHERE user_id='$user_id_user'";
        $result_tasks = mysqli_query($mysqli,$query_tasks) or die(mysqli_error($mysqli));

        $task = mysqli_fetch_array($result_tasks);

        return $task;   

    
        if (mysqli_num_rows($result_tasks) > 0) {    ?>
            
            <?php
            while($task = mysqli_fetch_array($result_tasks)){ ?>

                    <?php
                    // Ajouter if() afin de vérifier si les jours restants son négatifs ou non
                    $idtask = $task['id_tache'] ;
                    
                    ?>
            
                    
                    <table class="task">
                            <tr>
                                <td><?php echo $task['Titre'] ?></td>
                                <td><?php echo transformDate($task['date_debut']) ?></td>
                                <td><?php echo transformDate($task['date_fin']) ?></td>
                                
                                <!-- voir fonnction joursRestants() ?  -->
                                <td><?php echo joursRestants($task['date_fin']);?> jours restants</td>

                                <td><?php echo $task['description'] ?></td>
                                <td><?php echo "En cours" ?></td>
                                <td><?php echo $task['id_tache'] ?></td>
                                <td class="supp_task_btn"> Supprimer</td>
                                <!-- le bouton supprime toute les taches -->



                                
                            </tr>
                    </table>

                       <?php } ?>

        <?php } ?>
