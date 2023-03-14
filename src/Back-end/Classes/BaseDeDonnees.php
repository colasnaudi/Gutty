<?php

class BaseDeDonnees
{
    //CONSTANTES
    /**
     * @brief Nom de l'hôte de la base de données
     */
    private string $PARAM_hote='mysql-poc.alwaysdata.net';
    /**
     * @brief Nom de la base de données
     */
    private string $PARAM_bdd='poc_sae11';
    /**
     * @brief Nom de l'utilisateur de la base de données
     */
    private string $PARAM_user='poc';
    /**
     * @brief Mot de passe de l'utilisateur de la base de données
     */
    private string $PARAM_pw='SAE11poc';
    //ATTRIBUTS
    /**
     * @brief Connexion à la base de données
     */
    public PDO $connexion;

    //CONSTRUCTEUR
    public function __construct()
    {
        $this->connexion = new PDO ('mysql:host='.$this->PARAM_hote.';dbname='.$this->PARAM_bdd, $this->PARAM_user, $this->PARAM_pw);
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
            if ($valResultat['nbNom'] == 1) { return true; }
            else { return false; }
        }
        else { return false; }
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
            if (password_verify($mdp, $valResultat['mdp']) && ($valResultat !== false)) { return true; }
            else { return false; }
        }
        else { return false; }
    }

    private function checkMail(string $mail): bool {
        $sql = "SELECT COUNT(*) as nbMail FROM Utilisateur WHERE mail = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$mail]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            if ($valResultat['nbMail'] == 1) { return true; }
            else { return false; }
        }
        else { return false; }
    }

    /**
     * @brief Vérifie si le nom et le mot de passe saisie par l'utilisateur existe dans la base de données
     * @param [in] string $nom Le nom de l'utilisateur
     * @param [in] string $mdp Le mot de passe de l'utilisateur
     * @return Vrai si le nom et le mot de passe existe, faux sinon
     */
    public function checkConnexion(string $nom, string $mdp): bool {
        //On vérifie si le nom existe dans la base de données
        if ($this->checkNom($nom)) {
            //On vérifie si le mot de passe correspond au mot de passe de l'utilisateur dans la base de données
            if ($this->checkMdp($nom, $mdp)) {
                session_start();
                $_SESSION['nom'] = $nom;
                return true;
            }
            //Si le mot de passe ne correspond pas au mot de passe de l'utilisateur dans la base de données
            else { return false; }
        }
        else if ($this->checkMail($nom)) {
            if ($this->checkMdp($this->getNom($nom), $mdp)) {
                session_start();

                $_SESSION['nom'] = $this->getNom($nom);
                $_SESSION['nom'] = $nom;

                return true;
            }
            else { return false; }
        }
        //Si le nom n'existe pas dans la base de données
        else { return false; }
    }


    /*------------------GESTION DE L'INSCRIPTION------------------*/
    /**
     * @brief Vérifie si le nom saisie par l'utilisateur est disponible dans la base de données
     * @param [in] string $nom Le nom que veut choisir l'utilisateur
     * @return Vrai si le nom est disponible, faux sinon
     */
    private function disponibleNom(string $nom): bool {
        $sql = "SELECT COUNT(*) as nbNom FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            if($valResultat['nbNom'] != 0){ return false; }
            else { return true; }
        }
        else { return false; }
    }

    /**
     * @brief Vérifie si le mail par l'utilisateur est disponible dans la base de données
     * @param [in] string $mail Le mail que veux choisir l'utilisateur
     * @return Vrai si le mail est disponible, faux sinon
     */
    private function disponibleMail(string $mail): bool {
        $sql = "SELECT COUNT(*) as nbMail FROM Utilisateur WHERE mail = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$mail]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            if($valResultat['nbMail'] != 0){ return false; }
            else { return true; }
        }
        else { return false; }
    }

    private function estMail(string $mail): bool {
        return filter_var($mail, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @brief Vérifie si les deux mots de passes correspondent
     * @param [in] string $mdp Le premier mot de passe saisie par l'utilisateur
     * @param [in] string $mdp2 Le deuxième mot de passe saisie par l'utilisateur
     * @return Vrai si les deux mots de passes correspondent, sinon faux
     */
    private function verifMdpIdentique(string $mdp, string $mdp2): bool {
        return  $mdp == $mdp2;
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
                    session_start();
                    $_SESSION['nom']= $nom;
                    return array('verif' => true);
                }
                //Si les deux mots de passe ne sont pas identiques
                else { return array('verif' => false, 'erreur' => 'mdp'); }
                //On vérifie si le mail est valide
                if ($this->estMail($mail)) {
                    //On vérifie si les deux mots de passe sont identiques
                    if ($this->verifMdpIdentique($mdp, $mdp2)) {
                        session_start();
                        $_SESSION['nom'] = $nom;
                        return array('verif' => true);
                    }
                    //Si les deux mots de passe ne sont pas identiques
                    else { return array('verif' => false, 'erreur' => 'mdp'); }
                }
                //Si le mail n'est pas valide
                else { return array('verif' => false, 'erreur' => 'ecritureMail'); }

            }
            //Si le mail n'est pas disponible
            else { return array('verif' => false, 'erreur' => 'mail'); }
        }
        //Si le nom n'est pas disponible
        else { return array('verif' => false, 'erreur' => 'nom'); }
    }

    /*------------------GESTION DES UTILISATEURS------------------*/
    /**
     * @brief Ajoute un utilisateur dans la base de données avec son nom, son mail et son mot de passe
     * @param [in] string $nom Le nom de l'utilisateur
     * @param [in] string $mail Le mail de l'utilisateur
     * @param [in]string $mdp Le mot de passe de l'utilisateur
     * @return void
     */
    public function ajouterUtilisateur(string $nom, string $mail, string $mdp): void {
        $mdpHash = password_hash($mdp, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
        $nom = htmlentities($nom);
        $mail = htmlentities($mail);
        $sql = "INSERT INTO Utilisateur(nom, mail, mdp) VALUES(?, ?, ?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom, $mail, $mdpHash]);
    }

    public function suppressionUtilisateur(string $nom, string $mdp, string $nomSession): bool
    {
        if($nom == $nomSession || $this->getNom($nom)==$nomSession) {
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
        }
        else { return false; }
        return false;
    }

    public function retirerUtilisateur(string $nom): void {
        $sql = "DELETE FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
    }

    private function changerIdUtilisateur(string $nom){
        $sql="SET FOREIGN_KEY_CHECKS = 0;";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute();

        $sql="UPDATE Noter SET idUtilisateur=0 WHERE idUtilisateur=(SELECT id FROM Utilisateur WHERE nom=?);";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);

        $sql="UPDATE Recette SET idUtilisateur=0 WHERE idUtilisateur=(SELECT id FROM Utilisateur WHERE nom=?);";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);

        $sql="UPDATE `Commentaire` SET `idUtilisateur`=0 WHERE idUtilisateur=(SELECT id FROM Utilisateur WHERE nom=?);";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);

        $sql="SET FOREIGN_KEY_CHECKS = 1;";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute();

    }

    private function existeUtilsateur(string $nom): bool {
        $sql = "SELECT COUNT(*) as nbNom FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) {
            if($valResultat['nbNom'] == 1){ return true; }
            else { return false; }
        }
        else { return false; }
    }

    public function bannirUtilsateur(string $nom): void {
        if($this->existeUtilsateur($nom)) { $this->retirerUtilisateur($nom); }
    }

    public function supprimerUtilisateur(string $nom, string $mdp): void {
        if($this->checkConnexion($nom, $mdp)) { $this->retirerUtilisateur($nom); }
    }

    public function getMail(string $nom) {
        $sql = "SELECT mail FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) { return $valResultat['mail']; }
        else { return false; }
    }

    public function getNom(string $mail){
        $sql = "SELECT nom FROM Utilisateur WHERE mail = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$mail]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        if ($valResultat !== false) { return $valResultat['nom']; }
        else { return false; }
    }

    public function genererCleVerif(string $nom): string {
        $cle = bin2hex(random_bytes(16));
        $sql = "UPDATE Utilisateur SET cle = ? WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$cle, $nom]);
        return $cle;
    }

    /*------------------GESTION DES RECETTES------------------*/
    public function rechercherParNom(string $nom): array {
        $listeResultat = array();
        $sql = "SELECT nom FROM Recette WHERE nom LIKE CONCAT('%', ?, '%')";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        while ($valResultat = $resultat->fetch(PDO::FETCH_ASSOC)) { $listeResultat[] = $valResultat['nom']; }
        if (count($listeResultat) == 0) { return array('Aucun résultat'); }
        else { return $listeResultat; }
    }

    public function recettesDeLaSemaine(): array {
        //On récupère 7 recettes aléatoires
        $sql = "SELECT * FROM Recette ORDER BY RAND() LIMIT 7";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute();
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $valResultat;
    }

    public function getIngredientsRecette(string $nom): array {
        $sql = "SELECT idIngredient FROM Composer WHERE idRecette = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        $ingredients = array_map(function($ingredient) {
            return $ingredient['idIngredient'];
        }, $valResultat);
        var_dump($valResultat);
        return $ingredients;
    }

    //recuperer le nom des ingredients à partir des ID
    public function getNomIngredients(array $ingredients): array {
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

    /*public function getColumns(string $table): array {
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ? AND TABLE_SCHEMA = 'poc_sae11'";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$table]);
        $valResultat = $resultat->fetchAll(PDO::FETCH_OBJ);
        return $valResultat;
    }*/

    //fonction qui permet de récupérer les recettes de la base de données
    public function getRecettes(): array {
        $sql = "SELECT * FROM Recette";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute();
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $valResultat;
    }

    //fonction permettant de récupérer les ingrédients des recettes de la liste précédente
    /*public function getIngredientsRecette(array $recettes): array {
        $ingredients = array();
        foreach ($recettes as $recette) {
            $sql = "SELECT nomIngredient FROM Composer WHERE nomRecette = ?";
            $resultat = $this->connexion->prepare($sql);
            $resultat->execute([$recette['nom']]);
            $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            $ingredients[$recette['nom']] = array_map(function($ingredient) {
                return $ingredient['nomIngredient'];
            }, $valResultat);
        }
        return $ingredients;
    }*/

        
    private function getIdRecette(string $nom): int {
        $sql = "SELECT id FROM Recette WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return $valResultat['id'];
    }

    private function getIdIngredient(string $nom): int {
        $sql = "SELECT id FROM Ingredient WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return $valResultat['id'];
    }

    private function getIdUtilisateur(string $nom): int {
        $sql = "SELECT id FROM Utilisateur WHERE nom = ?";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetch(PDO::FETCH_ASSOC);
        return $valResultat['id'];
    }

    public function insererUneRecette(string $nom, string $etape, string $image, string $temps, int $nbPersonnes, int $idUtilisateur, string $typeCuisson): void {
        $sql = "INSERT INTO Recette(nom, etape, image, temps, nbPersonnes, idUtilisateur, typeCuisson) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom, $etape, $image, $temps, $nbPersonnes, $idUtilisateur, $typeCuisson]);
    }

    public function insererDansComposer(string $nomRecette, array $nomIngredient, array $quantiteIngredient): void {
        $sql = "INSERT INTO Composer(idRecette, idIngredient, quantiteIngredient) VALUES(?, ?, ?)";
        $resultat = $this->connexion->prepare($sql);
        for ($i = 0; $i < count($nomIngredient); $i++) {
            $resultat->execute([$this->getIdRecette($nomRecette), $this->getIdIngredient($nomIngredient[$i]), $quantiteIngredient[$i]]);
        }
    }

    public function ajouterRecette(string $nom, string $etape, string $image, string $temps, int $nbPersonnes, string $typeCuisson, array $nomIngredient, array $quantiteIngredient): void {
        $idUtilisateur = $this->getIdUtilisateur(/*$_SESSION['nom']*/'Angel');
        $this->insererUneRecette($nom, $etape, $image, $temps, $nbPersonnes, $idUtilisateur, $typeCuisson);
        $this->insererDansComposer($nom, $nomIngredient, $quantiteIngredient);
    }

    public function affichageMesRecettes(string $nom):array{
        //fonction qui affiche les recettes liées a l'utilisateur connecté
        $sql = "SELECT * from Recette where idUtilisateur=(SELECT id FROM Utilisateur WHERE nom=?)";
        $resultat = $this->connexion->prepare($sql);
        $resultat->execute([$nom]);
        $valResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $valResultat;
    }
}