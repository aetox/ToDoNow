<?php include_once('../TodoNow/entete.php') ?>



  
<?php
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: ../../connexion.php');
die;
?>
