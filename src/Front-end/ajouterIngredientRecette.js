let $nbIngredients = 1;
let $nbEtapes = 1;

function ajouterIngredient() {
    // Remettre le boutond'ajout d'un ingrédient en blanc
    $boutonAjouter = document.getElementById("boutonAjouterIngredient");
    $boutonAjouter.style.backgroundColor = "white";

    // Récupérer les id des inputs
    $inputQuantite = document.getElementById("quantite");
    $inputUnite = document.getElementById("unite");
    $inputIngredient = document.getElementById("ingredient");

    // Récupérer les valeurs des inputs
    $quantite = $inputQuantite.value;
    $unite = $inputUnite.value;
    $ingredient = $inputIngredient.value;

    // Créer un id pour chaque ingrédient
    $id = "ingredients" + $nbIngredients;
    $nameQuantite = "quantite" + $nbIngredients;
    $nameUnite = "unite" + $nbIngredients;
    $nameIngredient = "ingredient" + $nbIngredients;
    // Incrémenter le nombre d'ingrédients
    $nbIngredients++;
    // Ajouter l'ingrédient, sa quantité et son unité dans la div
    document.getElementById("mesIngredients").innerHTML += "<div class='ingredient'><p>" + $quantite + " " + $unite + " " + $ingredient + "</p><i onclick='supprimerIngredient()'  class='material-symbols-outlined' id=" + $id + ">close</i></div>";
    //Ajouter l'ingrédient, sa quantité et son unité dans le formulaire caché
    document.getElementById("formulaireCacher").innerHTML += "<input type='hidden' name='" + $nameQuantite + "' value='" + $quantite + "'>";
    document.getElementById("formulaireCacher").innerHTML += "<input type='hidden' name='" + $nameUnite + "' value='" + $unite + "'>";
    document.getElementById("formulaireCacher").innerHTML += "<input type='hidden' name='" + $nameIngredient + "' value='" + $ingredient + "'>";
    document.getElementById("formulaireCacher").innerHTML += "<input type='hidden' name='nbIngredients' value='" + $nbIngredients + "'>";
    // Remettre les inputs à vide
    $inputQuantite.value = "";
    $inputUnite.value = "";
    $inputIngredient.value = "";
    // Remettre le focus sur le premier input
    $inputQuantite.focus();
}

function supprimerIngredient() {
    // Supprimer l'ingrédient si on clique sur la croix
    window.addEventListener("click", function(e) {
        $id = document.getElementById(e.target.id);
        if ($id.id.includes("ingredients")) {
            $id.parentNode.remove();
        }
    });
    $nbIngredients--;
}

var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
    var span = document.createElement("SPAN");
    var txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
        var div = this.parentElement;
        div.style.display = "none";
    }
}

function ajouterEtape() {
    var li = document.createElement("li");
    var inputValue = document.getElementById("etape").value;
    var t = document.createTextNode(inputValue);
    li.appendChild(t);
    if (inputValue === '') {
        alert("étape vide");
    } else {
        document.getElementById("toutesLesEtapes").appendChild(li);
    }
    document.getElementById("etape").value = "";

    var span = document.createElement("SPAN");
    var txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    li.appendChild(span);

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
            var div = this.parentElement;
            div.style.display = "none";
        }
    }

    $nameEtape = "etape" + $nbEtapes;
    document.getElementById("formulaireCacher").innerHTML += "<input type='hidden' name='" + $nameEtape + "' value='" + inputValue + "'>";
    document.getElementById("formulaireCacher").innerHTML += "<input type='hidden' name='nbEtapes' value='" + $nbEtapes + "'>";
    $nbEtapes++;
}