
/**
 * Représente un namespace qui contient les callback des évènements
 * 
 * @namespace ariNamespaceEvents
 */
const ariNamespaceEvents = {

    /**
     * Contient la fonction de callback pour l'envoi du message au click, vérifie les données utilisateur, affiche le message envoyé et déclenche la requête ajax
     * 
     * @property {function} sendMessageOnClick
     * @param {event} e - représente l'objet event
     */
    sendMessageOnClick :function (e) {

    e.preventDefault();

    /** @var {string} $error - Locale Contient le message d'erreur */
    let $error = $(".error");

    //capture du message et auteur au clic avec protection des données utilisateur
    $message = encodeURIComponent($('#message').val().trim());
    $auteur  = encodeURIComponent($('#auteur').val().trim());   


    if ($message != "" && $auteur != "") {

        //appel ajax
        ariNamespaceAjax.sendMessage();
        // on retire le popup d'erreur s'il est activé
        $error.fadeOut();
        // on vide le champ textarea
        $("textarea").val('');
        // on ajoute le message courant juste au dessus
        $('#messages').append("<p><span>" + decodeURIComponent($auteur) + " dit : </span>" + decodeURIComponent($message) + "</p>"); 
        
        } else {
            //pop up erreur
            $error.fadeIn();
            
        }
    
    }
    
} // fin namespace ariNamespaceEvents


