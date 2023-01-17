<?php

/**
 * @created 2022-12-12
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @version 1.0
 * @description Classes LivreIngredient
 */
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

    /**
     * @brief Permet de retrouver les ingrédients saisit par l'utilisateur dans le livre d'ingrédient
     * @param String $nomIngredient Le nom de l'ingrédient saisi par l'utilisateur
     * @return L'ingrédient correspondant au nom saisi par l'utilisateur du type Ingredient
     */

    public function retrouverIngredient(string $nomIngredient): Ingredient
    {
        $ingredientX = null;
        foreach ($this->listeIngredients as $ingredient) {
            if ($ingredient->getNomIngredient() == $nomIngredient) {
                return $ingredient;
            }
        }
        return $ingredientX;
    }
}