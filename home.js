function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

// NEWS
function generateNews() {
    fetch("warehouse_news.php").then(onResponse).then(onNewsJson);
}

function onNewsJson(json) {
    console.log('Json ricevuto');
    console.log(json);
    const all_news = document.querySelector("#news") 
    all_news.innerHTML = "";

    for (let i=0; i<3; i++) {

        const divnews = document.createElement("div");
        divnews.classList.add("news");
        const divimg = document.createElement("div");
        divimg.classList.add("image");

        const image = document.createElement("img");
        image.src = json[i].url_copertina;
        const title = document.createElement("h3");
        title.textContent = json[i].titolo;
        const content = document.createElement("p");
        content.textContent = json[i].contenuto;
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
    const all_events = document.querySelector("#events") 
    all_events.innerHTML = "";
    const spotify = document.querySelector("#spotify") 
    spotify.innerHTML = "";
    const buttons2 = document.querySelector("#buttons2");
    buttons2.innerHTML = "";
    const second = document.querySelector("#second");
    second.innerHTML = "";
    const logo_spotify = document.querySelector("#logo_spotify");
    logo_spotify.classList.add("hidden");

    let div =event.path[2];
    div.lastChild.classList.remove("hidden");

    all_news.appendChild(div);

}

// MATCHES
function generateMatches() {
    fetch("warehouse_matches.php").then(onResponse).then(onMatchesJson);
}

function onMatchesJson(json) {
    const matches = document.querySelector("#events");
    matches.innerHTML = "";
    console.log("matches: ");
    console.log(json);

    for (let i=0; i<3; i++) {

        const divmatch = document.createElement("div");
        divmatch.classList.add("event");

        const image = document.createElement("img");
        image.src = json[i].url_copertina;
        const title = document.createElement("h3");
        title.textContent = json[i].titolo;
        title.classList.add("title_event");
        const details = document.createElement("p");
        details.textContent = json[i].dettagli;
        details.classList.add("subtitle_event");

        divmatch.appendChild(image);
        divmatch.appendChild(title);
        divmatch.appendChild(details);

        matches.appendChild(divmatch);
    }
}

// SPOTIFY CON JS
//OAuth 2.0: due richieste fetch
//1° per ottenere il token
//2° per fare la richiesta effettiva

const client_id = '2d5bf0ebc21f44158b516fea48814fff';
const client_secret = '96560a6294e742899b4448d25d7e6ef8';
let token;

//RICHIESTA TOKEN
//All'apertura della pagina richiedo il token
fetch("https://accounts.spotify.com/api/token",
    {
        method: "post",
        body: 'grant_type=client_credentials',
        headers:
        {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': 'Basic ' + btoa(client_id + ':' + client_secret)
        }
    }).then(onResponse).then(onTokenJson);

function onTokenJson(json)
{
    token = json.access_token;
}

//RICHIESTA CANZONE
function searchAlbum(event){
// Impedisci il submit del form
event.preventDefault();
// Leggi valore del campo di testo

const album_input = document.querySelector('#album');
const album_value = encodeURIComponent(album_input.value);
console.log('Eseguo ricerca: ' + album_value);
// Esegui la richiesta
fetch("https://api.spotify.com/v1/search?type=album&q=" + album_value,
  {
    headers:
    {
      'Authorization': 'Bearer ' + token
    }
  }).then(onResponse).then(onAlbumJson);
}

function onAlbumJson(json)
{
    console.log('Json ricevuto');
    console.log(json);
    //Svuoto la libreria
    const library = document.querySelector('#album-view');
    library.innerHTML='';
    //Leggo il numero di risultati di Spotify
    const results = json.albums.items;
    let n_results = results.length;
    //Limito il numero di risultati a 5
    if(n_results > 5)
        n_results = 5;

    for(let i=0; i<n_results; i++)
    {
        const album_data = results[i];
        const title = album_data.name;
        const img = album_data.images[0].url;

        const album = document.createElement('div');
        album.classList.add('album');
        const copertina = document.createElement('img');
        copertina.src = img;
        const caption = document.createElement('span');
        caption.textContent = title;

        album.appendChild(copertina);
        album.appendChild(caption);

        library.appendChild(album);        
    }

}

const search_album = document.querySelector("#spotify");
search_album.addEventListener("submit", searchAlbum);

generateNews();

generateMatches();