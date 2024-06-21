const checkbox = document.querySelector('input[type="checkbox"].obligatory');
const paiement_bouton = document.querySelector('.button_conditionnal');
    checkbox.addEventListener('change', function(){
        paiement_bouton.disabled = !checkbox.checked;
        console.log(paiement_bouton)
    console.log('cest good');

})