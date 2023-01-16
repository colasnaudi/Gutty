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
     * @Recette Cette classe permet de créer une recette avec son nom, son prixAjout, son prix, ses ingrédients et sa quantité
     */

    //ATTRIBUTS
    private int $idRecette;
    private string $nomRecette;
    private float $prixAjout;
    private float $prixRecette;
    private array $ingredients = array();
    private array $quantites = array();

    //CONSTRUCTEUR

    /**
     * @function __construct
     * @function setIdRecette
     * @function setNomRecette
     * @function setPrixAjout
     * @function setPrixRecette
     * @function getIdRecette
     * @function getNomRecette
     * @function getPrixAjout
     * @function getPrixRecette
     */
    public function  __construct($idRecette, $nomRecette)
    {
        $this->idRecette = $idRecette;
        $this->nomRecette = $nomRecette;
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

    public function setPrixRecette($prixRecette): void
    {
        $this->$prixRecette = $prixRecette;
    }

    public function getPrixRecette(): float|int
    {
        return $this->prixRecette;
    }

    public function setQuantite($quantite): void
    {
        $this->quantites = $quantite;
    }

    public function getQuantite(): array{
        return $this->quantites;
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
    public function toString(): string{
        $lesIngredients = array();
        foreach ($this->ingredients as $ingredient){
            $lesIngredients[] = $ingredient->getNomIngredient();
            $unite = $ingredient->getUnite();
        }
        $str = "Liste des ingrédients de la recette : <br>";
        foreach (array_combine($lesIngredients, $this->quantites) as $ingredient => $quantite) {
            $str .= "Ingredient : " . $ingredient . " Quantité : " . $quantite . $unite . " <br>";
        }
        return $str;
    }

    public function ajouteIngredient(Ingredient $ingredient, float $quantite): void
    {
        //Ajout de l'ingrédient et de sa quantité
        array_push($this->ingredients, $ingredient);
        array_push($this->quantites, $quantite);
        //Calcul du prix du frigo
        $this->prixRecette = $this->calculerPrixRecette();
    }

    private function calculerPrixRecette(): float {
        $prix = 0;
        $prixIngredients = array();

        //On récupère le prix de chaque ingrédient
        foreach ($this->ingredients as $ingredient){
            $prixIngredients[] = $ingredient->getPrix();
        }
        //On multiplie le prix de chaque ingrédient par sa quantité pour avoir le prix du frigo
        foreach(array_combine($prixIngredients, $this->quantites) as $ingredient => $quantite) {
            $prix = $prix + ($ingredient * $quantite);
        }
        return $prix;
    }

    //Methodes métier
    public function convertirQuantite($quantite, $unite, $uniteConvertie): float {
        $quantiteConvertie = 0;

        if ($unite == "g" && $uniteConvertie == "kg"){
            $quantiteConvertie = $quantite / 1000;
        }

        if ($unite == "mg" && $uniteConvertie == "kg"){
            $quantiteConvertie = $quantite / 1000000;
        }

        if ($unite == "kg" && $uniteConvertie == "kg"){
            $quantiteConvertie = $quantite;
        }

        if ($unite == "ml" && $uniteConvertie == "l"){
            $quantiteConvertie = $quantite / 1000;
        }

        if ($unite == "cl" && $uniteConvertie == "l"){
            $quantiteConvertie = $quantite / 100;
        }

        if ($unite == "dl" && $uniteConvertie == "l"){
            $quantiteConvertie = $quantite / 10;
        }

        if ($unite == "l" && $uniteConvertie == "l"){
            $quantiteConvertie = $quantite;
        }
        if($unite == "sans unite" && $uniteConvertie == "poignee"){
            $quantiteConvertie = $quantite * 4;
        }
        if($unite == "poignee" && $uniteConvertie == "sans unite"){
            $quantiteConvertie = $quantite / 4;
        }
        if ($unite == "pincee" && $uniteConvertie == "g"){
            $quantiteConvertie = $quantite * 5;
        }
        if ($unite == "g" && $uniteConvertie == "pincee"){
            $quantiteConvertie = $quantite / 5;
        }
        if ($unite == "g" && $uniteConvertie == "cuillère à café"){
            $quantiteConvertie = $quantite * 5;
        }
        if ($unite == "cuillere a cafe" && $uniteConvertie == "g"){
            $quantiteConvertie = $quantite / 5;
        }
        if ($unite == "g" && $uniteConvertie == "cuillere a soupe"){
            $quantiteConvertie = $quantite * 15;
        }
        if ($unite == "cuillere à soupe" && $uniteConvertie == "g"){
            $quantiteConvertie = $quantite / 15;
        }
        if ($unite == "sans unite" && $uniteConvertie == "sans unite"){
            $quantiteConvertie = $quantite;
        }
        if ($unite == "pincée" && $uniteConvertie == "pincée"){
            $quantiteConvertie = $quantite;
        }
        if ($unite == "cuillere a cafe" && $uniteConvertie == "cuillere a cafe"){
            $quantiteConvertie = $quantite;
        }
        if ($unite == "cuillere a soupe" && $uniteConvertie == "cuillere a soupe"){
            $quantiteConvertie = $quantite;
        }
        return $quantiteConvertie;
    }

    public function calculPrixRecette():float {
        $prix = 0;
        $prixIngredients = array();

        //On récupère le prix de chaque ingrédient
        foreach ($this->ingredients as $ingredient){
            $prixIngredients[] = $ingredient->getPrix();
        }
        //On multiplie le prix de chaque ingrédient par sa quantité pour avoir le prix du frigo
        foreach(array_combine($prixIngredients, $this->quantites) as $ingredient => $quantites) {
            $prix = $prix + ($ingredient * $quantites);
        }
        return $prix;
    }

}




