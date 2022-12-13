<?php

class Ingredient
{
    //ATTRIBUTS
    public int $idIngredient;
    public string $nomIngredient;
    public float $prix;
    public string $unite;

    //CONSTRUCTEUR
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

    //METHODES USUELLES
    function toString(): string
    {
        return "nomIngredient= " . $this->nomIngredient . ", prix= " . $this->prix . ", unite= " . $this->unite . " ";
    }
}

class Recette
{
    //ATTRIBUTS
    public int $idRecette;
    public string $nomRecette;
    public float $prixAjout;
    public float $prixSacADos;
    public array $ingredients = array();

    //CONSTRUCTEUR
    function  __construct($idRecette, $nomRecette, $prixAjout, $prixSacADos)
    {
        $this->idRecette = $idRecette;
        $this->nomRecette = $nomRecette;
        $this->prixAjout = $prixAjout;
        $this->prixSacADos = $prixSacADos;
    }

    public function addIngredient(Ingredient $ingredient):void{
        $this->ingredients[] = $ingredient;
    }

    public function getIngredients(): array{
        return $this->ingredients;
    }

    function setIdRecette($idRecette): void
    {
        $this->idRecette = $idRecette;
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

    //METHODES USUELLES
    function toString(): string
    {
        $str = "";
        foreach ($this->ingredients as $ingredient) {
            $str .= $ingredient->toString() . "<br>";
        }
        return "nomRecette= " . $this->nomRecette . ", prixAjout= " . $this->prixAjout . ", prixSacADos= " . $this->prixSacADos . "<br>" . $str;
    }
}

$recette = new Recette(1, "Pain", 0.5, 0.5);
$recette->addIngredient(new Ingredient(1, "Farine", 0.5, "kg"));
$recette->addIngredient(new Ingredient(2, "Eau", 0.5, "L"));
$recette->addIngredient(new Ingredient(3, "Sel", 0.5, "kg"));

// get the list of ingredients in the recipe
$ingredients = $recette->getIngredients();
echo $recette->toString();

$Pain = new Recette(1, "Pain", 0.5, 0.5 );

class LivreIngredients
{
    private array $ingredients = array();

    public function addIngredient(Ingredient $ingredient): void
    {
        $this->ingredients[] = $ingredient;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function toString(): string
    {
        $str = "";
        foreach ($this->ingredients as $ingredient) {
            $str .= $ingredient->toString() . "<br>";
        }
        return $str;
    }

}

$livreIngredients = new LivreIngredients();
$livreIngredients->addIngredient(new Ingredient(1, "Farine", 0.5, "kg"));
$livreIngredients->addIngredient(new Ingredient(2, "Oeuf", 0.5, "kg"));
$livreIngredients->addIngredient(new Ingredient(3, "Sucre", 0.5, "kg"));
$livreIngredients->addIngredient(new Ingredient(4, "Lait", 0.5, "kg"));
echo "<br>";
echo $livreIngredients->toString();
echo "<br>";
class LivreRecettes
{
    private array $recettes = array();

    public function addRecette(Recette $recette): void
    {
        $this->recettes[] = $recette;
    }

    public function getRecettes(): array
    {
        return $this->recettes;
    }

    public function toString(): string
    {
        $result = "";
        foreach ($this->recettes as $recette) {
            $result .= $recette->toString() . "<br>";
        }
        return $result;
    }

}

$livreRecettes = new LivreRecettes();
$livreRecettes->addRecette(new Recette(1, "Gateau", 0.5, 0.5 , new Ingredient(1, "Farine", 0.5, "kg")));
$livreRecettes->addRecette(new Recette(2, "Pain", 0.5, 0.5 , new Ingredient(2, "Oeuf", 0.5, "kg")));
$livreRecettes->addRecette(new Recette(3, "Crepes", 0.5, 0.5 , new Ingredient(3, "Sucre", 0.5, "kg")));
$livreRecettes->addRecette(new Recette(4, "Cafe", 0.5, 0.5 , new Ingredient(4, "Lait", 0.5, "kg")));
echo "<br>";
echo $livreRecettes->toString();