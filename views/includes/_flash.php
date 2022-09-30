<?php if(isset($_SESSION['notification']['message'])): ?>
	<div class="container mt-3 col-md-6">
		<div class="alert alert-<?= $_SESSION['notification']['type'] ?> alert-dismissible" role="alert">
 			 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="text-center"><?= $_SESSION['notification']['message'] ?></h4>
		</div>
	</div>
<?php $_SESSION['notification'] = []; ?>
<?php endif; ?>