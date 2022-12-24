<?php include_once('entete.php') ?>
<?php include_once('db.php') ?>



  
<?php
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: connexion.php');
die;
?>
