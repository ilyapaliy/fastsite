var tiles = document.querySelector('.tiles');
var alertFile = document.querySelector('.alert-file');
var pNameFile = document.querySelector('.popup_name_file');
var pImg = document.querySelector('.popup_img_file');
var imgClose = document.getElementById('art_close_file');
var imgSave = document.getElementById('art_save_file');
var imgFile = document.getElementById('file');
var imgNew = document.querySelector('.plus');
var form = document.forms.namedItem("pForm");
var tagID;

tiles.onclick = function(event) {
	var target = event.target;
	var tagClass = target.getAttribute('class');

	if(target.tagName == 'IMG') {
		tagID = target.parentNode.parentNode.parentNode.getAttribute('id');
	}else if(tagClass == 'img-name' || tagClass == 'icon_edit icon_tile col col-auto p-0' || tagClass == 'icon_delete icon_tile col col-auto p-0') {
		tagID = target.parentNode.parentNode.getAttribute('id');
	}else if(tagClass == 'tile-btn-row row p-0 m-0') {
		tagID = target.parentNode.getAttribute('id');
	}else  if(tagClass == 'tile elemtik') {
		tagID = target.getAttribute('id');
	}else {
		tagID = null;
	}

	if(tagClass == 'img-name' || tagClass == 'tile elemtik' || tagClass == 'tile-btn-row row p-0 m-0') {
		loadPopupFile(tagID, true);
	}else if(tagClass == 'icon_edit icon_tile col col-auto p-0' || tagClass == 'tile_little_icon photo_e') {
		loadPopupFile(tagID, false);
	}else if(tagClass == 'icon_delete icon_tile col col-auto p-0' || tagClass == 'tile_little_icon photo_d') {
		let xhrart = new XMLHttpRequest();
		xhrart.open('POST', '/blocks/photo.php');
		xhrart.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhrart.onreadystatechange = function() {
			if(xhrart.readyState == 4 && xhrart.status == 200) {
				location.reload();
			}
		}
		xhrart.send('id=' + tagID + '&func=del');
	}
//	 console.log(tagID);
};

function loadPopupFile(id, isItViewMode) {
	pImg.textContent = '';
	let xhrart = new XMLHttpRequest();
	xhrart.open('GET', '/blocks/photo.php?id=' + id + '&func=get');
	xhrart.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhrart.onload = function() {
		var response = JSON.parse(xhrart.response);
		pNameFile.value = response[0];
		pImg.style.backgroundImage = 'url(../photo/' + response[1] + ')';
	}

	xhrart.send();

	if(isItViewMode) {
		pNameFile.setAttribute('disabled', '');
		pImg.style.cursor = 'default';
		imgSave.style.visibility = 'hidden';
		imgFile.setAttribute('disabled', '');
	}else {
		pNameFile.removeAttribute('disabled');
		pImg.style.cursor = 'pointer';
		imgSave.style.visibility = 'visible';
		imgFile.removeAttribute('disabled');
	}
	alertFile.style.visibility = 'visible';
}

imgClose.onclick = function(event) {
	alertFile.style.visibility = 'hidden';
	imgSave.style.visibility = 'hidden';
	pImg.style.backgroundImage = '';
};

form.onsubmit = function(event) {
	var data = new FormData(form);
	if(tagID == null) {
		data.append('func', 'new');
		let xhrart = new XMLHttpRequest();
		xhrart.open('POST', '/blocks/photo.php');

		xhrart.onreadystatechange = function() {
			if(xhrart.readyState === 4 && xhrart.status === 200) {
				location.reload();
			}
		}

		xhrart.send(data);
		event.preventDefault();
	}else {
		data.append('func', 'save');
		data.append('id', tagID);
		let xhrart = new XMLHttpRequest();
		xhrart.open('POST', '/blocks/photo.php');

		xhrart.onreadystatechange = function() {
			if(xhrart.readyState === 4 && xhrart.status === 200) {
				let arta = document.getElementById(tagID);
				let artaName = arta.querySelector('.img-name');
				location.reload();
			}
		}

		xhrart.send(data);
		event.preventDefault();
	}
};

imgFile.onchange = function() {
//	let chosenFileName = this.value.replace(/.*\\/, "");
	file = this.files[0];
//	console.log(file.name);
//	console.log(file);
	if (file.type.match(/image.*/)) {
		var reader = new FileReader(), img;
		reader.readAsDataURL(file);
		
		reader.onload = function() {
			pImg.style.backgroundImage = 'url(' + reader.result + ')';
			pImg.textContent = '';
		};
		
		reader.onerror = function() {
			console.log(reader.error);
		};
	}
//	pImg.textContent = chosenFileName;
}

imgNew.onclick = function(event) {
	pNameFile.removeAttribute('disabled');
	pNameFile.value = '';
	pImg.textContent = 'Click to select an image!';
	pImg.style.backgroundImage = '';
	pImg.style.cursor = 'pointer';
	imgFile.removeAttribute('disabled');
	alertFile.style.visibility = 'visible';
	imgSave.style.visibility = 'visible';
};