/* SCRIPT LANCEMENT PRINCIPAL */


//dom loaded
$(function () {

    /** @var {Object} $envoi - Locale contient bouton submit */
    let $send = $("#sendForm");

    $form = $("#form");

    // envoi du message en base a la soumission
    $form.on("submit", ariNamespaceEvents.sendMessageOnClick);

    // chargement messages en base
    ariNamespaceAjax.loadMessage();
    


})
    



