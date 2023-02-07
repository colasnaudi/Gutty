
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Connexion Gutty</title>

    <body>
        <main>
            <div class="logoGutty">
                <img src="../Front-end/logo.png"
            </div>
            <div class="formulaire">
                <form method="post" action="../Back-end/verifConnexion.php" class="connexionUtilisateur">
                    <?php if (isset($loginError) && $loginError): ?>
                        <div class="form-error">Mauvais identifiant ou mot de passe !</div>
                    <?php endif ?>
                    <div class="btns">
                        <input type="text" name="pseudo" id="pseudo" placeholder="Nom d'utilisateur ou adresse mail" required>
                        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>
                    </div>
                    <div>
                        <button type="submit">Connexion</button>
                    </div>
                    <div>
                        <a href = 'motDePasseOublie.php'>Mot de passe oublié?</a>.
                </form>
            </div>
            <div class="creerCompte">
                <button type="submit" onclick="window.location.href = 'creerCompte.php';">Créer un compte</button>
            </div>
        </main>
</body>