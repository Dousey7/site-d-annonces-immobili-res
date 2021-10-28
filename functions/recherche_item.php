<?php
	session_start();
	require_once('../configs/database.php');

	if (isset($_GET['item'])) {
		$product = (String) trim($_GET['product']);
		$req = $db->prepare('SELECT titre FROM annonce WHERE titre LIKE ? LIMIT 10');
		$req = $req->fetchALL();

		foreach ($req as $r) {
			?>
				<div style="margin-top: 20px 0; border-bottom: 2px solid #ccc;">
					<?= $r['titre'] ?>
				</div>
			<?php
		}
	}
?>