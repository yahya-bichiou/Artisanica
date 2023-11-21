let formNews = document.getElementById('formNews')

        formNews.addEventListener("submit", function (event) {
            var titreField = document.getElementById("titre_nw");
            var erreurTitre = document.getElementById("erreurTitre_nw");
            var textField = document.getElementById("text_nw");
            var erreurText = document.getElementById("erreurText_nw");
            var imageField = document.getElementById("image_nw");
            var erreurImage = document.getElementById("erreurImage_nw");
            var dateField = document.getElementById("date_nw");
            var erreurDate = document.getElementById("erreurDate_nw");

            var allowedExtensions = [".png", ".jpg"];
            var inputValue = imageField.value.trim().toLowerCase();

            // Check if the input ends with a valid extension
            var isValidExtension = allowedExtensions.some(function (extension) {
                return inputValue.endsWith(extension);
            });

            //titre
            if (titreField.value.trim().length > 20) {
                event.preventDefault();
                erreurTitre.textContent = "Le champ Titre ne doit pas dépasser 20 caractères.";
            }
            else if (titreField.value.trim().length == 0) {
                event.preventDefault();
                erreurTitre.textContent = "Le champ Titre ne doit pas être vide.";
            }
            else {
                erreurTitre.textContent = "";
            }

            //text
            if (textField.value.trim().length > 1200) {
                event.preventDefault();
                erreurText.textContent = "Le champ Text ne doit pas dépasser 1200 caractères.";
            }
            else if (textField.value.trim().length < 300) {
                event.preventDefault();
                erreurText.textContent = "Le champ Text ne doit pas être inferieur de 300 caractères.";
            }
            else {
                erreurText.textContent = "";
            }

            //image
            if (!isValidExtension) {
                event.preventDefault();
                erreurImage.textContent = "Le champ Image doit se terminer par .png ou .jpg.";
            }
            else {
                erreurImage.textContent = "";
            }

            //date
            if (dateField.value.trim() === "") {
                erreurDate.textContent = "Le champ Date est requis.";
                event.preventDefault();
            } else {
                erreurDate.textContent = "";
            }

        });