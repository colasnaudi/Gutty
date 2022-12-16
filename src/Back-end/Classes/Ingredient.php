<?php

/**
 * @created 2022-12-12
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @version 1.0
 * @description Classes Ingredient
 */
class Ingredient
{
    /**
     * @Ingredient Cette classe permet de créer un ingrédient pour une recette avec son nom et sa quantité ainsi que son prix
     *
     */

    //ATTRIBUTS
    private int $idIngredient;
    private string $nomIngredient;
    private float $prix;
    private string $unite;

    //CONSTRUCTEUR

    /**
     * @function __construct
     * @function setIdIngredient
     * @function setNomIngredient
     * @function setPrix
     * @function setUnite
     * @function getIdIngredient
     * @function getNomIngredient
     * @function getPrix
     * @function getUnite
     * @description Constructeurs de la classe Ingredient
     */
    public function __construct($idIngredient, $nomIngredient, $prix, $unite)
    {
        $this->idIngredient = $idIngredient;
        $this->nomIngredient = $nomIngredient;
        $this->prix = $prix;
        $this->unite = $unite;
    }

    public function setIdIngredient($idIngredient): void
    {
        $this->idIngredient = $idIngredient;
    }

    public function getIdIngredient(): int
    {
        return $this->idIngredient;
    }

    public function setNomIngredient($nomIngredient): void
    {
        $this->nomIngredient = $nomIngredient;
    }

    public function getNomIngredient(): string
    {
        return $this->nomIngredient;
    }

    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function setUnite($unite): void
    {
        $this->unite = $unite;
    }

    public function getUnite(): string
    {
        return $this->unite;
    }

    //MÉTHODES USUELLES

    /**
     * @function __toString
     * @description Permet d'afficher les informations de l'ingrédient
     * @return string
     */
    public function toString(): string
    {
        return "nomIngredient= " . $this->nomIngredient . ", prix= " . $this->prix . ", unite= " . $this->unite . " ";
    }
}