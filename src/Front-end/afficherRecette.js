$(".fa-star").click(function() {
    $(this).toggleClass("selected");
    $(this).prevAll().toggleClass("selected");
});
