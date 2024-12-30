<?php include '../blocks/head.php' ?>
<body>
	<?php include '../blocks/content.php' ?>
	<?php include '../blocks/file_content.php' ?>
	<?php /* include '../blocks/photo_content.php' */?>
	<div class="container-fluid dad-container">
		<?php include '../blocks/header.php' ?>
		<div class="real-body container-fluid">
			<div class="row">
				<?php include '../blocks/left_menu.php' ?>
				<div class="col">
					<div class="tiles">
	                    <?php
						require_once '../db.php';

						$sql_photo = $pdo->query('SELECT ID, name, type FROM photo');

						while($row = $sql_photo->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="tile elemtik" id="' . $row['ID'] . '" style="background: #888 url(../photo/'. $row['type'] . '); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                <div class="tile-btn-row row p-0 m-0">
                                    <div class="icon_edit icon_tile col col-auto p-0"><img class="tile_little_icon photo_e" src="../blocks/icon_edit.png" alt="edit"></div>
                                    <div class="icon_delete icon_tile col col-auto p-0"><img class="tile_little_icon photo_d" src="../blocks/icon_delete.png" alt="delete"></div>
                                    <span class="img-name">' . $row['name'] . '</span>
                                </div>
                            </div>';
						} ?>
						<div class="tile plus">
							<span>+</span>
							</div>
						</div>
						<script type="text/javascript" src="../blocks/photo.js"></script>
					</div>
				</div>
			</div>
		</div>
	<?php include '../blocks/footer.php' ?>
</body>