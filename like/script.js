jQuery(function () {

    var $divError = $('<div class="alert alert-dismissible alert-danger" ' +
        'id="flash"></div>')
    var $like = $('#like')

    $('body').prepend($divError)
    $divError.hide()

    function countLike() {
        $.ajax({
            url: 'count_like.inc.php',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    $divError.text(data.data.errorMsg)
                    $divError.show()
                } else {
                    $like.append(data.data.count)
                }
            },
            error: function () {
                alert("La requête n'a pas abouti.")
            }
        })
    }

    countLike()

    $like.click(function () {
        if ($(this).is('.fa-heart-o')) {
            $(this).removeClass('fa-heart-o')
            $(this).addClass('fa-heart')

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
                error: function () {
                    alert("La requête n'a pas abouti.")
                }
            })
        } else {
            $(this).removeClass('fa-heart')
            $(this).addClass('fa-heart-o')

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
})