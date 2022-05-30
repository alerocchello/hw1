generateCart();

 function generateCart(){
     fetch("return_cart.php").then(onResponse).then(onJson);
}

function onResponse(response) {
    return response.json();
}

function onJson(json){
    console.log("json: ");
    console.log(json);

    const cart = document.querySelector("#products-view");
    cart.innerHTML = "";

    for (const product of json) {

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
		const rem_cart = document.createElement("img");
        rem_cart.src = "./images/rimuovi_dal_carrello.png";
        rem_cart.classList.add("button_cart");
		rem_cart.addEventListener("click", removeByCart);
		const productid = document.createElement("span");
		productid.textContent = product.id;

        divproduct.appendChild(image);
        divproduct.appendChild(team);
        divproduct.appendChild(price);
		divproduct.appendChild(rem_cart);
		divproduct.appendChild(productid);

        cart.appendChild(divproduct);
	}
}

function removeByCart(event) {
    alert("Maglietta rimossa dal carrello");
    button = event.currentTarget;
    console.log("button.parentNode.parentNode.dataset.id");
    console.log(button.parentNode.parentNode.dataset.id);
    //Mando l'id tramite fetch
    console.log("Eseguo la fetch");
    fetch("remove_products.php?productid=" + productid.value);
    console.log("fetch eseguita");
	generateCart();
}