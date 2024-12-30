var servResponse = document.querySelector('#response');

document.forms.ourForm.onsubmit = function(e) {
	e.preventDefault();

	var userLogin = document.forms.ourForm.login.value;
	var userPwd = document.forms.ourForm.pwd.value;
	userLogin = encodeURIComponent(userLogin);
	userPwd = encodeURIComponent(userPwd);

	var xhr = new XMLHttpRequest();

	// xhr.open('GET', 'reg.php?' + 'login=' + userInput);
	xhr.open('POST', 'reg.php?');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			// servResponse.textContent = xhr.responseText;
			switch(xhr.responseText) {
				case '1':
					alert("One user with that login already exist! Can not be second user with the same login!");
					break;
				case '2':
					alert("You are registered now!");
					break;
				case '3':
					alert("Neither login nor password can be blank!");
					break;
				default:
					alert("server returned WTF respose");
			}
		}
	}

	xhr.send('login=' + userLogin + '&pwd=' + userPwd);
};