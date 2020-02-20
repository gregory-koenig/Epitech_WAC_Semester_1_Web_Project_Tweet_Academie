$(document).ready(() => {

    // récupère le dernier mot du formulaire
    function get_last_word() {
        recherche = $("#textBox").val();
        exploded = recherche.split(" ");
        exploded_c = exploded.length;
        str = exploded[exploded_c - 1];
        return str;
    }

    // fonction qui s'occupe de l'autocomplétion à partir d'une liste de nom
    // fourni par la requête ajax -- @
    function recherche_arobase(param) {
        $("#textBox").mention({
        delimiter: "@",
        username: param
        })
    }

    // fonction qui s'occupe de l'autocomplétion à partir d'une liste de nom
    // fourni par la requête ajax -- #
    function recherche_hashtag(param) {
        $("#textBox").mention({
        delimiter: "#",
        username: param
        })
    }

    $("#btnTweeter").click(function(e) {
        e.preventDefault();
        $(".s").hide;
        $(".err").hide;
        $.ajax({
            type: "POST",
            url: "tweeter.php",
            data: "textTweet=" + $("#textBox").val(),
            success: function(texte_recu) { $(".s").show()}, 
            error: function(error) { $(".err").show()},
        });
    });

    // requete lorque la touche appuyé n'est pas un espace
    $("#textBox").keyup(function(e) {
        if(e.which !== 32) {
            var last_word = get_last_word();
            if (last_word[0] === "@") {

                // requete ajax qui récupère les usernames dans la base de données
                $.ajax({
                    type: "POST",
                    url: "requete.php",
                    data: "textTweet=" + $("#textBox").val(),
                    success: function(texte_recu) { recherche_arobase(texte_recu);},
                    error: function(error) { console.log(1)},
                    dataType: 'json'
                });
            }

            // !!! problèmes
            /* else if (last_word[0] === "#") {
                $.ajax({
                    type: "POST",
                    url: "requeteh.php",
                    data: "textTweet=" + $("#textBox").val(),
                    success: function(texte_recu) { recherche_hashtag(texte_recu);},
                    error: function(error) { console.log(error)},
                    dataType: 'json'
                });
            } */
        }
    });
});