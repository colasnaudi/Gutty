    <?php

/**
 * @file LivreRecette.php
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @brief Classe LivreRecette qui est une composition de la classe Recette
 * @version 1.0
 * @date 2022-12-12
 */
class livreRecette
{
    //ATTRIBUTS
    /**
     * @brief Liste des recettes du livre
     */
    public array $listeRecettes = array();

    //CONSTRUCTEUR
    /**
     * @brief Constructeur de la classe LivreRecette à partir d'une liste de recettes
     * @param [in] array $listeRecettes
     */
    public function __construct(array $listeRecettes)
    {
        $this->setListeRecettes($listeRecettes);
    }

    //ENCAPSULATION
    /**
     * @brief Setter de la liste des recettes du livre
     * @param [in] array $listeRecettes La liste des recettes du livre
     * @return void
     */
    public function setListeRecettes(array $listeRecettes): void
    {
        $this->listeRecettes = $listeRecettes;
    }

    /**
     * @brief Getter de la liste des recettes du livre
     * @return La liste des recettes du livre
     */
    public function getListeRecettes(): array{
        return $this->listeRecettes;
    }

    //MÉTHODES METIERS
    /**
     * @brief Permet d'ajouter une recette au livre de recettes
     * @param [in] Recette $recette La recette à ajouter
     * @return void
     */
    public function ajouteRecette(Recette $recette):void{
        $this->listeRecettes[] = $recette;
    }

    /**
     * @brief Permet de supprimer une recette du livre de recettes
     * @param [in] Recette $recette La recette à supprimer
     * @return void
     */
    public function supprRecette(Recette $recette):void{
        $cle = array_search($recette, $this->listeRecettes);
        if($cle !== false){
            unset($this->listeRecettes[$cle]);
        }
    }
}