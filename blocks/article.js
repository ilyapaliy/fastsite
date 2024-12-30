///////////////////////////_________////////////////////////////////
// console.log($('#new-article'));
// console.log($('#art_close'));
// console.log($('#art_save'));
// console.log($('.article'));
// console.log($('.icon_edit'));
// console.log($('.icon_delete'));
// console.log($('.art_name'));
///////////////////////////////__JS__///////////////////////////////
var lMenu = document.querySelector('.left-menu');
var artAl = document.querySelector('.alert');
var pTitle = document.querySelector('.popup_title');
var pText = document.querySelector('.popup_text');
var artClose = document.getElementById('art_close');
var artSave = document.getElementById('art_save');
var artNew = document.getElementById('new-article');
var tagID;

lMenu.onclick = function(event) {
	var target = event.target;
	var tagClass = target.getAttribute('class');

	if(tagClass == 'artn' || tagClass == 'icon arte' || tagClass == 'icon artd') {
		tagID = target.parentNode.parentNode.parentNode.getAttribute('id');
	}else if(tagClass == 'col p-0 m-0 art_name' || tagClass == 'col col-auto p-0 m-0 icon_edit' || tagClass == 'col col-auto p-0 m-0 icon_delete') {
		tagID = target.parentNode.parentNode.getAttribute('id');
	}else {
		tagID = null;
	}

	if(tagClass == 'artn' || tagClass == 'col p-0 m-0 art_name') {
		loadPopup(tagID, true);
	}else if(tagClass == 'icon arte') {
		loadPopup(tagID, false);
	}else if(tagClass == 'icon artd') {
		let xhrart = new XMLHttpRequest();
		xhrart.open('POST', '/blocks/del_article.php');
		xhrart.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhrart.onreadystatechange = function() {
			if(xhrart.readyState == 4 && xhrart.status == 200) {
				location.reload();
			}
		}
		xhrart.send('id=' + tagID);
	}
	// console.log(target.getAttribute('class'));
};

function loadPopup(id, isItViewMode) {
	let xhrart = new XMLHttpRequest();
	xhrart.open('GET', '/blocks/get_article.php?id=' + id);
	xhrart.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhrart.onload = function() {
		var response = JSON.parse(xhrart.response);
		pTitle.textContent = response[0];
		pText.textContent = response[1];
	}

	xhrart.send();

	if(isItViewMode) {
		pTitle.setAttribute('contenteditable', 'false');
		pText.setAttribute('contenteditable', 'false');
		art_save.style.visibility = 'hidden';
	}else {
		pTitle.setAttribute('contenteditable', 'true');
		pText.setAttribute('contenteditable', 'true');
		art_save.style.visibility = 'visible';
	}
	artAl.style.visibility = 'visible';
}

artClose.onclick = function(event) {
	artAl.style.visibility = 'hidden';
	art_save.style.visibility = 'hidden';
};

artSave.onclick = function(event) {
	if(tagID == null) {
		let xhrart = new XMLHttpRequest();
		xhrart.open('POST', '/blocks/new_article.php');
		xhrart.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhrart.onreadystatechange = function() {
			if(xhrart.readyState === 4 && xhrart.status === 200) {
				location.reload();
			}
		}

		xhrart.send('title=' + encodeURIComponent(pTitle.textContent) + '&text=' + encodeURIComponent(pText.textContent));
	}else {
		let xhrart = new XMLHttpRequest();
		xhrart.open('POST', '/blocks/save_article.php');
		xhrart.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhrart.onreadystatechange = function() {
			if(xhrart.readyState === 4 && xhrart.status === 200) {
				let arta = document.getElementById(tagID);
				let artaName = arta.querySelector('.artn');
				artaName.textContent = pTitle.textContent;
				artClose.onclick();
			}
		}

		xhrart.send('id=' + tagID + '&title=' + encodeURIComponent(pTitle.textContent) + '&text=' + encodeURIComponent(pText.textContent));
	}
};

artNew.onclick = function(event) {
	pTitle.setAttribute('contenteditable', 'true');
	pText.setAttribute('contenteditable', 'true');
	pTitle.textContent = '';
	pText.textContent = '';
	artAl.style.visibility = 'visible';
	art_save.style.visibility = 'visible';
};