
/** @var {string} $message - Globale va récupérer la valeur du message */
let $message;
/** @var {string} $auteur - Globale va récupérer la valeur de l'auteur */
let $author;
/** @var {string} $auteur - Globale va récupérer l'élément html form' */
let $form;

// let formData = new FormData(document.getElementById("form"));


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
    sendMessage: async () => {

        try {
            /* let datas = {
                author: $author,
                message: $message
            }, */
            const formData = new FormData(document.getElementById("form"));
            const initRequest = {
                method: "POST",
                // headers: { 'Content-Type': 'application/json' },
                body: formData
            };
            const request = new Request("application/ajaxPostMessage.php", initRequest)
            let response = await fetch(request);
            if (response.ok === false ) {
                console.error(`Retour du serveur : ${response.status}`);
            } 
        } catch (error) {
            alert(`Erreur attrapée voir le message suivant : ${error.message}, contacter le gérant du site si le problème persiste`);
        }
        
    },

    /**
     * Envoie des requêtes asynchrones ajax get avec pour paramètre le dernier id inséré
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
                ariNamespaceAjax.displayMessage
            ); 
            // fonction relancée dans le setTimeout pour répétition
            ariNamespaceAjax.loadMessage()
            //fonction relancée après 4 secondes
        }, 4000); 
        
    },
    /**
     * Fonction de callback pour getJSON, permet d'afficher les derniers messages enregistrés, formate la réponse et l'ajoute au DOM
     *@property {function} display - contient la fonction de qui servira de retour
     * @param {JSON} response - représente Les données renvoyées par le script serveur
     */
    displayMessage: response => {
    console.log(response)
        if (response != "") {
        
            /* let message = "";

            message += "<p data-id='" + response[0].id + "'>";
            message += "<span>" + response[0].auteur + " à dit : </span>";
            message += response[0].message + "</p>"; */
            
            let message =
                `<p data-id='${response[0].id}'>
                    <span>${response[0].auteur} à dit :</span> ${response[0].message}
                </p>`;
            
            $("#messages").prepend(message);

        }
        
    }
    

} // fin namespace ariNamespaceAjax