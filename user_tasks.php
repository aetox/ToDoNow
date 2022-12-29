<?php include_once('php/entete.php') ?>
<?php include_once('php/taches_functions/addTask.php') ?>
<?php include_once('php/taches_functions/functionsTask.php') ?>


    <h1>Bienvenue <?php echo $_SESSION['prenom']?> </h1>

    <h2>Taches en cours :</h2>

    <!-- Ajouter fonction afficher taches -->

    <!-- Dans le fichier faire en sorte que ça selectionne des divs et qu'on inserte directemet du code 
dedans, il fautt :
- creer les divs
-les selectionnees ett ajouteer contenu avec boucle for -->
    <?php include_once('php/taches_functions/afficherTask.php') ?>




    <h2>Nouvelle tache</h2>

    <!-- Ajouter fonction ajout taches -->
    <form  method="post" name="ajout_tache_form" >

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



<?php include_once('php/footer.php') ?>