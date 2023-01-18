<?php

/**
 * @file LivreIngredient.php
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @brief Classe LivreIngredient qui est une composition de la classe Ingredient
 * @version 1.0
 * @date 2022-12-12
 */
class livreIngredient
{
    //ATTRIBUTS
    /**
     * @brief Liste des ingrédients du livre
     */
    public array $listeIngredients = array();

    //CONSTRUCTEUR
    /**
     * @brief Constructeur de la classe LivreIngredient à partir d'une liste d'ingrédients
     * @param [in] Ingredient $listeIngredients
     */
    public function __construct(Ingredient $listeIngredients)
    {
        $this->setListeIngredients($listeIngredients);
    }

    //ENCAPSULATION

    /**
     * @brief Setter de la liste des ingrédients du livre
     * @param [in] array $listeIngredients La liste des ingrédients du livre
     * @return void
     */
    public function setListeIngredients(array $listeIngredients): void
    {
        $this->listeIngredients = $listeIngredients;
    }

    /**
     * @brief Getter de la liste des ingrédients du livre
     * @return La liste des ingrédients du livre
     */
    public function getListeIngredients(): array{
        return $this->listeIngredients;
    }

    //MÉTHODES METIERS

    /**
     * @brief Permet d'ajouter un ingrédient au livre d'ingrédients
     * @param [in] Ingredient $ingredient L'ingrédient à ajouter
     * @return void
     */
    public function ajouteIngredient(Ingredient $ingredient):void{
        $this->listeIngredients[] = $ingredient;
    }

    /**
     * @brief Permet de supprimer un ingrédient du livre d'ingrédients
     * @param [in] Ingredient $ingredient L'ingrédient à supprimer
     * @return void
     */
    public function supprIngredient(Ingredient $ingredient):void{
        $cle = array_search($ingredient, $this->listeIngredients);
        if($cle !== false){
            unset($this->listeIngredients[$cle]);
        }
    }

    /**
     * @brief Permet de modifier un ingrédient du livre d'ingrédients
     * @param [in] Ingredient $ingredient L'ingrédient à modifier
     * @param [in] Ingredient $ingredientModif L'ingrédient modifié
     * @return void
     */
    public function modifIngredient(Ingredient $ingredient, Ingredient $newIngredient):void
    {
        $cle = array_search($ingredient, $this->listeIngredients);
        if($cle !== false){
            $this->listeIngredients[$cle] = $newIngredient;
        }
    }

    /**
     * @brief Permet de rechercher un ingrédient dans le livre d'ingrédients
     * @param [in] string $nomIngredient Le nom de l'ingrédient à rechercher
     * @return L'intrédient recherché s'il est trouvé ou null sinon
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