
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nouveauMdp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Connexion Gutty</title>

<body>

<main>

    <div class="logoGutty">
        <img src="Images/logo.png"
    </div>
    <div class=""formulaire>
        <form action="connexionUtilisateur" class="connexionUtilisateur">
            <div class="btns">
                <input type="text" id="nom" name="nom" placeholder="Nouveau mot de passe" required>
                <input type="text" id="nom" name="nom" placeholder="Confirmer le mot de passe" required>

            </div>
            <div>
                <button type="submit">Connexion</button>
            </div>


        </form>
        <div class="connexion">
            <button type="submit" onclick="window.location.href = 'connexion.php';">S'identifier</button>

        </div>

</main>
</body>
