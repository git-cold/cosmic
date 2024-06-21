// Icone de recherche
var btn_search = document.querySelector(".fa-magnifying-glass")
console.log(btn_search)

let searchBarOpen = false
// Barre de recherche
let search_bar = document.querySelector(".user-search")
btn_search.addEventListener("click", ()=>{
    search_bar.classList.toggle("active")
    if (!searchBarOpen){
        gsap.to(
            search_bar, {background : "#D9D9D9", width : 200}
        )
        searchBarOpen = true
    }else{
        gsap.to(
            search_bar, {background : "transparent", width : 0}
        )
        searchBarOpen = false
    }
})

// Ajouter la gestion du bouton "Afficher le formulaire"
toggleFormBtn.addEventListener("click", () => {
    toggleSearchBar();
});

// Soumettre le formulaire lors de l'appui sur la touche "Entrée" dans le champ de recherche
search_bar.addEventListener("keydown", (event) => {
    if (event.key === "Enter") {
        event.preventDefault(); // Empêcher le comportement par défaut (ex. sauter une ligne dans le champ de texte)
        search_form.submit(); // Soumettre le formulaire
    }
});

function toggleSearchBar() {
    search_bar.classList.toggle("active");
    if (!searchBarOpen) {
        gsap.to(search_bar, { background: "#D9D9D9", width: 200 });
        searchBarOpen = true;
    } else {
        gsap.to(search_bar, { background: "transparent", width: 0 });
        searchBarOpen = false;
    }
}
