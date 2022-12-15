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
 * @function ajouteIngredient
 * @function calculePrixFrigo
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
    public function __construct($ingredients, $quantites) {
        $this->ingredients = $ingredients;
        $this->quantites = $quantites;
        $this->prixFrigo = $this->calculerPrixFrigo();
    }

    //ENCAPSULATION

    /**
     * @return array
     * @param array $ingredients
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
    public function setIngredients($ingredients): void{
        $this->ingredients = $ingredients;
    }

    /**
     * @return array
     * @param array $quantites
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
    public function setQuantites($quantites): void{
        $this->quantites = $quantites;
    }

    /**
     * @return float
     * @param float $prixFrigo
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
    public function setPrixFrigo($prixFrigo): void{
        $this->prixFrigo = $prixFrigo;
    }

    //METHODES USUELLES
    /**
     * @return string
     * @description Permet d'afficher les informations du frigo
     */
    public function toString(): string{
        $str = "Liste des ingrédients du frigo : ";
        foreach (array_combine($this->ingredients, $this->quantites) as $ingredient => $quantite) {
            $str .= "Ingredient : " . $ingredient->this->toString() . " Quantité : " . $quantite . " <br>";
        }
        return $str;
    }

    /**
     * @return void
     * @param Ingredient $ingredient
     * @param int $quantite
     * @description Ajoute un ingrédient au frigo
     */
    public function ajouteIngredient(Ingredient $ingredient, int $quantite): void
    {
        array_push($this->ingredients, $ingredient);
        array_push($this->quantites, $quantite);
    }

    //METHODES METIERS
    /**
     * @return float
     * @description Calcule le prix du frigo
     */
    private function calculerPrixFrigo(): float {
        $prix = 0;
        foreach(array_combine($this->ingredients, $this->quantites) as $ingredient => $quantite) {
            $prix = $prix + ($ingredient->prix * $quantite);
        }
        return $prix;
    }
}