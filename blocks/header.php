		<div class="header">
			<div class="container-fluid logo">
				<!-- <h3>This is our logo!</h3> -->
				<ul class="nav row">
					<li class="nav-item col"><h3>This is our logo!</h3></li>
					<li class="nav-item col-auto">
						<div class="row justify-content-end">
							<? //echo "<h3>You are {$_SESSION['user_login']} !</h3>"; ?>
							<? if(!$_SESSION['user_login']) { ?>
							<form class="col col-auto reglog" action="../reglog/page_reg.php" method="post">
								<input class="btn btn-secondary text-dark reglogbtn" type="submit" name="regin" value="Reg in">
							</form>
							<form class="col col-auto reglog" action="../reglog/page_log.php" method="post">
								<input class="btn btn-secondary text-dark reglogbtn" type="submit" name="login" value="Log in">
							</form><? }else { if($_SESSION['user_login'] == 'admin') { ?>
							<form class="col col-auto reglog" action="../reglog/page_del.php" method="post">
								<input class="btn btn-secondary text-dark reglogbtn" type="submit" name="delusr" value="Delete user">
							</form><? } //SMALL CHECK WITHOT SQL AND PWD?>
							<form class="col col-auto reglog" action="../reglog/logout.php" method="post">
								<input class="btn btn-secondary text-dark reglogbtn" type="submit" name="logout" value="Log out"><? } ?>
							</form>
						</div>
					</li>
				</ul>
			</div>
			<!-- <nav class="navbar navbar-default"> -->
			<div class="container-fluid">
<!-- 					<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
					</button>
				</div>
				<div class="collapse navbar-collapse" id="navbar-main"> -->
					<ul class="nav row up-menu">
						<li class="nav-item col-2 col-md-1"><h6><a class="text-dark" href="../pages/page_main.php">Main<a></h6></li>
						<li class="nav-item col-2 col-md-1"><h6><a class="text-dark" href="../pages/page_photo.php">Photo<a></h6></li>
					</ul>
				<!-- </div> -->
			</div>
			<!-- </nav> -->
		</div>