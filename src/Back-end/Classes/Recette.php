<?php

/**
 * @file Recette.php
 * @author CELLE Guillian, GARCIA Angel, LAGÜE Mathis
 * @brief Classe Recette qui est une composition de la classe Ingredient
 * @version 1.0
 * @date 2022-12-12
 */

class Recette
{
    //ATTRIBUTS
    /**
     * @brief Le nom de la recette
     */
    private string $nomRecette;

    /**
     * @brief Etapes de la recette
     */
    private string $etapeRecette;

    /**
     * @brief Image de la recette
     */
    private string $imageRecette;

    /**
     * @brief Temps de préparation de la recette
     */
    private string $temps;

    /**
     * @brief Etat de la recette
     * @details L'état de la recette peut être 0 (non validée), 1 (validée) ou 2 (refusée)
     */
    private int $etat;

    /**
     * @brief Le nombre de personne pour la recette
     */
    private int $nbPersonne;

    /**
     * @brief L'id de l'utilisateur qui a créé la recette
     */
    private int $idUtilisateur;

    /**
     * @brief Le type de cuisson de la recette
     * @details Le type de cuisson peut être four, plaque, sans plaque ou autre
     */
    private string $typeCuisson;

    /**
     * @brief Le prix à ajouter pour la recette
     * @details C'est à dire le prix des ingrédients qui ne sont pas dans le frigo
     * @details Ce prix sera calculé en fonction des ingrédients d'un frigo et leur quantité
     */
    private float $prixAjout;

    /**
     * @brief Le pourcentage d'utilisateion du frigo de la recette
     * @details Ce prix sera calculé en fonction des ingrédients d'un frigo et leur quantité
     */
    private float $pourcentageFrigo;

    /**
     * @brief Le prix de la recette
     * @details C'est à dire le prix des ingrédients de la recette multiplié par leur quantité
     */
    private float $prixRecette;

    /**
     * @brief La liste des ingrédients de la recette
     */
    private array $ingredients = array();

    /**
     * @brief La liste des quantités des ingrédients de la recette
     */
    private array $quantites = array();

    /**
     * @brief Le nombre d'ingrédients en commun avec les ingrédients du frigo
     */
    private int $nbIngredientCommun;

    //CONSTRUCTEUR

    /**
     * @brief Constructeur de la classe Recette à partir d'un nom, d'une liste d'ingrédients et d'une liste de quantités
     * @param [in] string $nomRecette Le nom de la recette
     * @param [in] array $ingredients La liste des ingrédients de la recette
     * @param [in] array $quantites La liste des quantités des ingrédients de la recette
     */
    public function __construct(string $nom, string $etape, string $image, string $temps, int $etat, int $nbPersonne, int $idUtilisateur, string $typeCuisson, array $ingredients, array $quantites) {
        $this->nomRecette = $nom;
        $this->etapeRecette = $etape;
        $this->imageRecette = $image;
        $this->temps = $temps;
        $this->etat = $etat;
        $this->nbPersonne = $nbPersonne;
        $this->idUtilisateur = $idUtilisateur;
        $this->typeCuisson = $typeCuisson;
        $this->ingredients = $ingredients;
        $this->quantites = $quantites;
        $this->prixRecette = $this->calculerPrixRecette();
    }

    //ENCAPSULATION
    /**
     * @brief Setter du nom de la recette
     * @param [in] string $nomRecette Le nom de la recette
     * @return void
     */
    public function setNomRecette(string $nomRecette): void
    {
        $this->nomRecette = $nomRecette;
    }

    /**
     * @brief Getter du nom de la recette
     * @return Le nom de la recette
     */
    public function getNomRecette(): string
    {
        return $this->nomRecette;
    }

    /**
     * @brief Getter des étapes de la recette
     * @return Les étapes de la recette
     */
    public function getEtapeRecette(): string
    {
        return $this->etapeRecette;
    }

    /**
     * @brief Setter des étapes de la recette
     * @param [in] string $etapeRecette Les étapes de la recette
     * @return void
     */
    public function setEtapeRecette(string $etapeRecette): void
    {
        $this->etapeRecette = $etapeRecette;
    }

