<?php

class BaseDeDonnees
{
    //CONSTANTES
    /**
     * @brief Nom de l'hôte de la base de données
     */
    private string $PARAM_hote = 'mysql-poc.alwaysdata.net';
    /**
     * @brief Nom de la base de données
     */
    private string $PARAM_bdd = 'poc_sae11';
    /**
     * @brief Nom de l'utilisateur de la base de données
     */
    private string $PARAM_user = 'poc';
    /**
     * @brief Mot de passe de l'utilisateur de la base de données
     */
    private string $PARAM_pw = 'SAE11poc';
    //ATTRIBUTS
    /**
     * @brief Connexion à la base de données
     */
    public PDO $connexion;

    //CONSTRUCTEUR
    public function __construct()
    {
        $this->connexion = new PDO ('mysql:host=' . $this->PARAM_hote . ';dbname=' . $this->PARAM_bdd, $this->PARAM_user, $this->PARAM_pw);
    }

    //ENCAPSULATION

    /**
     * @brief Getter de la connexion à la base de données
     * @return La connexion à la base de données
     */
    public function getConnexion(): PDO
    {
        return $this->connexion;
    }

    /**
     * @brief Setter de la connexion à la base de données
     * @param [in] PDO $connexion La connexion à la base de données
     * @return void
     */
    public function setConnexion(PDO $connexion): void
    {
        $this->connexion = $connexion;
    }

