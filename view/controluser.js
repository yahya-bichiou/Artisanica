let formUser = document.getElementById('userform')

        formUser.addEventListener("submit", function (event) {
            var nomField = document.getElementById("nom_user");
            var erreurNom = document.getElementById("erreurNom_user");
            var prenomField = document.getElementById("prenom_user");
            var erreurPrenom = document.getElementById("erreurPrenom_user");
            var emailField = document.getElementById("email_user");
            var erreurEmail = document.getElementById("erreurEmail_user");
            var mdpField = document.getElementById("mdp_user");
            var erreurMdp = document.getElementById("erreurMdp_user");
            var adresseField = document.getElementById("adresse_user");
            var erreurAdresse = document.getElementById("erreurAdresse_user");
            var telField = document.getElementById("tel_user");
            var erreurTel = document.getElementById("erreurTel_user");
            var cinField = document.getElementById("cin_user");
            var erreurCin = document.getElementById("erreurCin_user");

            var allowedExtensions = ["@gmail.com"];
            var inputValue = emailField.value.trim().toLowerCase();

            // Check if the input ends with a valid extension
            var isValidExtension = allowedExtensions.some(function (extension) {
                return inputValue.endsWith(extension);
            });


            if (nomField.value.trim().length > 20) {
                event.preventDefault();
                erreurNom.textContent = "Le champ Nom ne doit pas dépasser 20 caractères.";
            }
            else if (nomField.value.trim().length == 0) {
                event.preventDefault();
                erreurNom.textContent = "Le champ Nom ne doit pas être vide.";
            }
            else {
                erreurNom.textContent = "";
            }
            if (prenomField.value.trim().length > 20) {
                event.preventDefault();
                erreurPrenom.textContent = "Le champ Prenom ne doit pas dépasser 20 caractères.";
            }
            else if (prenomField.value.trim().length == 0) {
                event.preventDefault();
                erreurPrenom.textContent = "Le champ Prenom ne doit pas être vide.";
            }
            else {
                erreurPrenom.textContent = "";
            }

            if (!isValidExtension) {
                event.preventDefault();
                erreurEmail.textContent = "Le champ Email doit se terminer par @gmail.com.";
            }
            else {
                erreurEmail.textContent = "";
            }

            if (mdpField.value.trim().length == 0) {
                event.preventDefault();
                erreurMdp.textContent = "Le champ Mot de passe est requis.";
                
            } else {
                erreurMdp.textContent = "";
            }

            if (adresseField.value.trim().length == 0) {
                event.preventDefault();
                erreurAdresse.textContent = "Le champ Adresse est requis.";
                
            } else {
                erreurAdresse.textContent = "";
            }

            if (telField.value.trim().length == 0) {
                event.preventDefault();
                erreurTel.textContent = "Le champ tel est requis.";
                
            }
            else if (telField.value.trim().length != 8) {
                event.preventDefault();
                erreurTel.textContent = "Le champ tel doit etre 8 chiffres.";
                
            }
             else {
                erreurTel.textContent = "";
            }
            if (cinField.value.trim().length == 0) {
                event.preventDefault();
                erreurCin.textContent = "Le champ cin est requis.";
                
            }
            else if (cinField.value.trim().length != 8) {
                event.preventDefault();
                erreurCin.textContent = "Le champ cin doit etre 8 chiffres.";
                
            }
             else {
                erreurCin.textContent = "";
            }

        });