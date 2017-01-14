//funcion ajax para añadir posts

function apfaddpost(posttitle,postnameart,postnameresp,postdocument,postmail,postphoto,postdraw,postcat,posttel,callback) {
    jQuery.ajax({
        type: 'POST',
        url: apfajax.ajaxurl,
        enctype: 'multipart/form-data',
        data: {
            action: 'apf_addpost',
            apftitle: posttitle,
            apfnameart: postnameart,
            apfnameresp: postnameresp,
            apfmail: postmail,
            apfdocument: postdocument,
            apfname: postname,
            apfphoto: postphoto,
            apfdraw: postdraw,
            apfcat: postcat,
            apftel: posttel

        },
        success: function(data, textStatus, XMLHttpRequest) {
            console.log(data);
            resetvalues();
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            callback("error", errorThrown);
        }
    });
}
 
function resetvalues() {
    //append body for new window
    
}