    //METHODES METIER
    /*------------------GESTION DE LA CONNEXION------------------*/
    /**
     * @brief Vérifie si le nom saisie par l'utilisateur existe dans la base de données
     * @param [in] string $nom Le nom de l'utilisateur
     * @return Vrai si le nom existe, faux sinon
     */
    private function checkNom(string $nom): bool
    {
        $sql = "SELECT COUNT(*) as nbNom FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            if ($valResultat['nbNom'] == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @brief Vérifie si le mot de passe saisie par l'utilisateur correspond au mot de passe de l'utilisateur dans la base de données
     * @param string $nom Le nom de l'utilisateur
     * @param string $mdp Le mot de passe de l'utilisateur
     * @return Vrai si le mot de passe correspond, faux sinon
     */
    private function checkMdp(string $nom, string $mdp): bool
    {
        $sql = "SELECT mdp FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        if ($resultat->execute([$nom]) && ($valResultat = $resultat->fetch(PDO::FETCH_ASSOC)) !== false) {
            if (password_verify($mdp, $valResultat['mdp']) && ($valResultat !== false)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function checkMail(string $mail): bool
    {
        $sql = "SELECT COUNT(*) as nbMail FROM Utilisateur WHERE mail = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$mail]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            if ($valResultat['nbMail'] == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @brief Vérifie si le nom et le mot de passe saisie par l'utilisateur existe dans la base de données
     * @param [in] string $nom Le nom de l'utilisateur
     * @param [in] string $mdp Le mot de passe de l'utilisateur
     * @return Vrai si le nom et le mot de passe existe, faux sinon
     */
    public function checkConnexion(string $nom, string $mdp): bool
    {
        //On vérifie si le nom existe dans la base de données
        if ($this->checkNom($nom)) {
            //On vérifie si le mot de passe correspond au mot de passe de l'utilisateur dans la base de données
            if ($this->checkMdp($nom, $mdp)) {
                session_start();
                $_SESSION['nom'] = $nom;
                return true;
            } //Si le mot de passe ne correspond pas au mot de passe de l'utilisateur dans la base de données
            else {
                return false;
            }
        } else if ($this->checkMail($nom)) {
            if ($this->checkMdp($this->getNom($nom), $mdp)) {
                session_start();
                $_SESSION['nom'] = $this->getNom($nom);
                return true;
            } else {
                return false;
            }
        } //Si le nom n'existe pas dans la base de données
        else {
            return false;
        }
    }


    /*------------------GESTION DE L'INSCRIPTION------------------*/
    /**
     * @brief Vérifie si le nom saisie par l'utilisateur est disponible dans la base de données
     * @param [in] string $nom Le nom que veut choisir l'utilisateur
     * @return Vrai si le nom est disponible, faux sinon
     */
    private function disponibleNom(string $nom): bool
    {
        $sql = "SELECT COUNT(*) as nbNom FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            if ($valResultat['nbNom'] != 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * @brief Vérifie si le mail par l'utilisateur est disponible dans la base de données
     * @param [in] string $mail Le mail que veux choisir l'utilisateur
     * @return Vrai si le mail est disponible, faux sinon
     */
    private function disponibleMail(string $mail): bool
    {
        $sql = "SELECT COUNT(*) as nbMail FROM Utilisateur WHERE mail = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$mail]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            if ($valResultat['nbMail'] != 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * @brief Vérifie si les deux mots de passes correspondent
     * @param [in] string $mdp Le premier mot de passe saisie par l'utilisateur
     * @param [in] string $mdp2 Le deuxième mot de passe saisie par l'utilisateur
     * @return Vrai si les deux mots de passes correspondent, sinon faux
     */
    private function verifMdpIdentique(string $mdp, string $mdp2): bool
    {
        return $mdp == $mdp2;
    }

    /**
     * @brief Vérifie si l'inscription est correcte
     * @param [in] string $nom Le nom que veut choisir l'utilisateur
     * @param [in] string $mail Le mail que veux choisir l'utilisateur
     * @param [in] string $mdp Le premier mot de passe saisie par l'utilisateur
     * @param [in] string $mdp2 Le deuxième mot de passe saisie par l'utilisateur
     * @return Vrai si l'inscription est correcte, sinon faux et l'explication de pourquoi c'est faux
     */
    public function checkInscription(string $nom, string $mail, string $mdp, string $mdp2): array
    {
        //On vérifie si le nom est disponible
        if ($this->disponibleNom($nom)) {
            //On vérifie si le mail est disponible
            if ($this->disponibleMail($mail)) {
                //On vérifie si les deux mots de passe sont identiques
                if ($this->verifMdpIdentique($mdp, $mdp2)) {
                    return array('verif' => true);
                } //Si les deux mots de passe ne sont pas identiques
                else {
                    return array('verif' => false, 'erreur' => 'mdp');
                }
            } //Si le mail n'est pas disponible
            else {
                return array('verif' => false, 'erreur' => 'mail');
            }
        } //Si le nom n'est pas disponible
        else {
            return array('verif' => false, 'erreur' => 'nom');
        }
    }

    /*------------------GESTION DES UTILISATEURS------------------*/
    /**
     * @brief Ajoute un utilisateur dans la base de données avec son nom, son mail et son mot de passe
     * @param [in] string $nom Le nom de l'utilisateur
     * @param [in] string $mail Le mail de l'utilisateur
     * @param [in]string $mdp Le mot de passe de l'utilisateur
     * @return void
     */
    public function ajouterUtilisateur(string $nom, string $mail, string $mdp): void
    {
        $mdpHash = password_hash($mdp, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
        $sql = "INSERT INTO Utilisateur(nom, mail, mdp) VALUES(?, ?, ?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom, $mail, $mdpHash]);
    }

    public function suppressionUtilisateur(string $nom, string $mdp, string $nomSession): bool
    {
        if ($nom == $nomSession || $this->getNom($nom) == $nomSession) {
            if ($this->checkNom($nom)) {
                if ($this->checkMdp($nom, $mdp)) {
                    $this->changerIdUtilisateur($nom);
                    $sql = "DELETE FROM Utilisateur WHERE nom = ?";
                    $resultat = $this->connexion->prepare($sql);
                    $resultat->execute([$nom]);
                    return true;
                }
            } else if ($this->checkMail($nom)) {
                if ($this->checkMdp($this->getNom($nom), $mdp)) {
                    $nom = $this->getNom($nom);
                    $this->changerIdUtilisateur($nom);
                    $sql = "DELETE FROM Utilisateur WHERE nom = ?";
                    $resultat = $this->connexion->prepare($sql);
                    $resultat->execute([$nom]);
                    return true;
                }
            }
        } else {
            return false;
        }
        return false;
    }

    public function retirerUtilisateur(string $nom): void
    {
        $sql = "DELETE FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
    }

    private function changerIdUtilisateur(string $nom)
    {
        $sql = "SET FOREIGN_KEY_CHECKS = 0;";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute();

        $sql = "UPDATE Noter SET idUtilisateur=0 WHERE idUtilisateur=(SELECT id FROM Utilisateur WHERE nom=?);";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);

        $sql = "UPDATE Recette SET idUtilisateur=0 WHERE idUtilisateur=(SELECT id FROM Utilisateur WHERE nom=?);";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);

        $sql = "UPDATE `Commentaire` SET `idUtilisateur`=0 WHERE idUtilisateur=(SELECT id FROM Utilisateur WHERE nom=?);";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);

        $sql = "SET FOREIGN_KEY_CHECKS = 1;";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute();
    }

    private function existeUtilsateur(string $nom): bool
    {
        $sql = "SELECT COUNT(*) as nbNom FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            if ($valResultat['nbNom'] == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function bannirUtilsateur(string $nom): void
    {
        if ($this->existeUtilsateur($nom)) {
            $this->retirerUtilisateur($nom);
        }
    }

    public function supprimerUtilisateur(string $nom, string $mdp): void
    {
        if ($this->checkConnexion($nom, $mdp)) {
            $this->retirerUtilisateur($nom);
        }
    }

    public function getMail(string $nom)
    {
        $sql = "SELECT mail FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            return $valResultat['mail'];
        } else {
            return false;
        }
    }

    public function getNom(string $mail)
    {
        $sql = "SELECT nom FROM Utilisateur WHERE mail = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$mail]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            return $valResultat['nom'];
        } else {
            return false;
        }
    }

    public function genererCleVerif(string $nom): string
    {
        $cle = bin2hex(random_bytes(16));
        $sql = "UPDATE Utilisateur SET cle = ? WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$cle, $nom]);
        return $cle;
    }

    /*------------------GESTION DES RECETTES------------------*/
    public function rechercherParNom(string $nom): array
    {
        $listeResultat = array();
        $sql = "SELECT * FROM Recette WHERE nom LIKE CONCAT('%', ?, '%')";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        while ($valResultat = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $listeResultat[] = $valResultat;
        }
        if (count($listeResultat) == 0) {
            return array('Aucun résultat');
        } else {
            return $listeResultat;
        }
    }

    public function recettesDeLaSemaine(): array
    {
        //On récupère 7 recettes aléatoires
        $sql = "SELECT * FROM Recette ORDER BY RAND() LIMIT 7";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute();
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $valResultat;
    }

    public function recettesFavorites(int $idUtilisateur): array
    {
        $sql = "SELECT r.* FROM Favorite f JOIN Recette r ON f.idRecette = r.id WHERE f.idUtilisateur = ?;";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$idUtilisateur]);
        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIngredientsRecette(string $nom): array
    {
        $sql = "SELECT idIngredient FROM Composer WHERE idRecette = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        $ingredients = array_map(function ($ingredient) {
            return $ingredient['idIngredient'];
        }, $valResultat);
        return $ingredients;
    }

