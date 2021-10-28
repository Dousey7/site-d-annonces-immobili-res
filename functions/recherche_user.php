<?php
	session_start();
	require_once('../configs/database.php');


	if (isset($_GET['user'])) {
		$user = (String) trim($_GET['user']);
		$req = $db->prepare('SELECT nom FROM utilisateur WHERE nom LIKE ? LIMIT 10');
		$req = $req->fetchALL();

		foreach ($req as $r) {
			?>
				<div style="margin-top: 20px 0; border-bottom: 2px solid #ccc;">
					<?= $r['nom'] ?>
				</div>
			<?php
		}
	}
?>