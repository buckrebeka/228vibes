// Récupération de l'erreur
let errorPseudo = document.getElementById("error_pseudo");
let errorEmail = document.getElementById("error_email");
let emailMdp = document.getElementById("error_mpd");

function addText(inputField,errorText) {
    inputField.addEventListener(eventItem, function () {
        // si l'input est vide
        if (inputField.value == "") {
            // afficher le message d'erreur
            errorText.textContent = "Veuillez remplir ce champ svp";
            inputField.style.border = '1px solid red';
            
        }
        //  si non
        else {
            errorText.textContent = "";
            inputField.style.border = '1px solid';
        }
    }
};
// Champ de l'input pseudo
addText( inputPseudo,PseudoError,'input');
// Champ de l'input pemail
addText( inputEmail,emailError,'input');
// Champ de l'input mdp
addText( inputMdp,mdpError,'input');