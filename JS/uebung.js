
window.addEventListener('load', (event)=>{
    alert("Variante 1: Die Seite ist vollständig geladen");
    console.log("Variante 1: Die Seite ist vollständig geladen");
});



function myFunction() {
    var input = document.getElementById('input');
    var output = document.getElementById('output');

    output.innerText = input.value;
}

function myClickFunction() {
    var button = document.getElementById('colorButton');
    if(document.body.style.backgroundColor === button.dataset.color) {
        document.body.style.backgroundColor = "white";
    } else {
        document.body.style.backgroundColor = button.dataset.color;
    }
}

function addPizza(pizza) {
    console.log(pizza);
    console.log('Name: '+pizza.dataset.name, 'Preis: '+ pizza.dataset.price);
    var warenkorb = document.getElementById('warenkorb');
    console.log(warenkorb);
    var opt = document.createElement('option');
    opt.value = pizza.dataset.name;
    opt.text = pizza.dataset.name;
    console.log(opt);
    warenkorb.appendChild(opt);
    console.log(warenkorb);

    var priceTag = document.getElementById('preisAusgabe');
    var price = parseFloat(priceTag.textContent) + parseFloat(pizza.dataset.price);
    let dollar = "$";
    priceTag.innerText = price + dollar;

}