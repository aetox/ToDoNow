<?php include_once('php/entete.php') ?>

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



<?php include_once('php/footer.php') ?>