function recherche_ingredient() {
    //récupère les caractères entrés dans la barre de recherche en minuscule
    let searchValue = document.getElementById('ing_recherche').value.toLowerCase();

    //récupère les ingrédients
    let ingredients = document.getElementsByClassName('ingredient');

    //parcourt les ingrédients et les affiche si le nom correspond à la recherche
    if (searchValue.length > 0) {

        //parcourt les ingrédients
        for (let i = 0; i < ingredients.length; i++) {

            //récupère le nom de l'ingrédient en minuscule
            let ingredientName = ingredients[i].getElementsByTagName("label")[0].innerHTML.toLowerCase();

            //cache l'ingrédient si le nom ne correspond pas à la recherche
            if (!ingredientName.includes(searchValue)) {

                // Hide the ingredient
                ingredients[i].style.display = "none";
            }
            else
            {
                //Affiche l'ingrédient en block
                ingredients[i].style.display = "flex";
            }
        }
    }
    else
    {
        //affiche tous les ingrédients si la recherche est vide
        for(let i = 0; i < ingredients.length; i++){
            ingredients[i].style.display = "inline-block";
        }
    }
}


function changeColor(event) {
    var cible = event.currentTarget;
    if (event.target.checked) {
        cible.style.backgroundColor = "#35a922";
        document.getElementById(cible.id).checked = true;
    } else {
        cible.style.backgroundColor = "#D9D9D9";
    }
}