    //recuperer le nom des ingredients à partir des ID
    public function getNomIngredients(array $ingredients): array
    {
        $listeIngredients = array();
        foreach ($ingredients as $ingredient) {
            $sql = "SELECT nom FROM Ingredient WHERE id = ?";
            $resultat = $this->connexion->prepare($sql);
            $resultat->execute([$ingredient]);
            $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
            $listeIngredients[] = $valResultat['nom'];
        }
        return $listeIngredients;
    }

    //fonction qui permet de récupérer les recettes de la base de données
    public function getRecettes(): array
    {
        $sql = "SELECT * FROM Recette";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute();
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $valResultat;
    }

    public function getIdRecette(string $nom): int
    {
        $sql = "SELECT id FROM Recette WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return $valResultat['id'];
    }

    private function getIdIngredient(string $nom): int
    {
        $sql = "SELECT id FROM Ingredient WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return $valResultat['id'];
    }

    public function getIdUtilisateur(string $nom): int
    {
        $sql = "SELECT id FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return $valResultat['id'];
    }

    public function insererUneRecette(string $nom, string $etape, string $image, string $temps, int $nbPersonnes, int $idUtilisateur): void
    {
        $sql = "INSERT INTO Recette(nom, etape, image, temps, nbPersonnes, idUtilisateur) VALUES(?, ?, ?, ?, ?, ?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom, $etape, $image, $temps, $nbPersonnes, $idUtilisateur]);
    }