    /**
     * @brief Getter de l'image de la recette
     * @return L'image de la recette
     */
    public function getImageRecette(): string
    {
        return $this->imageRecette;
    }

    /**
     * @brief Setter de l'image de la recette
     * @param [in] string $imageRecette L'image de la recette
     * @return void
     */
    public function setImageRecette(string $imageRecette): void
    {
        $this->imageRecette = $imageRecette;
    }

    /**
     * @brief Getter du temps de la recette
     * @return Le temps de la recette
     */
    public function getTemps(): string
    {
        return $this->temps;
    }

    /**
     * @brief Setter du temps de la recette
     * @param [in] string $temps Le temps de la recette
     * @return void
     */
    public function setTemps(string $temps): void
    {
        $this->temps = $temps;
    }

    /**
     * @brief Getter de l'état de la recette
     * @return L'état de la recette
     */
    public function getEtat(): int
    {
        return $this->etat;
    }

    /**
     * @brief Setter de l'état de la recette
     * @param [in] int $etat L'état de la recette
     * @return void
     */
    public function setEtat(int $etat): void
    {
        $this->etat = $etat;
    }

    /**
     * @brief Getter du nombre de personne de la recette
     * @return Le nombre de personne de la recette
     */
    public function getNbPersonne(): int
    {
        return $this->nbPersonne;
    }

    /**
     * @brief Setter du nombre de personne de la recette
     * @param [in] int $nbPersonne Le nombre de personne de la recette
     * @return void
     */
    public function setNbPersonne(int $nbPersonne): void
    {
        $this->nbPersonne = $nbPersonne;
    }

