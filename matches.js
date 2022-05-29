function generateMatches() {
    fetch("warehouse_matches.php").then(onResponse).then(onJson);
}

function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function onJson(json) {
    const matches = document.querySelector("#matches") 
    matches.innerHTML = "";

    for (match of json) {

        const divmatch = document.createElement("div");
        divmatch.classList.add("event");

        const image = document.createElement("img");
        image.src = match.url_copertina;
        const title = document.createElement("h3");
        title.textContent = match.titolo;
        title.classList.add("title_event");
        const details = document.createElement("p");
        details.textContent = match.dettagli;
        details.classList.add("subtitle_event");

        divmatch.appendChild(image);
        divmatch.appendChild(title);
        divmatch.appendChild(details);

        matches.appendChild(divmatch);
    }
}

generateMatches();