    public function insererDansComposer(string $nomRecette, array $nomIngredient, array $quantiteIngredient): void
    {
        $sql = "INSERT INTO Composer(idRecette, idIngredient, quantiteIngredient) VALUES(?, ?, ?)";
        $resultat = $this->connexion->prepare($sql);
        for ($i = 0; $i < count($nomIngredient); $i++) {
            $resultat->execute([$this->getIdRecette($nomRecette), $this->getIdIngredient($nomIngredient[$i]), $quantiteIngredient[$i]]);
        }
    }

    public function insererDansEtape(string $nomRecette, array $lesEtapes)
    {
        $sql = "INSERT INTO Etape(idRecette, texte) VALUES(?, ?)";
        $resultat = $this->connexion->prepare($sql);
        for ($i = 0; $i < count($lesEtapes); $i++) {
            $resultat->execute([$this->getIdRecette($nomRecette), $lesEtapes[$i]]);
        }
    }

    public function ajouterRecette(string $nom, string $etape, string $image, string $temps, int $nbPersonnes, array $nomIngredient, array $quantiteIngredient): void
    {
        $idUtilisateur = $this->getIdUtilisateur(/*$_SESSION['nom']*/ 'Angel');
        $this->insererUneRecette($nom, $etape, $image, $temps, $nbPersonnes, $idUtilisateur);
        $this->insererDansComposer($nom, $nomIngredient, $quantiteIngredient);
    }

    public function affichageMesRecettes(string $nom): array
    {
        //fonction qui affiche les recettes liées a l'utilisateur connecté
        $sql = "SELECT * from Recette where idUtilisateur=(SELECT id FROM Utilisateur WHERE nom=?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $valResultat;
    }

    //GESTION DES INGREDIENTS

    public function getIngredients(): array
    {
        $sql = "SELECT * FROM Ingredient";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute();
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $valResultat;
    }


    public function getNomIngredientsParId(array $idIngredients): array
    {
        $listeIngredients = array();
        foreach ($idIngredients as $idIngredient) {
            $sql = "SELECT nom FROM Ingredient WHERE id = ?";
            $resultat = $this->connexion->prepare($sql);
            $resultat->execute([$idIngredient]);
            $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
            $listeIngredients[] = $valResultat['nom'];
        }
        return $listeIngredients;
    }

    public function getIngredientsParNom(array $nomIngredients): array
    {
        $listeIngredients = array();
        foreach ($nomIngredients as $nom) {
            $listeIngredients[] = $this->creerIngredientDepuisNom($nom);
        }
        return $listeIngredients;
    }

    // SELECT Quantite FROM Composer WHERE idRecette = (SELECT id FROM Recette WHERE nom = ?);
    public function getQuantiteIngredientsParRecette(string $nomRecette): array
    {
        $sql = "SELECT quantiteIngredient FROM Composer WHERE idRecette = (SELECT id FROM Recette WHERE nom = ?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nomRecette]);
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        $quantiteIngredients = array_map(function ($quantiteIngredient) {
            return $quantiteIngredient['quantiteIngredient'];
        }, $valResultat);
        return $quantiteIngredients;
    }

    public function getIngredientsParRecette(string $nomRecette): array
    {
        $sql = "SELECT idIngredient FROM Composer WHERE idRecette = (SELECT id FROM Recette WHERE nom = ?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nomRecette]);

        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);

