document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.articles-carousel');
    const articles = document.querySelectorAll('.article');
    const prevArrow = document.getElementById('prevArrow');
    const nextArrow = document.getElementById('nextArrow');
    const carouselDots = document.querySelectorAll('.carousel-dots');
    const filterButton = document.querySelector('.bouton-filtre');
    const slideMenu = document.getElementById('slide-menu');

    let currentIndex = 0;

    // Créer les points de navigation
    carouselDots.forEach((dot, index) => {
        dot.addEventListener('click', () => changeArticle(index));
    });

    nextArrow.addEventListener('click', function () {
        changeArticle(currentIndex + 1);
    });

    prevArrow.addEventListener('click', function () {
        changeArticle(currentIndex - 1);
    });

    function changeArticle(newIndex) {
        articles[currentIndex].classList.remove('active');

        // Vérifier si l'index est le dernier
        if (newIndex === articles.length) {
            // Si c'est le dernier, passer au premier
            newIndex = 0;
        } else if (newIndex < 0) {
            // Si c'est inférieur à zéro, passer au dernier
            newIndex = articles.length - 1;
        }

        articles[newIndex].classList.add('active');

        currentIndex = newIndex;
        updateCarousel();
        updateDots();
    }


    function updateCarousel() {
        const newPosition = -currentIndex * articles[0].offsetWidth;
        carousel.style.transform = `translateX(${newPosition}px)`;
    }

    function updateDots() {
        carouselDots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    // Affiche le premier article
    articles[currentIndex].classList.add('active');
    updateDots();

    // Initialiser le slider avec noUiSlider
    const priceSlider = document.getElementById('priceRange');
    const minPriceInput = document.getElementById('minPrice');
    const maxPriceInput = document.getElementById('maxPrice');

    noUiSlider.create(priceSlider, {
        start: [0, 4000],
        connect: true,
        range: {
            'min': 0,
            'max': 4000
        },
    });

    // Mettre à jour les valeurs minPrice et maxPrice lors du changement du slider
    priceSlider.noUiSlider.on('update', function(values, handle) {
        var value = parseFloat(values[handle]).toFixed(2);

        if (handle === 0) {
            minPriceInput.value = value;
        } else {
            maxPriceInput.value = value;
        }
    });

    filterButton.addEventListener('click', function () {
        slideMenu.style.left = (slideMenu.style.left === "0vw") ? "-50vw" : "0vw";
    });

    $('.filter .titre-filtre').click(function () {
        $(this).parent().toggleClass('active');
    });



    $('.no.label.ui.dropdown')
        .dropdown();

    $('input[name="materiaux[]"]').on('change', function() {
        if ($(this).prop('checked')) {
            $(this).parent().addClass('selected');
        } else {
            $(this).parent().removeClass('selected');
        }
    });

    $('input[name="couleur[]"]').on('change', function() {
        if ($(this).prop('checked')) {
            $(this).parent().addClass('selected');
        } else {
            $(this).parent().removeClass('selected');
        }
    });

    $('input[name="categorie[]"]').on('change', function() {
        if ($(this).prop('checked')) {
            $(this).parent().addClass('selected');
        } else {
            $(this).parent().removeClass('selected');
        }
    });

});
