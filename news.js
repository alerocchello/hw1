function generateNews() {
    fetch("warehouse_news.php").then(onResponse).then(onJson);
}

function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function onJson(json) {
    console.log('Json ricevuto');
    console.log(json);
    const all_news = document.querySelector("#news") 
    all_news.innerHTML = "";

    for (news of json) {

        const divnews = document.createElement("div");
        divnews.classList.add("news");
        const divimg = document.createElement("div");
        divimg.classList.add("image");

        const image = document.createElement("img");
        image.src = news.url_copertina;
        const title = document.createElement("h3");
        title.textContent = news.titolo;
        const content = document.createElement("p");
        content.textContent = news.contenuto;
        content.classList.add("hidden");

        divimg.appendChild(image);

        divnews.appendChild(divimg);
        divnews.appendChild(title);
        divnews.appendChild(content);

        all_news.appendChild(divnews);


        divnews.addEventListener("click", seeContent);

    }
    
}

function seeContent(event) {

    console.log(event);
    const all_news = document.querySelector("#news") 
    all_news.innerHTML = "";

    let div =event.path[2];
    div.lastChild.classList.remove("hidden");

    all_news.appendChild(div);


}

generateNews();