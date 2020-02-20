$(document).ready(() => {

    // requete lorque la touche appuyé n'est pas un espace
    $(document).keyup(function(e) {
        if(e.which !== 32) {

            // requete ajax qui récupère les usernames dans la base de données
            $.ajax({
                type: "POST",
                url: "requeteh.php",
                data: "textTweet=" + $("#textBox").val(),
                success: function(texte_recu) { recherche(texte_recu);},
                error: function(error) { console.log(error)},
                dataType: 'json'
            });
            // fonction qui s'occupe de l'autocomplétion à partir d'une liste de nom
            // fourni par la requête ajax
            function recherche(param) {
                $("#textBox").mention({
                delimiter: "#",
                username: param
                })
            }
        }
    });
});