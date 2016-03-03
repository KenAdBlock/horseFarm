/**
 * Created by Darkweizer on 06/02/2016.
 */

function showmessage($formulaire){
    $("#" + $formulaire).submit(function(event) {
        var data = $(this).serialize();
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: data,
            success: function (retour) {
                if (retour.send == "ok") {
                    Materialize.toast(retour.msg, 4000);
                    document.getElementById($formulaire).reset();
                    $('#result').empty();
                }
                else {
                    $('#result').empty().append($('<span>').html(retour.msg));
                }

            }, // success()
            error: function (resultat, statut, erreur) {
                alert("Erreur dans l'encodage en javascript");
            }
        });
        return false;
    });
}