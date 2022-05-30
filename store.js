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

function onJson(json) {
    console.log("json: ");
    console.log(json);

    const store = document.querySelector("#divstore") 
    store.innerHTML = "";

    for (product of json) { //Uso il for qualora nel DB ci fossero più prodotti della stessa squadra

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
        add_cart.classList.add("add_cart");
        add_cart.addEventListener("click", addCart);


        divproduct.appendChild(image);
        divproduct.appendChild(team);
        divproduct.appendChild(price);
        divproduct.appendChild(add_cart);

        divstore.appendChild(divproduct);
    }
}

function addCart(event) {
    button = event.currentTarget;
    const formData = new FormData();
    //Prendo l'id del prodotto
    formData.append('productid', button.parentNode.dataset.id);
    //Mando l'id tramite fetch
    fetch("add_products.php", {method: 'post', body: formData});
}


const search_team = document.querySelector("#search_team");
search_team.addEventListener("submit", generateProducts);
















const iconcart = document.querySelector("#iconcart");
iconcart.addEventListener("click", generateCart);

function generateCart(){
    fetch("return_cart.php").then(onResponse).then(onCart);
}


function onCart(json){
	const cart = document.querySelector('#divstore');
	cart.innerHTML = '';
	
	if(json.flag){
		for(element of json.content){
			const cover_url = element.url;
			const block = document.createElement('div');
			block.classList.add('block');
			const img = document.createElement('img');
			img.src = cover_url;
			console.log(cover_url);
			
			block.appendChild(img);
				
			cart.appendChild(block);
		}
	}
}
