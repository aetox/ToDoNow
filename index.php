<?php include_once('entete.php') ?>

    

    <div class="form">

        <h1>Connexion</h1>

        <form method="post" class="connexion">
                <label for="mail">Mail :</label>
                <input type="mail" name =" mail">

                <label for="password">Mot de passe :</label>
                <input type="password" name ="password">

                <button type="submit">Se connecter</button>
            </form>
            <h2 class="message_contact"> Pas encore de compte ? <a href="inscription.php"> Créer un compte</a></h2>

    </div>





<?php include_once('footer.php') ?>