        $idIngredients = array_map(function ($idIngredient) {
            return $idIngredient['idIngredient'];
        }, $valResultat);

        $listeIngredients = array();
        foreach ($idIngredients as $id) {
            $listeIngredients[] = $this->creerIngredientDepuisId($id);
        }
        return $listeIngredients;
    }

    private function creerIngredientDepuisId(int $id): Ingredient
    {
        $sql = "SELECT * FROM Ingredient WHERE id = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$id]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return new Ingredient($valResultat['id'], $valResultat['nom'], $valResultat['image'], $valResultat['prix'], $valResultat['unite']);
    }

    private function creerIngredientDepuisNom(string $nom): Ingredient
    {
        $sql = "SELECT * FROM Ingredient WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return new Ingredient($valResultat['id'], $valResultat['nom'], $valResultat['image'], $valResultat['prix'], $valResultat['unite']);
    }

//---------------------------------------------ETAPE------------------------------------
    public function getEtapes(): array
    {
        $sql = "SELECT * FROM Etape";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute();
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $valResultat;
    }

    public function getEtapesParRecette(string $nomRecette): array
    {
        $sql = "SELECT NumEtape FROM Etape WHERE idRecette = (SELECT id FROM Recette WHERE nom = ?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nomRecette]);

        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);

        $idEtapes = array_map(function ($idEtape) {
            return $idEtape['NumEtape'];
        }, $valResultat);

        $listeEtapes = array();
        foreach ($idEtapes as $id) {
            $listeEtapes[] = $this->creerEtapeDepuisId($id);
        }
        return $listeEtapes;
    }

    private function creerEtapeDepuisId(int $id): Etape
    {
        $sql = "SELECT * FROM Etape WHERE NumEtape = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$id]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return new Etape($valResultat['idRecette'], $valResultat['NumEtape'], $valResultat['Texte']);
    }

    public function insererEtape(int $numEtape, int $idRecette, string $texteEtape): void
    {
        $sql = "INSERT INTO Etape(numEtape, idRecette, texteEtape) VALUES(?, ?, ?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$numEtape, $idRecette, $texteEtape]);
    }

    public function insererDebutRecette(string $titre, int $nbPersonnes, string $temps, string $typeCuisson, string $image, string $nomUtilisateur): void
    {
        $idUtilisateur = $this->getIdUtilisateur($nomUtilisateur);
        $sql = "INSERT INTO Recette(nom, nbPersonnes, temps, typeCuisson, image, idUtilisateur) VALUES(?, ?, ?, ?, ?, ?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$titre, $nbPersonnes, $temps, $typeCuisson, $image, $idUtilisateur]);
    }

    /*---------------------------------------------COMMENTAIRE------------------------------------*/
    public function ajouterCommentaire(string $commentaire, int $idUser, int $idRecette): void
    {
        $sql = 'INSERT INTO Commentaire (texte,idUtilisateur,idRecette,idParent) VALUES (?,?,?,?)';
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$commentaire, $idUser, $idRecette, null]);
    }

    public function getCommentaires(int $idRecette): array
    {
        $sql = "SELECT * FROM Commentaire WHERE idRecette = ? ORDER BY id DESC";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$idRecette]);
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $valResultat;
    }

    public function getNomUtilisateur(int $idUtilisateur): string
    {
        $sql = "SELECT nom FROM Utilisateur WHERE id = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$idUtilisateur]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return $valResultat['nom'];
    }

    public function getTexteCommentaire(int $idRecette): string
    {
        $sql = "SELECT texte FROM Commentaire WHERE idRecette = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$idRecette]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return $valResultat['texte'];
    }

    /*----------------------------------FAVORITE----------------------------------*/
    public function ajouterAuFavorites(int $idRecette, int $idUtilisateur): void
    {
        $sql = "INSERT INTO Favorite(idRecette, idUtilisateur) VALUES(?, ?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$idRecette, $idUtilisateur]);
    }
}