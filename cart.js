fetch("get_favorites.php").then(onResponseFavorite).then(onFavorite);

function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}


function onFavorite(json){
	const library = document.querySelector('#library-view');
	library.innerHTML = '';
	
	if(json.success == true){
		for(const element of json.content){
			const cover_url = element.url;
			const block = document.createElement('div');
			block.classList.add('block');
			const img = document.createElement('img');
			img.src = cover_url;
			console.log(cover_url);
			
			block.appendChild(img);
				
			library.appendChild(block);
		}
	}
}