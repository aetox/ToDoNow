
<?php session_start(); ?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/tasks.css">

    <title>ToDoNow</title>
</head>

<header>
        <h1 id="titre" ><a href="index.php">ToDoNow</a></h1>

        <ul id="menu">
            <li><a href="index.php">Accueil</a></li>
            <?php if (isset($_SESSION['logged_user'])) { ?>
                <li><a href="user_profile.php">Mon Profil</a></li>
                <li><a href="user_tasks.php">Mes Taches</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            <?php }else { ?>

                <li><a href="connexion.php">Se connecter</a></li>
                <li><a href="inscription.php">S'inscrire</a></li>


            <?php } ?>


        
        </ul>
</header>

<body>
