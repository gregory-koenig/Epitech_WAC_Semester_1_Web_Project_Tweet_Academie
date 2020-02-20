$(document).ready(function(){


    $("#submit").click(function{


        $.post(

            'connexion.php', // Un script PHP que l'on va créer juste après

            {

                login : $("#pseudo").val(),  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php

                password : $("#mdp").val()

            },


            function(data){    

                if(data == 'Success'){

                     // Le membre est connecté. Ajoutons lui un message dans la page HTML.


                     $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");

                }

                else{

                     // Le membre n'a pas été connecté. (data vaut ici "failed")


                     $("#resultat").html("<p>Erreur lors de la connexion...</p>");

                }

            },


            'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !

         );


    });


});