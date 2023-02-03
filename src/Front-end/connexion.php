
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Connexion Gutty</title>

    <body>

        <main>

            <div class="logoGutty">
                <img src="logo.png"
            </div>
            <div class=""formulaire>
                <form action="connexionUtilisateur" class="connexionUtilisateur">
                    <div class="btns">
                        <input type="text" id="nom" name="nom" placeholder="Nom d'utilisateur ou adresse mail" required>
                        <input type="text" id="nom" name="nom" placeholder="Mot de passe" required>

                    </div>
                    <div>
                        <button type="submit">Connexion</button>
                    </div>
                    <div>
                        <a href="https://www.google.com/search?q=t%27es+con&rlz=1C1ONGR_frFR933FR933&sxsrf=AJOqlzX1QDxZDTMaUWXaSm-HxNnH9LjjUw:1675327980827&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjNqreJu_b8AhVmcKQEHfVqAaYQ_AUoAXoECAEQAw&biw=1536&bih=714&dpr=1.25#imgrc=o_UGfWxuq4BjZM">Mot de passe oublié?</a>.

                    </div>


                </form>
                <div class="creerCompte">
                    <button type="submit" onclick="window.location.href = 'creerCompte.php';">Créer un compte</button>

            </div>

        </main>
</body>