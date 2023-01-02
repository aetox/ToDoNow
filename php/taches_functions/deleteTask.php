<?php

function deleteTask($idtask){

global $mysqli;

mysqli_query($mysqli, "DELETE FROM `tasks` WHERE `id_tache` = $idtask") or die(mysqli_error($mysqli));

}

?>

