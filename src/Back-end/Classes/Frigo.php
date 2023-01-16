<?php
/**
 * @Frigo Cette classe permet de créer un frigo avec une liste d'ingrédients et leurs quantités
 * @function __construct
 * @function getIngredients
 * @function setIngredients
 * @function setQuantite
 * @function getQuantite
 * @function setPrixFrigo
 * @function getPrixFrigo
 * @function toString
 * @function ajouterIngredient
 * @function calculerPrixFrigo
 */
class Frigo
{
    //ATTRIBUTS
    private array $ingredients = array();
    private array $quantites = array();
    private float $prixFrigo = 0;

    //CONSTRUCTEUR
    /**
     * @param array $ingredients
     * @param array $quantites
     * @description Constructeur de la classe Frigo
     */
    public function __construct(array $ingredients, array $quantites) {
        $this->ingredients = $ingredients;
        $this->quantites = $quantites;
        $this->prixFrigo = $this->calculerPrixFrigo();
    }

    //ENCAPSULATION

    /**
     * @return array
     * @description Getter de la liste des ingrédients
     */
    public function getIngredients(): array{
        return $this->ingredients;
    }

    /**
     * @return void
     * @param array $ingredients
     * @description Setter de la liste des $ingredients
     */
    public function setIngredients(array $ingredients): void{
        $this->ingredients = $ingredients;
    }

    /**
     * @return array
     * @description Getter de la liste des quantités
     */
    public function getQuantites(): array{
        return $this->quantites;
    }

    /**
     * @return void
     * @param array $quantites
     * @description Setter de la liste des quantités
     */
    public function setQuantites(array $quantites): void{
        $this->quantites = $quantites;
    }

    /**
     * @return float
     * @description Getter du prix du frigo
     */
    public function getPrixFrigo(): float{
        return $this->prixFrigo;
    }

    /**
     * @return void
     * @param float $prixFrigo
     * @description Setter du prix du frigo
     */
    public function setPrixFrigo(float $prixFrigo): void{
        $this->prixFrigo = $prixFrigo;
    }

    //METHODES USUELLES
    /**
     * @return string
     * @description Permet d'afficher les informations du frigo
     */
    public function toString(): string{
        $lesIngredients = array();
        foreach ($this->ingredients as $ingredient){
            $lesIngredients[] = $ingredient->getNomIngredient();
        }
        $str = "Liste des ingrédients du frigo : <br>";
        foreach (array_combine($lesIngredients, $this->quantites) as $ingredient => $quantite) {
            $str .= "Ingredient : " . $ingredient . " Quantité : " . $quantite . " <br>";
        }
        return $str;
    }

    /**
     * @return void
     * @param Ingredient $ingredient
     * @param int $quantite
     * @description Ajoute un ingrédient au frigo
     */
    public function ajouterIngredient(Ingredient $ingredient, int $quantite): void
    {
        //Ajout de l'ingrédient et de sa quantité
        array_push($this->ingredients, $ingredient);
        array_push($this->quantites, $quantite);
        //Calcul du prix du frigo
        $this->prixFrigo = $this->calculerPrixFrigo();
    }

    //METHODES METIERS
    /**
     * @return float
     * @description Calcule le prix du frigo
     */
    private function calculerPrixFrigo(): float {
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
}