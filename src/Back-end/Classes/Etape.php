<?php
/**
 * @file Frigo.php
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @brief Classe Frigo qui est une composition de la classe Ingredient
 * @version 1.0
 * @date 2022-12-12
 */
class Etape
{
//NumEtape Primary	int(10)
//idRecette Index	int(10)
//Texte

//ATTRIBUTS
    /**
     *
     */
    private int $numEtape;

    /**
     *
     */
    private int $idRecette;

    /**
     *
     */
    private string $texte;

//CONSTRUCTEUR

    /**
     * @brief Constructeur de la classe Etape à partir d'un numéro d'étape, d'un id de recette et d'un texte
     * @param [in] int $numEtape Le numéro d'étape
     * @param [in] int $idRecette L'id de la recette
     * @param [in] string $texte Le texte de l'étape
     */

    public function __construct(int $numEtape, int $idRecette, string $texte)
    {
        $this->numEtape = $numEtape;
        $this->idRecette = $idRecette;
        $this->texte = $texte;
    }

//ENCAPSULATION

    /**
     * @brief Getter du numéro d'étape
     * @return int Le numéro d'étape
     */
    public function getNumEtape(): int
    {
        return $this->numEtape;
    }

    /**
     * @brief Setter du numéro d'étape
     * @param [in] int $numEtape Le numéro d'étape
     * @return void
     */
    public function setNumEtape(int $numEtape): void
    {
        $this->numEtape = $numEtape;
    }

    /**
     * @brief Getter de l'id de la recette
     * @return int L'id de la recette
     */

    public function getIdRecette(): int
    {
        return $this->idRecette;
    }

    /**
     * @brief Setter de l'id de la recette
     * @param [in] int $idRecette L'id de la recette
     * @return void
     */

    public function setIdRecette(int $idRecette): void
    {
        $this->idRecette = $idRecette;
    }

    /**
     * @brief Getter du texte de l'étape
     * @return string Le texte de l'étape
     */
    public function getTexte(): string
    {
        return $this->texte;
    }

    /**
     * @brief Setter du texte de l'étape
     * @param [in] string $texte Le texte de l'étape
     * @return void
     */
    public function setTexte(string $texte): void
    {
        $this->texte = $texte;
    }

    //METHODES

}