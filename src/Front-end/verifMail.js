var urlConfirmation = "confirmationMail.php";

function validerEmail() {
    var email = document.getElementById('email').value;
    var valide = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    afficherMessage(valide);
}

function afficherMessage(valide) {
    var message = document.getElementById('message');
    if (valide) {
        alert('Adresse e-mail est valide.');
        window.location.href = urlConfirmation;
    } else {
        alert('Adresse e-mail est invalide.');
    }
}
