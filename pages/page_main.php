<?php include '../blocks/head.php' ?>
<body>
	<?php include '../blocks/content.php' ?>
	<div class="container-fluid dad-container">
		<?php include '../blocks/header.php' ?>
		<div class="real-body container-fluid">
			<div class="row">
				<?php include '../blocks/left_menu.php' ?>
				<div class="col-sm-9 main">
					<?
					if(isset($_SESSION['user_login'])) {
						echo "<h3>You are {$_SESSION['user_login']} !</h3>";
					}else {
						echo ("
If in so bred at dare rose lose good. Ecstatic elegance gay but disposed. Now summer who day looked our behind moment coming. In expression an solicitude principles in do. Decisively advantages nor expression unpleasing she led met. Up hung mr we give rest half. An stairs as be lovers uneasy. Strictly numerous outlived kindness

Dissimilar admiration so terminated no in contrasted it. Strictly numerous outlived kindness whatever on we no on addition. Happiness remainder joy but earnestly for off. Words to up style of since world. Feel and make two real miss use easy. Happiness remainder joy but earnestly for off. Do play they miss give so up. Happiness rema

We me rent been part what. Advantages entreaties mr he apartments do. At principle perfectly by sweetness do. Draw fond rank form nor the day eat. Pain son rose more park way that. Mrs assured add private married removed believe did she. Whatever throwing we on resolved entrance together graceful. Do play they miss give so up. Course sir pe
							");
					}
					?>

				</div>
			</div>
		</div>
	</div>
	<?php include '../blocks/footer.php' ?>
</body>