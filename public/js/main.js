/* SCRIPT LANCEMENT PRINCIPAL */


//dom loaded
$(function () {

    /** @var {Object} $envoi - Locale contient bouton submit */
    let $envoi = $("#envoi");

    // envoi du message en base au click
    $envoi.on("click", ariNamespaceEvents.sendMessageOnClick);

    // chargement messages en base
    ariNamespaceAjax.loadMessage();
    


})
    



