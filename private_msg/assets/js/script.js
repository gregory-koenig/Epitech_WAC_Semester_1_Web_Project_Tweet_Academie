window.onload = function () {
    document.getElementById('conversation').scrollTop
        += document.getElementById('conversation').offsetHeight * 10000
}

jQuery(function () {

    var $divError = $('<div class="alert alert-dismissible alert-danger" ' +
        'id="flash"></div>')
    var $ajaxLoader = $('<img class="img_loader" id="img_loader" ' +
        'src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif">')

    $('nav').after($divError)
    $('#conversation').append($ajaxLoader)
    $divError.hide()
    $ajaxLoader.hide()

    $('#btn_submit').click(function (e) {

        e.preventDefault()

        var date = new Date()
        var options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: "2-digit",
            minute: "2-digit"
        }
        var createdDate = date.toLocaleDateString("fr-FR", options)

        var $conversation = $('#conversation')
        var $textArea = $('#textarea_content')

        var id = $("#input_id").val()
        var content = $textArea.val()

        var $divUserDirectMessage = $('<div class="user_directmessage"></div>')
        var $divUserContent = $('<div class="user_content"></div>')
        var $pUserContent = $('<p class="p-2 user_theme">' + content + '</p>')
        var $divUserCreatedDate = $('<div class="user_created_date"></div>')
        var $pUserCreatedDate = $('<p class="p_user_created_date"><small>('
            + createdDate + ')</small></p>')

        $ajaxLoader.show()

        function focusTextArea() {
            $textArea.focus()
            $textArea.val('')
            document.getElementById('conversation').scrollTop
                += document.getElementById('conversation').offsetHeight * 10000
        }

        function displayNewMessage() {
            $ajaxLoader.hide()
            $conversation.append($divUserDirectMessage)
            $divUserDirectMessage.append($divUserContent)
            $divUserContent.append($pUserContent)
            $divUserDirectMessage.append($divUserCreatedDate)
            $divUserCreatedDate.append($pUserCreatedDate)
            focusTextArea()
        }

        $.ajax({
            type: 'POST',
            url: 'new_msg.php',
            data: {
                id: id,
                content: content
            },
            dataType: 'json',
            timeout: 3000,
            success: function (data) {
                if (data.error) {
                    $divError.text(data.data.errorMsg)
                    $divError.show()
                    focusTextArea()
                } else {
                    displayNewMessage()
                }
            },
            error: function () {
                alert("La requête n'a pas abouti.")
                focusTextArea()
            }
        })
    })
})