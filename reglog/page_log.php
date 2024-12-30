<?php include '../blocks/head.php' ?>
<body>
	<div class="container-fluid log-page">
        <div class="row justify-content-center align-items-center log-box">
        	<!-- align-self-center -->
            <div class="col-auto log">
            	<div class="container">
            		<div class="welcome"><h3>Welcome!</h3></div>
	                <form class="row-auto" name="ourForm">
	                	<input class="col margin5" type="text" name="login" placeholder="login">
					    <div class="w-100"></div>
	                	<input class="col margin5" type="password" name="pwd" placeholder="password">
					    <div class="w-100"></div>
	                	<button class="col margin5" type="submit" name="logreg">
	                		Log in!
	                	</button>
	                </form>
	                <h6 class="welcome"><a class="text-dark" href="../index.php">Go to main page<a></h6>
                </div>
            </div>
        </div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- for AJAX! -->
	<script type="text/javascript" src="../reglog/log.js"></script>
</body>