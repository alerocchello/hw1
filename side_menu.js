let menu = 'close';
const iconmenu = document.getElementById('iconmenu');
iconmenu.addEventListener('click', SideMenu);

// MENU LATERALE
function SideMenu() {
    const side_menu = document.querySelector('#side_menu');

	if (menu == 'close') {
		side_menu.style.width = '40%';
		menu = 'open';
		iconmenu.src = './images/menu_open.png';
	} else {
		side_menu.style.width = '0%';
		menu = 'close';
		iconmenu.src = './images/menu_close.png';
	}
}
