    <?php

/**
 * @file Ingredient.php
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @brief Classe Ingredient qui compose la classe Recette, Frigo et LivreIngredient
 * @version 1.0
 * @date 2022-12-12
 */
class Ingredient
{
    //ATTRIBUTS
    /**
     * @brief Id de l'ingrédient
     */
    private int $idIngredient;

    /**
     * @brief Nom de l'ingrédient
     */
    private string $nomIngredient;

    /**
     * @brief Prix de l'ingrédient
     */
    private float $prix;

    /**
     * @brief Unité de l'ingrédient
     * @details L'unité de l'ingrédient peut être en kg, en L ou en unité
     */
    private string $unite;

    //CONSTRUCTEUR

    /**
     * @brief Constructeur de la classe Ingredient à partir de son id, son nom, son prix et son unité
     * @param [in] int $idIngredient
     * @param [in] string $nomIngredient
     * @param [in] float $prix
     * @param [in] string $unite
     */
    public function __construct(int $idIngredient, string $nomIngredient, float $prix, string $unite)
    {
        $this->idIngredient = $idIngredient;
        $this->nomIngredient = $nomIngredient;
        $this->prix = $prix;
        $this->unite = $unite;
    }

    //ENCAPSULATION
    /**
     * @brief Setter de l'id de l'ingrédient
     * @param [in] int $idIngredient L'id de l'ingrédient
     * @return void
     */
    public function setIdIngredient(int $idIngredient): void
    {
        $this->idIngredient = $idIngredient;
    }

    /**
     * @brief Getter de l'id de l'ingrédient
     * @return L'id de l'ingrédient
     */
    public function getIdIngredient(): int
    {
        return $this->idIngredient;
    }

    /**
     * @brief Setter du nom de l'ingrédient
     * @param [in] string $nomIngredient Le nom de l'ingrédient
     * @return void
     */
    public function setNomIngredient($nomIngredient): void
    {
        $this->nomIngredient = $nomIngredient;
    }

    /**
     * @brief Getter du nom de l'ingrédient
     * @return Le nom de l'ingrédient
     */
    public function getNomIngredient(): string
    {
        return $this->nomIngredient;
    }

    /**
     * @brief Setter du prix de l'ingrédient
     * @param [in] float $prix Le prix de l'ingrédient
     * @return void
     */
    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @brief Getter du prix de l'ingrédient
     * @return Le prix de l'ingrédient
     */
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * @brief Setter de l'unité de l'ingrédient
     * @param [in] string $unite L'unité de l'ingrédient
     * @return void
     */
    public function setUnite($unite): void
    {
        $this->unite = $unite;
    }

    /**
     * @brief Getter de l'unité de l'ingrédient
     * @return L'unité de l'ingrédient
     */
    public function getUnite(): string
    {
        return $this->unite;
    }

    //MÉTHODES USUELLES
    /**
     * @brief Affiche le nom de l'ingrédient, son prix et son unité
     * @return Le message d'affichage
     */
    public function toString(): string
    {
        return "nomIngredient= " . $this->nomIngredient . ", prix= " . $this->prix . ", unite= " . $this->unite . " ";
    }

    //MÉTHODES METIERS

    /**
     * @brief Modifie l'ingrédient
     * @param [in] int $idX
     * @param [in] string $nomIngredientX
     * @param [in] float $prixX
     * @param [in] string $uniteX
     * @return void
     */
    public function modifierIngredient(int $idX, string $nomIngredientX, float $prixX, string $uniteX):void
    {
        $this->idIngredient = $idX;
        $this->nomIngredient = $nomIngredientX;
        $this->prix = $prixX;
        $this->unite = $uniteX;
    }
}