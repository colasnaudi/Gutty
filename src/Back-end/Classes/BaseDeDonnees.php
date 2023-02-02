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
    private PDO $connexion;

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
        $sql = "SELECT COUNT(*) FROM Utilisateur WHERE nom = '$nom'";
        $resultat = $this->connexion->query($sql);
        $count = $resultat->fetchColumn();
        $resultat->closeCursor();
        if ($count == 1) {
            return true;
        }
        else {
            return false;
            //$generationHtml = '<link rel="stylesheet" href="../front-end/connexionErrnom.css">';
        }
    }

    /**
     * @brief Vérifie si le mot de passe saisie par l'utilisateur correspond au mot de passe de l'utilisateur dans la base de données
     * @param string $nom Le nom de l'utilisateur
     * @param string $mdp Le mot de passe de l'utilisateur
     * @return Vrai si le mot de passe correspond, faux sinon
     */
    private function checkMdp(string $nom, string $mdp): bool {
        $sql = "SELECT mdp FROM Utilisateur WHERE nom = '$nom'";
        $resultat = $this->connexion->query($sql);
        $mdpHash = $resultat->fetchColumn();
        if (password_verify($mdp, $mdpHash)) {
            echo "Le mot de passe est valide ! <br> ";
            return true;
        }
        else {
            echo "Le mot de passe est invalide.";
            return false;
        }
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
                return true;
            }
            //Si le mot de passe ne correspond pas au mot de passe de l'utilisateur dans la base de données
            else {
                echo "Mot de passe incorrect <BR>";
                return false;
            }
        }
        //Si le nom n'existe pas dans la base de données
        else {
            echo "Nom incorrect <br>";
            return false;
        }
    }

    /*------------------GESTION DE L'INSCRIPTION------------------*/
    /**
     * @brief Vérifie si le nom saisie par l'utilisateur est disponible dans la base de données
     * @param [in] string $nom Le nom que veut choisir l'utilisateur
     * @return Vrai si le nom est disponible, faux sinon
     */
    private function disponibleNom(string $nom): bool {
        $sql = "SELECT COUNT(*) FROM Utilisateur WHERE nom = '$nom'";
        $resultat = $this->connexion->query($sql);
        $count = $resultat->fetchColumn();
        $resultat->closeCursor();
        if ($count == 0) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @brief Vérifie si le mail par l'utilisateur est disponible dans la base de données
     * @param [in] string $mail Le mail que veux choisir l'utilisateur
     * @return Vrai si le mail est disponible, faux sinon
     */
    private function disponibleMail(string $mail): bool {
        $sql = "SELECT COUNT(*) FROM Utilisateur WHERE mail = '$mail'";
        $resultat = $this->connexion->query($sql);
        $count = $resultat->fetchColumn();
        $resultat->closeCursor();
        if ($count == 0) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @brief Vérifie si les deux mots de passes correspondent
     * @param [in] string $mdp Le premier mot de passe saisie par l'utilisateur
     * @param [in] string $mdp2 Le deuxième mot de passe saisie par l'utilisateur
     * @return Vrai si les deux mots de passes correspondent, sinon faux
     */
    private function verifMdpIdentique(string $mdp, string $mdp2): bool {
        if ($mdp == $mdp2) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @brief Vérifie si l'inscription est correcte
     * @param [in] string $nom Le nom que veut choisir l'utilisateur
     * @param [in] string $mail Le mail que veux choisir l'utilisateur
     * @param [in] string $mdp Le premier mot de passe saisie par l'utilisateur
     * @param [in] string $mdp2 Le deuxième mot de passe saisie par l'utilisateur
     * @return Vrai si l'inscription est correcte, sinon faux
     */
    public function checkInscription(string $nom, string $mail, string $mdp, string $mdp2): bool
    {
        //On vérifie si le nom est disponible
        if ($this->disponibleNom($nom)) {
            //On vérifie si le mail est disponible
            if ($this->disponibleMail($mail)) {
                //On vérifie si les deux mots de passe sont identiques
                if ($this->verifMdpIdentique($mdp, $mdp2)) {
                    return true;
                } //Si les deux mots de passe ne sont pas identiques
                else {
                    return false;
                }
            } //Si le mail n'est pas disponible
            else {
                echo "Mail déjà utilisé <br>";
                return false;
            }
        }
        //Si le nom n'est pas disponible
        else {
            return false;
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
    public function ajouterUtilisateur(string $nom, string $mail, string $mdp): void {
        $mdpHash = password_hash($mdp, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
        $sql = "INSERT INTO Utilisateur(nom, mail, mdp) VALUES('$nom', '$mail', '$mdpHash')";
        $this->connexion->exec($sql);
    }
}