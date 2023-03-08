var popupContainer = document.getElementById("popup-container");
var popupButton = document.getElementById("popup-button");
var closeButton = document.getElementById("close-button");
var annulerButton = document.getElementById("bouton-annuler");

popupButton.onclick = function() {
    popupContainer.style.display = "block";
}

closeButton.onclick = function() {
    popupContainer.style.display = "none";
}

annulerButton.onclick = function() {
    popupContainer.style.display = "none";
}
