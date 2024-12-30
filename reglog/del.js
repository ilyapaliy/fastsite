var servResponse = document.querySelector('#response');

document.forms.ourForm.onsubmit = function(e) {
	e.preventDefault();

	var userLogin = document.forms.ourForm.login.value;
	userLogin = encodeURIComponent(userLogin);

	var xhr = new XMLHttpRequest();

	// xhr.open('GET', 'reg.php?' + 'login=' + userInput);
	xhr.open('POST', 'del.php?');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			// servResponse.textContent = xhr.responseText;
			switch(xhr.responseText) {
				case '1':
					alert("User with that login does not exist!");
					break;
				case '2':
					alert("You succesfully delete user!");
					break;
				case '3':
					alert("Login can not be blank!");
					break;
				case '4':
					alert("You must be admin to delete user!");
					break;
				default:
					alert("server returned WTF respose");
			}
		}
	}

	xhr.send('login=' + userLogin);
};