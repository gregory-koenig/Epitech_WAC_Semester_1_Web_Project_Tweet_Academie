$(document).ready(() => {
    // récupère le dernier mot du formulaire
    function get_last_word() {
        recherche = $("#textBox").val();
        exploded = recherche.split(" ");
        exploded_c = exploded.length;
        str = exploded[exploded_c - 1];
        return str;
    }

    // vérifie que la longueur du tweet ne dépasse pas les 140 caractères
    function check_valid_length() {
        $(".tweetChar").hide();
        $("#btnTweeter").removeClass("disabled");
        var maxVal = 140;
        var tweetValue = $("#textBox").val();
        var tweetLength = tweetValue.length;
        if (tweetLength > maxVal) {
            var tooMuch = tweetLength - maxVal;
            $(".tweetChar").show();
            $("#btnTweeter").addClass("disabled");
            $("#lTweet").html(tooMuch);
        }
    }

    function check_arobase_word() {
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

    $("#textBox").keyup(function(e) {
        // requete lorque la touche appuyé n'est pas un espace
        if (e.which !== 32) {
            check_arobase_word();
        }
    });

    $("#textBox").keypress(function(e) {
        check_valid_length();
    });

  //   console.log("tz");
    // $('.click').click(function(e) {
    //  console.log("test");
    //  $('#like').removeClass('far');
    //  $('#like').addClass('fas');
    // })

    $("#likeImg").click(function() {
        console.log("ok");
        $("#likeImg").hide();
        $("#likeImgFull").removeClass("hidden");
    });



    function countLike() {
        $.ajax({
            url: 'count_like.inc.php',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    $divError.text(data.data.errorMsg);
                    $divError.show();
                } else {
                    if (data.data.count !== 0) {
                        $("likeImg").append(data.data.count);
                    }
                }
            },
            error: function(error) { console.log(error)}
        })
    }


    $(".likeImg").click(function() {
        console.log("ah");
        if ($("#likeImgH").is('.hidden')) {
            $(".likeImg").hide();
            $(".likeImgH").show();

            $.ajax({
                url: 'like.inc.php',
                dataType: 'json',
                success: function (data) {
                    if (data.error) {
                        $divError.text(data.data.errorMsg)
                        $divError.show()
                    } else {
                        $like.text(' ')
                        countLike()
                    }
                },
                error: function(error) { console.log(error)}
            })
        } else {
            $($like).removeClass('far')
            $($like).addClass('fas')

            $.ajax({
                url: 'dislike.inc.php',
                dataType: 'json',
                success: function (data) {
                    if (data.error) {
                        $divError.text(data.data.errorMsg)
                        $divError.show()
                    } else {
                        $like.text(' ')
                        countLike()
                    }
                },
                error: function () {
                    alert("La requête n'a pas abouti.")
                }
            })
        }
    })
});