    /**
     * @brief Getter de l'id de l'utilisateur de la recette
     * @return L'id de l'utilisateur de la recette
     */
    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }

    /**
     * @brief Setter de l'id de l'utilisateur de la recette
     * @param [in] int $idUtilisateur L'id de l'utilisateur de la recette
     * @return void
     */
    public function setIdUtilisateur(int $idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * @brief Getter du type de cuisson de la recette
     * @return Le type de cuisson de la recette
     */
    public function getTypeCuisson(): string
    {
        return $this->typeCuisson;
    }

    /**
     * @brief Setter du type de cuisson de la recette
     * @param [in] string $typeCuisson Le type de cuisson de la recette
     * @return void
     */
    public function setTypeCuisson(string $typeCuisson): void
    {
        $this->typeCuisson = $typeCuisson;
    }

    /**
     * @brief Setter du prix à ajouter
     * @param [in] float|int $prixAjout Le prix à ajouter
     * @return void
     */
    public function setPrixAjout(float|int $prixAjout): void
    {
        $this->prixAjout = $prixAjout;
    }

    /**
     * @brief Getter du prix à ajouter
     * @return Le prix à ajouter
     */
    public function getPrixAjout(): float|int
    {
        return $this->prixAjout;
    }

    /**
     * @brief Setter du pourcentage du frigo
     * @param [in] float $pourcentageFrigo Le prix du frigo
     * @return void
     */
    public function setPourcentageFrigo(float $pourcentageFrigo): void{
        $this->pourcentageFrigo = $pourcentageFrigo;
    }

    /**
     * @brief Getter du pourcentage du frigo
     * @return Le prix du frigo
     */
    public function getPourcentageFrigo(): float{
        return $this->pourcentageFrigo;
    }

    /**
     * @brief Setter du prix de la recette
     * @param [in] float|int $prixRecette Le prix de la recette
     * @return void
     */
    public function setPrixRecette(float|int $prixRecette): void
    {
        $this->$prixRecette = $prixRecette;
    }

    /**
     * @brief Getter du prix de la recette
     * @return Le prix de la recette
     */
    public function getPrixRecette(): float|int
    {
        return $this->prixRecette;
    }

    /**
     * @brief Getter des ingrédients de la recette
     * @return La liste des ingrédients de la recette
     */
    public function getIngredients(): array{
        return $this->ingredients;
    }

    /**
     * @brief Setter des ingrédients de la recette
     * @param [in] array $ingredients La liste des ingrédients de la recette
     * @return void
     */
    public function setIngredients(array $ingredients): void{
        $this->ingredients = $ingredients;
    }

    /**
     * @brief Setter des quantités des ingrédients de la recette
     * @param array $quantite La liste des quantités des ingrédients de la recette
     * @return void
     */
    public function setQuantite(array $quantite): void
    {
        $this->quantites = $quantite;
    }

    /**
     * @brief Getter des quantités des ingrédients de la recette
     * @return La liste des quantités des ingrédients de la recette
     */
    public function getQuantite(): array{
        return $this->quantites;
    }

    public function setNbIngredientCommun(int $nbIngredient): void {
        $this->nbIngredientCommun = $nbIngredient;
    }

    public function getNbIngredientCommun(): int {
        return $this->nbIngredientCommun;
    }

    //MÉTHODES USUELLES
    /**
     * @brief Affiche les ingrédients de la recette, leur quantité et leur unité
     * @return Le message d'affichage
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

    //METHODES METIERS
    /**
     * @brief Ajoute un ingrédient et sa quantité dans la recette
     * @param [in] Ingredient $ingredient L'ingrédient à ajouter
     * @param [in] float $quantite La quantité de l'ingrédient à ajouter
     * @return void
     */
    public function ajouteIngredient(Ingredient $ingredient, float $quantite): void
    {
        //Ajout de l'ingrédient et de sa quantité
        array_push($this->ingredients, $ingredient);
        array_push($this->quantites, $quantite);
        //Calcul du prix du frigo
        $this->prixRecette = $this->calculerPrixRecette();
    }

    /**
     * @brief Calcul le prix de la recette
     * @details On multiplie le prix de chaque ingrédient par sa quantité pour avoir le prix de la recette
     * @return Le prix de la recette
     */
    private function calculerPrixRecette(): float {
        //Initialisation des variables
        $prix = 0;
        $prixIngredients = array();
        $quantiteIngredients = array();
        //On récupère le prix de chaque ingrédient
        foreach ($this->ingredients as $ingredient){
            $prixIngredients[] = $ingredient->getPrix();
        }
        //On récupère la quantité de chaque ingrédient
        foreach ($this->quantites as $quantite){
            $quantiteIngredients[] = $quantite;
        }
        //On multiplie le prix de chaque ingrédient par sa quantité pour avoir le prix de la recette
        foreach ($prixIngredients as $index => $value){
            $prix += $prixIngredients[$index] * $quantiteIngredients[$index];
        }
        return number_format(round($prix, 2), 2);

    }

    /**
     * @brief Calcul le prix frigo de la recette
     * @details En réalité on calcul le prix frigo ainsi que le prix à ajouter
     * @details On va aussi mettre à jour les attributs pourcentageFrigo et prixAjout de la recette
     * @param [in] Frigo $unFrigo
     * @return void
     */
    public function calculerPourcentageFrigo(Frigo $unFrigo):void {
        //Initialisaiton des variables
        $pourcentageFrigo = 0;

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
                    if ($quantiteFrigo < $quantiteRecette || $quantiteFrigo > $quantiteRecette) {
                        $pourcentageFrigo += min($quantiteFrigo, $quantiteRecette) * $prixIngredientFrigo;
                    }
                    else {
                        $pourcentageFrigo += $quantiteFrigo * $prixIngredientFrigo;
                    }
                }
            }
        }
        //Mise à jour des attributs PourcentageFrigo et prixRecette de la recette
        $this->setPourcentageFrigo(round($pourcentageFrigo*100/$this->prixRecette));
        $this->setPrixAjout($this->prixRecette - $pourcentageFrigo);
    }

    /**
     * @brief On compte le nombre d'ingrédient en commun entre la recette et le frigo saisit
     * @param [in] Frigo $unFrigo
     * @return void
     */
    public function compterIngredientCommun(Frigo $unFrigo): void {
        $nbIngredientCommun = 0;
        foreach ($unFrigo->getIngredients() as $ingredient) {
            if (in_array($ingredient, $this->ingredients)) {
                $nbIngredientCommun++;
            }
        }
        $this->setNbIngredientCommun($nbIngredientCommun);
    }
}




