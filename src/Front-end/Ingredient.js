function search_ingredient() {
    let input = document.getElementById('search-txt').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('ingredient');

    for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="inline-block";
        }
    }
}