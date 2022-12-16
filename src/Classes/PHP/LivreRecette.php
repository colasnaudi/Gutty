<?php

/**
 * @created 2022-12-12
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @version 1.0
 * @description Classes LivreRecette
 */
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