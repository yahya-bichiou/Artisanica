let formAdmin = document.getElementById('form')

        formAdmin.addEventListener("submit", function (event) {
            var nomField = document.getElementById("nom_adm");
            var erreurNom = document.getElementById("erreurnom_adm");
            var prenomField = document.getElementById("prenom_adm");
            var erreurPrenom = document.getElementById("erreurprenom_adm");
            var emailField = document.getElementById("email_adm");
            var erreurEmail = document.getElementById("erreuremail_adm");
            var mdpField = document.getElementById("mdp_adm");
            var erreurMdp = document.getElementById("erreurmdp_adm");

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

            if (mdpField.value.trim() === "") {
                erreurMdp.textContent = "Le champ Mot de passe est requis.";
                event.preventDefault();
            } else {
                erreurMdp.textContent = "";
            }

        });