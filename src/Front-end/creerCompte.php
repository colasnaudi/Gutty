<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/creerCompte.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Créer mon compte Gutty</title>

<body>

<main>

    <div class="logoGutty">
        <img src="Images/logo.png"
    </div>
    <div class=""formulaire>
        <form method="post" action="../Back-end/verifInscription.php" class="connexionUtilisateur">
            <div class="btns">
                <?php if (isset($nomError) && $nomError): ?>
                    <div class="form-error">Ce nom est déja pris</div>
                <?php endif ?>

                <input type="text" id="nom" name="nom" placeholder="Nom d'utilisateur" required>
                <?php if (isset($mailError) && $mailError): ?>
                    <div class="form-error">Cette adresse mail est déja utilisée</div>
                <?php endif ?>
                <?php if (isset($ecritureMailError) && $ecritureMailError): ?>
                    <div class="form-error">Entrez une adresse mail valide</div>
                <?php endif ?>
                <input type="text" id="mail" name="mail" placeholder="Adresse mail" required>

                <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" required>

                <?php if (isset($mdpError) && $mdpError): ?>
                    <div class="form-error">Le second mot de passe ne correspond pas au premier</div>
                <?php endif ?>
                <input type="password" id="mdp2" name="mdp2" placeholder="Confirmer le mot de passe" required>
            </div>
            <div>
                <button type="submit">Créer mon compte</button>
            </div>
        </form>
        <div class="connexion">
            <button type="submit" onclick="window.location.href = '../Front-end/connexion.php';">J'ai un compte</button>
        </div>
</main>
</body>