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
    private string $nomRecette;
    private float $prixAjout;
    private float $prixFrigo;
    private float $prixRecette;
    private array $ingredients = array();
    private array $quantites = array();

    //CONSTRUCTEUR

    /**
     * @function __construct
     * @function setNomRecette
     * @function setPrixAjout
     * @function setPrixRecette
     * @function setPrixRecette
     * @function getNomRecette
     * @function getPrixAjout
     * @function getPrixRecette
     */
    public function __construct(String $nom, array $ingredients, array $quantites) {
        $this->nomRecette = $nom;
        $this->ingredients = $ingredients;
        $this->quantites = $quantites;
        $this->prixRecette = $this->calculerPrixRecette();
    }

    public function setPrixFrigo(float $prixFrigo): void{
        $this->prixFrigo = $prixFrigo;
    }

    public function getPrixFrigo(): float{
        return $this->prixFrigo;
    }

    public function getIngredients(): array{
        return $this->ingredients;
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
        $this->quantite = $quantite;
    }

    public function getQuantite(): array{
        return $this->quantite;
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
    public function calculerPrixAjout(Frigo $unFrigo):float {
        //Initialisaiton des variables
        $prixAjout = 0;

        $ingredientFrigo = $unFrigo->getIngredients();
        $nomIngredientFrigo = array();
        foreach ($ingredientFrigo as $ingredient){
            $nomIngredientFrigo[] = $ingredient->getNomIngredient();
        }
        $quantiteFrigo = $unFrigo->getQuantites();
        $prixIngredientFrigo = array();
        foreach ($ingredientFrigo as $ingredient){
            $prixIngredientFrigo[] = $ingredient->getPrix();
        }

        $ingredientRecette = $this->ingredients;
        $nomIngredientRecette = array();
        foreach ($ingredientRecette as $ingredient){
            $nomIngredientRecette[] = $ingredient->getNomIngredient();
        }
        $quantiteRecette = $this->quantites;

        //Calcul du prix d'ajout
        $iterateurMultiple = new MultipleIterator();
        $iterateurMultiple->attachIterator(new ArrayIterator($nomIngredientFrigo));
        $iterateurMultiple->attachIterator(new ArrayIterator($quantiteFrigo));
        $iterateurMultiple->attachIterator(new ArrayIterator($prixIngredientFrigo));

        foreach ($iterateurMultiple as $valeur) {
            list($nomIngredientFrigo, $quantiteFrigo, $prixIngredientFrigo) = $valeur;
            foreach ($nomIngredientRecette as $ingredientRecette) {
                if ($nomIngredientFrigo == $ingredientRecette) {
                    if ($quantiteFrigo < $quantiteRecette || $quantiteFrigo > $quantiteRecette) {
                        $prixAjout += min($quantiteFrigo, $quantiteRecette) * $prixIngredientFrigo;
                    }
                }
            }
        }
        /*
        foreach (array_combine($ingredientFrigo, $quantiteFrigo) as $ingredientFrigo => $quantiteFrigo) {
            foreach (array_combine($nomIngredientRecette, $quantiteRecette) as $ingredientRecette => $quantiteRecette) {
                if ($ingredientFrigo->getNomIngredient() == $ingredientRecette) {
                    if ($quantiteFrigo < $quantiteRecette || $quantiteFrigo > $quantiteRecette) {
                        $prixAjout += min($quantiteFrigo, $quantiteRecette) * $ingredientFrigo->getPrix();
                    }
                }
            }
        }
        */
        $this->setPrixAjout($prixAjout);
        $this->setPrixFrigo($this->prixRecette - $prixAjout);
        return $prixAjout;
    }

}




