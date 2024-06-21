var prevScrollpos = window.pageYOffset;
window.onscroll = function() {

var currentScrollpos = window.pageYOffset;
if(prevScrollpos > currentScrollpos) {
      document.querySelector(".navbar").style.top = "0";
} else {
      document.querySelector(".navbar").style.top = "-150px";
}

prevScrollpos = currentScrollpos;

}

document.onreadystatechange = function() {
    let lastScrollPosition = 0;
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function(e) {
      lastScrollPosition = window.scrollY;

      if (lastScrollPosition > 10){
        if (window.scrollY < 30){
          navbar.style.backgroundColor = "transparent";
      }else{
        navbar.style.backgroundColor = "#ededed";
      }
        navbar.classList.add('navbar-visible');
      }
      else
        navbar.classList.remove('navbar-visible');
    });
  }

