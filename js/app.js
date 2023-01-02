// Ajouter evenement sur le bouton supprimer
const event_supp_btn = document.getElementsByClassName("supp_task_btn").addEventListener("click", deleteTask);



//Fonction qui supprime la tache de la base de donnée


//Fonction qui supprime la tache de la base de donnée

function afficherTask(){

    $.ajax({
        url: '../php/taches_functions/afficherTask.php',
        type: 'POST',
        success: function(response) {
          $('#tasks').html(response);
        }
      });
    
}

