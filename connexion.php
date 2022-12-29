<?php include_once('php/entete.php') ?>
<?php include_once('php/user_functions/connexion_fct.php') ?>


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

        
        

        <form method="post"  class="connexion" >
                <label for="mail">Mail :</label>
                <input type="mail" name =" mail" >

                <label for="password">Mot de passe :</label>
                <input type="password" name ="password" >

                <button type="submit">Se connecter</button>
            </form>
            <h2 class="message_contact"> Pas encore de compte ? <a href="inscription.php"> Créer un compte</a></h2>

    </div>





<?php include_once('php/footer.php') ?>