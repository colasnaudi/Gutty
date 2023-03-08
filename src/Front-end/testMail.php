<?php
if (isset($_POST['email'])) {
    $to = $_POST['email'];
    $subject = 'Test d\'envoi d\'e-mail';
    $message = 'Ceci est un test d\'envoi d\'e-mail depuis une application web.';
    $headers = 'From: votre@adresse.email' . "\r\n" .
        'Reply-To: votre@adresse.email' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo 'L\'e-mail a été envoyé avec succès à ' . $to;
    } else {
        echo 'Erreur lors de l\'envoi de l\'e-mail à ' . $to;
    }
}
?>
