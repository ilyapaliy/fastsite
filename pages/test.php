<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<form enctype="multipart/form-data" name='pForm'>
<!--action="saving.php" method="POST" enctype="multipart/form-data"-->
<input type="submit" id="btn" value="GO"/>
<input type="text" name='title' value='name of file'>
<input type="file" id="file" name="file" accept="image/*" required/>
<script type="text/javascript">
	
	var form = document.forms.namedItem("pForm");
	
	form.onsubmit = function(event) {
		var data = new FormData(form);
		data.append('func', 'new');
		let xhrart = new XMLHttpRequest();
		xhrart.open('POST', 'saving.php');

		xhrart.onreadystatechange = function() {
			if(xhrart.readyState === 4 && xhrart.status === 200) {
//				location.reload();
//				alert(data);
				alert(xhrart.response);
			}
		}
		xhrart.send(data);
		event.preventDefault();
	};
	
</script>