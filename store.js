function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function generateProducts(event) {

        //Impedisco il submit del form
        event.preventDefault();
        //Leggo il valore del campo di testo
        const team_input = document.querySelector("#team");
        const team_value = encodeURIComponent(team_input.value);
        //Preparo la richiesta
        rest_url = 'warehouse_products.php?team=' + team_value;
        //Eseguo la fetch
        fetch(rest_url).then(onResponse).then(onJson);

}

let productid;
function onJson(json) {
    console.log("json: ");
    console.log(json);

    const store = document.querySelector("#divstore") 
    store.innerHTML = "";

    for (const product of json) { //Uso il for qualora nel DB ci fossero più prodotti della stessa squadra

        console.log("product");
        console.log(product);

        const divproduct = document.createElement("div");
        divproduct.classList.add("product");

        const image = document.createElement("img");
        image.src = product.url_copertina;
        image.classList.add("image");
        const team = document.createElement("h3");
        team.textContent = product.team;
        const price = document.createElement("p");
        price.textContent = "Prezzo: " + product.prezzo + "€";
        const add_cart = document.createElement("img");
        add_cart.src = "./images/aggiungi_al_carrello.png";
        add_cart.classList.add("button_cart");
        add_cart.addEventListener("click", addToCart);
        productid = product.id;
        console.log("productid");
        console.log(productid);

        divproduct.appendChild(image);
        divproduct.appendChild(team);
        divproduct.appendChild(price);
        divproduct.appendChild(add_cart);

        store.appendChild(divproduct);
    }
}

function addToCart(event) {
    alert("Maglietta inserita nel carrello");
    button = event.currentTarget;
    console.log("button");
    console.log(button);
    console.log("productid in addToCart");
    console.log(productid);
    //Mando l'id tramite fetch
    console.log("Eseguo la fetch");
    fetch("add_products.php?productid=" + productid);
    console.log("fetch eseguita");
}


const search_team = document.querySelector("#search_team");
search_team.addEventListener("submit", generateProducts);
