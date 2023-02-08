<?php
/**
 * @file Frigo.php
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @brief Classe Frigo qui est une composition de la classe Ingredient
 * @version 1.0
 * @date 2022-12-12
 */

class Frigo
{
    //ATTRIBUTS
    /**
     * @brief Liste des ingrédients du frigo
     */
    private array $ingredients = array();

    /**
     * @brief Liste des quantités des ingrédients du frigo
     */
    private array $quantites = array();

    /**
     * @brief Pourcentage d'utilisation du frigo
     */
    private float $pourcentageFrigo = 0;

    //CONSTRUCTEUR

    /**
     * @brief Constructeur de la classe Frigo à partir d'une liste d'ingrédients et d'une liste de quantités
     * @param [in] array $ingredients La liste des ingrédients du frigo
     * @param [in] array $quantites La liste des quantités des ingrédients du frigo
     */
    public function __construct(array $ingredients, array|null $quantites)
    {
        $this->ingredients = $ingredients;
        if($quantites != null) {
            $this->quantites = $quantites;
            $this->pourcentageFrigo = $this->calculerPourcentageFrigo();
        }
    }

    //ENCAPSULATION

    /**
     * @brief Getter de la liste des ingrédients du frigo
     * @return Une liste d'ingrédients
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /**
     * @brief Setter de la liste des $ingredients
     * @param [in] array $ingredients La liste des ingrédients du frigo
     * @return void
     */
    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @brief Getter de la liste des quantités
     * @return Une liste de quantités
     */
    public function getQuantites(): array
    {
        return $this->quantites;
    }

    /**
     * @brief Setter de la liste des quantités
     * @param [in] array $quantites La liste des quantités des ingrédients du frigo
     * @return void
     */
    public function setQuantites(array $quantites): void
    {
        $this->quantites = $quantites;
    }

    /**
     * @brief Getter du prix du frigo
     * @return Un prix
     */
    public function getPourcentageFrigo(): float
    {
        return $this->pourcentageFrigo;
    }

    /**
     * @param [in] float $pourcentageFrigo Le prix du frigo
     * @brief Setter du prix du frigo
     * @return void
     */
    public function setPourcentageFrigo(float $pourcentageFrigo): void
    {
        $this->pourcentageFrigo = $pourcentageFrigo;
    }

    //METHODES USUELLES

    /**
     * @brief Permet d'afficher les informations du frigo
     * @details Affiche le nom de l'ingrédient et la quantité présente dans le frigo
     * @return Le message d'affichage
     */
    public function toString(): string
    {
        $lesIngredients = array();
        foreach ($this->ingredients as $ingredient) {
            $lesIngredients[] = $ingredient->getNomIngredient();
        }
        $str = "Liste des ingrédients du frigo : <br>";
        foreach (array_combine($lesIngredients, $this->quantites) as $ingredient => $quantite) {
            $str .= "Ingredient : " . $ingredient . " Quantité : " . $quantite . " <br>";
        }
        return $str;
    }

    /**
     * @brief Ajoute un ingrédient au frigo
     * @details Ajoute un ingrédient et sa quantité au frigo et met à jour le prix du frigo
     * @param [in] Ingredient $ingredient L'ingrédient à ajouter au frigo
     * @param [in] int $quantite La quantité de l'ingrédient à ajouter au frigo
     * @return void
     * @warning Si l'ingrédient est déjà présent dans le frigo l'ingrédient et sa quantité sont dupliqués et le prix du frigo est mis à jour
     */
    public function ajouterIngredient(Ingredient $ingredient, int $quantite): void
    {
        //Ajout de l'ingrédient et de sa quantité
        array_push($this->ingredients, $ingredient);
        array_push($this->quantites, $quantite);
        //Calcul du prix du frigo
        $this->pourcentageFrigo = $this->calculerPourcentageFrigo();
    }

    //METHODES METIERS

    /**
     * @brief Calcule le prix du frigo
     * @details Calcule le prix du frigo en multipliant le prix de chaque ingrédient par sa quantité
     * @return  int Le prix du frigo
     */
    private function calculerPourcentageFrigo(): float
    {
        //Initialisation des variables
        $prix = 0;
        $prixIngredients = array();

        //On récupère le prix de chaque ingrédient
        foreach ($this->ingredients as $ingredient) {
            $prixIngredients[] = $ingredient->getPrix();
        }
        //On multiplie le prix de chaque ingrédient par sa quantité pour avoir le prix du frigo
        foreach (array_combine($prixIngredients, $this->quantites) as $ingredient => $quantite) {
            $prix = $prix + ($ingredient * $quantite);
        }
        return $prix;
    }

    /**
     * @brief Permet de générer les recettes possibles à partir des ingrédients du frigo et du livre de recettes
     * @details Les recettes possibles sont celles dont au moins deux ingrédients sont présents dans le frigo et la recette
     * @param LivreRecette $lesRecettes Le livre de recettes
     * @return La liste des recettes possibles
     */
    public function genererPossibleRecette(LivreRecette $lesRecettes): array
    {
        //Initialisation des variables
        $lesRecettesPossibles = array();
        $mesRecettes = $lesRecettes->getListeRecettes();

        //Generation des recettes possibles
        foreach ($mesRecettes as $recette) {
            $nbIngredientsCommuns = 0;
            $recetteAjouter = false;
            foreach ($recette->getIngredients() as $ingredient) {
                if (in_array($ingredient, $this->ingredients)) {
                    $nbIngredientsCommuns++;
                }
                if ($nbIngredientsCommuns === 2 && $recetteAjouter === false) {
                    $recetteAjouter = true;
                    $lesRecettesPossibles[] = $recette;
                }
            }
        }
        return $lesRecettesPossibles;
    }

    /**
     * @brief Compare le prix frigo de deux recettes
     * @param $recetteA
     * @param $recetteB
     * @return -1 si $a < $b, 0 si $a = $b, 1 si $a > $b
     */
    private function comparerAvecQuantite($recetteA, $recetteB): int
    {
        return $recetteA->getPourcentageFrigo() <=> $recetteB->getPourcentageFrigo();
    }

    /**
     * @brief Trie les recettes possibles par prix frigo décroissant
     * @param array $listePossibilite La liste des recettes possibles
     * @return La liste des recettes possibles triées par prix frigo décroissant
     */
    public function trierSuggestionAvecQuantite(array $listePossibilite): array
    {
        usort($listePossibilite, array($this, "comparerAvecQuantite"));
        return array_reverse($listePossibilite);
    }

    private function comparerSansQuantite($recetteA, $recetteB): int
    {
        return $recetteA->getNbIngredientCommun() <=> $recetteB->getNbIngredientCommun();
    }

    public function trierSuggestionSansQuantite(array $listePossibilite): array
    {
        usort($listePossibilite, array($this, "comparerSansQuantite"));
        return array_reverse($listePossibilite);
    }
}