(function() {
    // Add event listener
    document.addEventListener("mousemove", parallax);
    const elem = document.querySelector("#parallax");
    // Magic happens here
    function parallax(e) {
        let _w = window.innerWidth/2;
        let _h = window.innerHeight/2;
        let _mouseX = e.clientX;
        let _mouseY = e.clientY;
        let _depth1 = `${50 - (_mouseX - _w) * 0.01}% ${50 - (_mouseY - _h) * 0.01}%`;
        let _depth2 = `${50 - (_mouseX - _w) * 0.02}% ${50 - (_mouseY - _h) * 0.02}%`;
        let _depth3 = `${50 - (_mouseX - _w) * 0.06}% ${50 - (_mouseY - _h) * 0.06}%`;
        let x = `${_depth3}, ${_depth2}, ${_depth1}`;
        console.log(x);
        elem.style.backgroundPosition = x;
    }

})();

document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.articles-carousel');
    const articles = document.querySelectorAll('.article');
    const prevArrow = document.getElementById('prevArrow');
    const nextArrow = document.getElementById('nextArrow');

    let currentIndex = 0;

    nextArrow.addEventListener('click', function () {
        if (currentIndex < articles.length - 1) {
            articles[currentIndex].classList.remove('active');
            currentIndex++;
            articles[currentIndex].classList.add('active');
            updateCarousel();
        }
    });

    prevArrow.addEventListener('click', function () {
        if (currentIndex > 0) {
            articles[currentIndex].classList.remove('active');
            currentIndex--;
            articles[currentIndex].classList.add('active');
            updateCarousel();
        }
    });

    function updateCarousel() {
        const newPosition = -currentIndex * articles[0].offsetWidth;
        carousel.style.transform = `translateX(${newPosition}px)`;
    }

    // Affiche le premier article
    articles[currentIndex].classList.add('active');
});
