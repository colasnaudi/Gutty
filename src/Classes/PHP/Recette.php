<?php

/**
 * @created 2022-12-12
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @version 1.0
 * @description Classes Recette
 */

class Recette
{
    /**
     * @Recette Cette classe permet de créer une recette avec son nom, son prixAjout, son prixSacADos, ses ingrédients et sa quantité
     */

    //ATTRIBUTS
    private int $idRecette;
    private string $nomRecette;
    private float $prixAjout;
    private float $prixSacADos;
    private array $ingredients = array();

    //CONSTRUCTEUR

    /**
     * @function __construct
     * @function setIdRecette
     * @function setNomRecette
     * @function setPrixAjout
     * @function setPrixSacADos
     * @function getIdRecette
     * @function getNomRecette
     * @function getPrixAjout
     * @function getPrixSacADos
     */
    public function  __construct($idRecette, $nomRecette, $prixAjout, $prixSacADos)
    {
        $this->idRecette = $idRecette;
        $this->nomRecette = $nomRecette;
        $this->prixAjout = $prixAjout;
        $this->prixSacADos = $prixSacADos;
    }

    public function setIdRecette($idRecette): void
    {
        $this->idRecette = $idRecette;
    }
    public function getIngredients(): array{
        return $this->ingredients;
    }

    public function getIdRecette(): int
    {
        return $this->idRecette;
    }

    public function setNomRecette($nomRecette): void
    {
        $this->nomRecette = $nomRecette;
    }

    public function getNomRecette(): string
    {
        return $this->nomRecette;
    }

    public function setPrixAjout($prixAjout): void
    {
        $this->prixAjout = $prixAjout;
    }

    public function getPrixAjout(): float|int
    {
        return $this->prixAjout;
    }

    public function setPrixSacADos($prixSacADos): void
    {
        $this->prixSacADos = $prixSacADos;
    }

    public function getPrixSacADos(): float|int
    {
        return $this->prixSacADos;
    }

    //MÉTHODES USUELLES

    /**
     * @function toString
     * @description Permet d'afficher les informations de la recette
     * @return string
     *
     * @function ajouteIngredient
     * @description Permet d'ajouter un ingrédient à la recette
     */
    public function toString(): string
    {
        $str = "";
        foreach ($this->ingredients as $ingredient) {
            $str .= $ingredient->toString() . "<br>";
        }
        return "nomRecette= " . $this->nomRecette . ", prixAjout= " . $this->prixAjout . ", prixSacADos= " . $this->prixSacADos . "<br>" . $str;
    }

    public function ajouteIngredient(Ingredient $ingredient):void{
        $this->ingredients[] = $ingredient;
    }
}




