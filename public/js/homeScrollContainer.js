
document.addEventListener("DOMContentLoaded", function() {
    // Sélectionnez les éléments des flèches
    const leftArrow = document.querySelector(".scroll-arrow.left");
    const rightArrow = document.querySelector(".scroll-arrow.right");

    // Sélectionnez le conteneur scrollable
    const scrollContainer = document.querySelector("#new-product .new-product-container");

    // Définissez la largeur du défilement (ajustez en fonction de votre contenu)
    const scrollWidth = 400;
    // Fonction pour gérer le défilement vers la gauche
    function scrollLeft() {
        scrollContainer.scrollBy({
            left: -scrollWidth,
            behavior: 'smooth'
        });
    }

    // Fonction pour gérer le défilement vers la droite
    function scrollRight() {
        scrollContainer.scrollBy({
            left: scrollWidth,
            behavior: 'smooth'
        });
    }



    ScrollReveal().reveal('#new-product .new-product-container', {
        duration: 2000,
        origin: 'left',
        distance: '50px',
        afterReveal: function () {
            scrollRight(); // Appel à scrollRight après que l'élément soit révélé
        }
    });

    
    // Ajoutez des écouteurs d'événements pour les clics sur les flèches
    leftArrow.addEventListener("click", scrollLeft);
    rightArrow.addEventListener("click", scrollRight);

    // Désactivez la flèche de gauche au début du défilement
    leftArrow.classList.add("disabled");

    // Ajoutez un écouteur d'événements pour suivre le défilement et mettre à jour l'état des flèches
    scrollContainer.addEventListener("scroll", function() {
        // Désactivez ou activez la flèche de gauche en fonction de la position de défilement
        leftArrow.classList.toggle("disabled", scrollContainer.scrollLeft === 0);
        
        // Désactivez ou activez la flèche de droite en fonction de la position de défilement
        rightArrow.classList.toggle("disabled", scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth - 1);
    });
});




ScrollReveal().reveal('.primary-text', {duration : 2000, opacity : 0.1})
ScrollReveal().reveal('.secondary-text', {duration : 2000, delay : 350})
ScrollReveal().reveal('.btn-group', {duration : 2000, delay : 900})
ScrollReveal().reveal('.svg-separator.top', {duration : 2000, delay : 1200})
ScrollReveal().reveal('.svg-separator', {duration : 2000,origin: 'top',
distance: '50px',})

ScrollReveal().reveal('.section-title', {duration :1800});
ScrollReveal().reveal('.text-naration.first', {duration:1000, delay : 1200})
ScrollReveal().reveal('.paragraph-title', {duration:1000, delay : 1600})
ScrollReveal().reveal('.paragraph-text', {duration:1000, delay : 2050})
ScrollReveal().reveal('.image-value.menuisier', {duration:1000, delay : 1000})
ScrollReveal().reveal('.text-naration.second', {duration:1000, delay : 1200})
ScrollReveal().reveal('.image-value.arbre', {duration:1000, delay : 1200})

ScrollReveal().reveal('.magazine-logo.img1', {duration:3000})
ScrollReveal().reveal('.magazine-logo.img2', {duration:3000, delay:1000})
ScrollReveal().reveal('.magazine-logo.img3', {duration:3000, delay:2000})
ScrollReveal().reveal('.magazine-logo.img4', {duration:3000, delay:3000})
ScrollReveal().reveal('.svg-text', {duration:3000, delay:3000})
 
