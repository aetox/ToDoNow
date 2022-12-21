<?php include_once('entete.php') ?>

    

    <div class="form">

        <h1>Inscription</h1>

        <form method="post" class="inscription">

                <label for="nom">Nom :</label>
                <input type="mail" name ="nom">

                <label for="nom">Prénom :</label>
                <input type="mail" name ="prenom">

                <label for="mail">Mail :</label>
                <input type="mail" name ="mail">

                <label for="password">Mot de passe :</label>
                <input type="password" name ="password">
                
                <label for="password_confirm">Confirmer votre mot de passe :</label>
                <input type="password" name ="password_confirm">

                <button type="submit">Se connecter</button>
            </form>
            <h2 class="message_contact"> Déjà un compte ? <a href="index.php"> Se connecter</a></h2>

    </div>



<?php include_once('footer.php') ?>