jQuery(function () {

    var $divError = $('<div class="alert alert-dismissible alert-danger" ' +
        'id="flash"></div>')
    var $ajaxLoader = $('<img class="img_loader" id="img_loader" ' +
        'src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif">')
    var $textArea = $('#textarea_content')

    var id = $("#input_id").val()
  
    var content
 
    var WindowObjectReference = null
    var strUrl = 'send_msg/send_msg_popup.php?ID=' + id
    var strWindowFeatures = 'width=720,height=480,resizable,scrollbars=yes,'
        + 'status=1'

    $('body').after($divError)
    $divError.hide()

    function sendMsgPopup() {
        if (WindowObjectReference == null || WindowObjectReference.closed) {
            WindowObjectReference = window.open(strUrl, 'popup',
                strWindowFeatures)
        } else {
            WindowObjectReference.focus()
        }
    }

    $('#btn_send').click(function(e) {
        e.preventDefault()
        sendMsgPopup()
    })

    $('#btn_submit').click(function (e) {

        e.preventDefault()
        content = $textArea.val()
        $.ajax({
            type: 'POST',
            url: 'inc/send_msg.inc.php',
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
                } else {
                    $('.container').replaceWith($ajaxLoader)
                    alert("Le message a bien été envoyé.")
                    window.close()
                }
            },
            error: function () {
                
                alert("La requête n'a pas abouti.")
            }
        })
    })
})