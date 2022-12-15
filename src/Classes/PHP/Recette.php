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

$recette = new Recette(1, "Pain", 0.5, 0.5);
$recette->ajouteIngredient(new Ingredient(1, "Farine", 0.5, "kg"));
$recette->ajouteIngredient(new Ingredient(2, "Eau", 0.5, "L"));
$recette->ajouteIngredient(new Ingredient(3, "Sel", 0.5, "kg"));
$recette2 = new Recette(2, "pizza", 0.5, 0.5);
$recette2->ajouteIngredient(new Ingredient(1, "Farine", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(2, "Eau", 0.5, "L"));
$recette2->ajouteIngredient(new Ingredient(3, "Sel", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(4, "Oeuf", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(5, "Tomate", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(6, "Fromage", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(7, "Jambon", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(8, "Oignon", 0.5, "kg"));
$recette2->ajouteIngredient(new Ingredient(9, "Olives", 0.5, "kg"));

// get the list of ingredients in the recipe
$ingredients = $recette->getIngredients();
$ingredients2 = $recette2->getIngredients();

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

    /**
     * @function supprRecette
     * @description Permet de supprimer une recette du livre de recette
     */
    public function supprRecette(Recette $recette):void{
        $cle = array_search($recette, $this->listeRecettes);
        if($cle !== false){
            unset($this->listeRecettes[$cle]);
        }
    }

    /**
     * @function getRecettes
     * @description Permet d'afficher les recettes du livre de recette
     */
    public function getRecettes(): array{
        return $this->listeRecettes;
    }
}

echo "<br>";
$livreRecette = new livreRecette();
$livreRecette->ajouteRecette($recette);
$livreRecette->ajouteRecette($recette2);
$Recettes = $livreRecette->getRecettes();

foreach ($Recettes as $recette) {
    echo $recette->toString();
    echo '<br>';
}

class livreIngredient
{
    /**
     * @livreIngredient Cette classe permet de créer un livre d'ingrédient avec ses ingrédients
     */

    //ATTRIBUTS
    public array $listeIngredients = array();

    //CONSTRUCTEUR

    /**
     * @function setListeIngredients
     * @function getListeIngredients
     * @function __construct
     * @description Permet de créer un livre d'ingrédient avec ses ingrédients
     */

    public function setListeIngredients($listeIngredients): void
    {
        $this->listeIngredients = $listeIngredients;
    }
    public function __construct($listeIngredients)
    {
        $this->setListeIngredients($listeIngredients);
    }

    public function getListeIngredients(): array{
        return $this->listeIngredients;
    }

    //MÉTHODES USUELLES

    /**
     * @function ajouteIngredient
     * @description Permet d'ajouter un ingrédient au livre d'ingrédient
     */
    public function ajouteIngredient(Ingredient $ingredient):void{
        $this->listeIngredients[] = $ingredient;
    }

    /**
     * @function supprIngredient
     * @description Permet de supprimer un ingrédient du livre d'ingrédient
     */
    public function supprIngredient(Ingredient $ingredient):void{
        $cle = array_search($ingredient, $this->listeIngredients);
        if($cle !== false){
            unset($this->listeIngredients[$cle]);
        }
    }

    /**
     * @function modifIngredient
     * @description Permet de modifier un ingrédient du livre d'ingrédient
     */

    public function modifIngredient(Ingredient $ingredient, Ingredient $newIngredient):void
    {
        $cle = array_search($ingredient, $this->listeIngredients);
        if($cle !== false){
            $this->listeIngredients[$cle] = $newIngredient;
        }
    }

    /**
     * @function getIngredients
     * @description Permet d'afficher les ingrédients du livre d'ingrédient
     */
    public function getIngredients(): array
    {
        return $this->listeIngredients;
    }

}
echo "<br>";
$livreIngredient = new livreIngredient(array());

foreach ($livreIngredient as $ingredient) {
    foreach ($ingredient as $ingredient2) {
        $livreIngredient->ajouteIngredient($ingredient2);
    }
}

$MesIngredients = $livreIngredient->getIngredients();

foreach ($MesIngredients as $ingredient) {
    echo $ingredient->toString() . "<br>";
}




