
/** @var {string} $message - Globale Contient le message */
let $message;
/** @var {string} $auteur - Globale Contient le nom de l'auteur */
let $auteur;


/**
 *  Représente un namespace qui contient les requêtes ajax
 * 
 *  @namespace ariNamespaceAjax
 */
const ariNamespaceAjax = {

    /**
     * Envoie des requêtes asynchrones ajax post avec les paramètres utilisateurs
     * @property {function} sendMessage
    */
    sendMessage: () => {
        $.post(
            "application/ajaxPostMessage.php",  
            {
                auteur: $auteur,
                message: $message
            }, 
            "html" 
        ); // fin traitement ajax
    },

    /**
     * Envoie des requêtes asynchrones ajax get avec pour paramètre le dernier id     inséré
     * @property {function} loadMessage - contient la fonction qui vérifiera le dernier message inséré toutes les 4 secondes
     */
    loadMessage: () => {

        setTimeout(() => {
            /**
             * Contient l'identifiant du denrier message inséré
             * @var lastInsertId {string} 
             * */
            let lastInsertId = $("p:first").data('id');
            $.getJSON("application/ajaxLoadMessage.php?id=" + lastInsertId,
                ariNamespaceAjax.load
            );
            // fonction relancée dans le setTimeout pour répétition
            ariNamespaceAjax.loadMessage()
            //fonction relancée après 4 secondes
        }, 4000); 
        
    },
    /**
     * Fonction de callback ajax, permet d'afficher les derniers messages enregistrés grâce à la réponse du serveur
     *@property {function} load - contient la fonction de qui servira de retour
     * @param {JSON} response - La données renvoyées par le serveur
     */
    load: function (response) {
    
        if (response != "") {
        
            let message = "";

            message += "<p data-id='" + response[0].id + "'>";
            message += "<span>" + response[0].auteur + " à dit : </span>";
            message += response[0].message + "</p>" ;
            
            $("#messages").prepend(message);

        }
        
    }
    

}