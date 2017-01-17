//funcion ajax para añadir posts

function apfaddpost() {

  var fd = new FormData(jQuery('#suscription_form')[0]);

      fd.append('action', 'apf_addpost');

    jQuery.ajax({
        type: 'POST',
        url: apfajax.ajaxurl,
        data: fd,
        contentType: false,
        processData: false,
        success: function(data, textStatus, XMLHttpRequest) {
            sucessvalues();
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            callback("error", errorThrown);
        }
    });
}

function sucessvalues() {
    //append body for new window
    jQuery('#messages').append('<p>Tu Foto se ha añadido correctamente</p>');
    jQuery('#send_data').remove();
}
