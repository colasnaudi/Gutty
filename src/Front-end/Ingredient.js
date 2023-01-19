function recherche_ingredient() {

    // On récupère la valeur de l'input de recherche avec l'id correspondant
    let element = document.getElementById('ing_recherche').value

    //On passe l'element recupéré en minuscule pour éviter les erreurs de frappe
    element=element.toLowerCase();

    // On récupère la liste des ingrédients
    let ingredient = document.getElementsByClassName('ingredient');

    for (let i = 0; i < ingredient.length; i++) {
        // Si l'ingrédient ne contient pas les caractères recherchés
        if (!ingredient[i].innerHTML.toLowerCase().includes(element)) {

            // On cache l'ingrédient
            ingredient[i].style.display="none";
        }
        else
        {
            // On affiche l'ingrédient
            ingredient[i].style.display="inline-block";
        }
    }
}