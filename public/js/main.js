/* SCRIPT LANCEMENT PRINCIPAL */


//dom loaded
$(function () {

    /** @var {Object} $envoi - Locale contient bouton submit */
    let $send = $("#sendForm");

    // envoi du message en base au click
    $send.on("click", ariNamespaceEvents.sendMessageOnClick);

    // chargement messages en base
    ariNamespaceAjax.loadMessage();
    


})
    



