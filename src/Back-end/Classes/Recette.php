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
    public function calculerPrixFrigo(Frigo $unFrigo):void {
        //Initialisaiton des variables
        $prixFrigo = 0;

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
        $prixIngredientRecette = array();
        foreach ($ingredientRecette as $ingredient){
            $prixIngredientRecette[] = $ingredient->getPrix();
        }

        //Initialisation des iterateurs multiple
        $iterateurMultipleFrigo = new MultipleIterator();
        $iterateurMultipleFrigo->attachIterator(new ArrayIterator($nomIngredientFrigo));
        $iterateurMultipleFrigo->attachIterator(new ArrayIterator($quantiteFrigo));
        $iterateurMultipleFrigo->attachIterator(new ArrayIterator($prixIngredientFrigo));

        $iterateurMultipleRecette = new MultipleIterator();
        $iterateurMultipleRecette->attachIterator(new ArrayIterator($quantiteRecette));
        $iterateurMultipleRecette->attachIterator(new ArrayIterator($nomIngredientRecette));
        $iterateurMultipleRecette->attachIterator(new ArrayIterator($prixIngredientRecette));

        //Calcul du prix frigo
        //Parcours des ingrédients du frigo
        foreach ($iterateurMultipleFrigo as $valeurFrigo) {
            list($nomIngredientFrigo, $quantiteFrigo, $prixIngredientFrigo) = $valeurFrigo;
            //Parcours des ingrédients de la recette
            foreach ($iterateurMultipleRecette as $valeurRecette) {
                list($quantiteRecette, $nomIngredientRecette, $prixIngredientRecette) = $valeurRecette;
                //Si l'ingrédient du frigo est présent dans la recette
                if ($nomIngredientFrigo === $nomIngredientRecette) {
                    echo "Ingredient en commun : " . $nomIngredientFrigo . " avec une qteFrigo : " . $quantiteFrigo . " et une qteRecette à " . $quantiteRecette . " <br>";
                    if ($quantiteFrigo < $quantiteRecette || $quantiteFrigo > $quantiteRecette) {
                        echo "Qte min : " . min($quantiteFrigo, $quantiteRecette) . " <br>";
                        $prixFrigo += min($quantiteFrigo, $quantiteRecette) * $prixIngredientFrigo;
                    }
                    else {
                        $prixFrigo += $quantiteFrigo * $prixIngredientFrigo;
                    }
                }
            }
        }
        $this->setPrixFrigo($prixFrigo);
        $this->setPrixAjout($this->prixRecette - $prixFrigo);
    }

}




