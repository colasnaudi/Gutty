<?php

/**
 * @created 2022-12-12
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @version 1.0
 * @description Classes
 */
class Ingredient
{
    /**
     * @Ingredient Cette classe permet de créer un ingrédient pour une recette avec son nom et sa quantité ainsi que son prix
     *
     */

    //ATTRIBUTS
    public int $idIngredient;
    public string $nomIngredient;
    public float $prix;
    public string $unite;

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
    function __construct($idIngredient, $nomIngredient, $prix, $unite)
    {
        $this->idIngredient = $idIngredient;
        $this->nomIngredient = $nomIngredient;
        $this->prix = $prix;
        $this->unite = $unite;
    }

    function setIdIngredient($idIngredient): void
    {
        $this->idIngredient = $idIngredient;
    }

    function getIdIngredient(): int
    {
        return $this->idIngredient;
    }

    function setNomIngredient($nomIngredient): void
    {
        $this->nomIngredient = $nomIngredient;
    }

    function getNomIngredient(): string
    {
        return $this->nomIngredient;
    }

    function setPrix($prix): void
    {
        $this->prix = $prix;
    }

    function getPrix(): float
    {
        return $this->prix;
    }

    function setUnite($unite): void
    {
        $this->unite = $unite;
    }

    function getUnite(): string
    {
        return $this->unite;
    }

    //MÉTHODES USUELLES

    /**
     * @function __toString
     * @description Permet d'afficher les informations de l'ingrédient
     * @return string
     */
    function toString(): string
    {
        return "nomIngredient= " . $this->nomIngredient . ", prix= " . $this->prix . ", unite= " . $this->unite . " ";
    }
}

class Recette
{
    /**
     * @Recette Cette classe permet de créer une recette avec son nom, son prixAjout, son prixSacADos, ses ingrédients et sa quantité
     */

    //ATTRIBUTS
    public int $idRecette;
    public string $nomRecette;
    public float $prixAjout;
    public float $prixSacADos;
    public array $ingredients = array();



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
    function  __construct($idRecette, $nomRecette, $prixAjout, $prixSacADos)
    {
        $this->idRecette = $idRecette;
        $this->nomRecette = $nomRecette;
        $this->prixAjout = $prixAjout;
        $this->prixSacADos = $prixSacADos;
    }

    function setIdRecette($idRecette): void
    {
        $this->idRecette = $idRecette;
    }
    public function getIngredients(): array{
        return $this->ingredients;
    }

    function getIdRecette(): int
    {
        return $this->idRecette;
    }

    function setNomRecette($nomRecette): void
    {
        $this->nomRecette = $nomRecette;
    }

    function getNomRecette(): string
    {
        return $this->nomRecette;
    }

    function setPrixAjout($prixAjout): void
    {
        $this->prixAjout = $prixAjout;
    }

    function getPrixAjout(): float|int
    {
        return $this->prixAjout;
    }

    function setPrixSacADos($prixSacADos): void
    {
        $this->prixSacADos = $prixSacADos;
    }

    function getPrixSacADos(): float|int
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
    function toString(): string
    {
        $str = "";
        foreach ($this->ingredients as $ingredient) {
            $str .= $ingredient->toString() . "<br>";
        }
        return "nomRecette= " . $this->nomRecette . ", prixAjout= " . $this->prixAjout . ", prixSacADos= " . $this->prixSacADos . "<br>" . $str;
    }

    public function ajouteIngredient(Ingredient $ingredient):void{
        array_push($this->ingredients,$ingredient);
    }

    public function supprIngredient(Ingredient $ingredient):void{
        $cle1 = array_search($ingredient, $this->ingredients);
        if($cle1 !== false){
            unset($this->ingredients[$cle1]);
        }
}

    public function verifPrixIngredient(Ingredient $ingredient):bool{
        
    }
}

$recette = new Recette(1, "Pain", 0.5, 0.5);
$recette->ajouteIngredient(new Ingredient(1, "Farine", 0.5, "kg"));
$recette->ajouteIngredient(new Ingredient(2, "Eau", 0.5, "L"));
$recette->ajouteIngredient(new Ingredient(3, "Sel", 0.5, "kg"));

// get the list of ingredients in the recipe
$ingredients = $recette->getIngredients();
echo $recette->toString();

$Pain = new Recette(1, "Pain", 0.5, 0.5 );

class livreRecette
{
    /**
     * @livreRecette Cette classe permet de créer un livre de recette avec ses recettes
     */

    //ATTRIBUTS
    public array $listeRecettes = array();

    //MÉTHODES USUELLES

    /**
     * @function ajouteRecette
     * @description Permet d'ajouter une recette au livre de recette
     */

    public function ajouteRecette(Recette $recette):void{
        $this->listeRecettes[] = $recette;
    }

    public function supprRecette(Recette $recette):void{
        $cle = array_search($recette, $this->listeRecettes);
        if($cle !== false){
            unset($this->listeRecettes[$cle]);
        }
    }

    public function getRecettes(): array{
        return $this->listeRecettes;
    }
}

$livreRecette = new livreRecette();
$livreRecette->ajouteRecette($recette);
$Recettes = $livreRecette->getRecettes();

echo $Recettes[0] ->toString();

class livreIngredient
{
    /**
     * @livreIngredient Cette classe permet de créer un livre d'ingrédient avec ses ingrédients
     */

    //ATTRIBUTS
    public array $listeIngredients = array();


}