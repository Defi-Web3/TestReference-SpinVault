<?php 
session_start();

include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php");
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?> 
<!-- main section -->                                                                                   
	<main class="main-section profile" role="container">
		<div class="container">
			<div class="row row-cols-2 row-cols-md-4 row-cols-lg-4 mt-4 game-image justify-content-center">
				<div class="col mb-4 position-relative a-games text-center">
					<button class="btn btn-primary btn-gradient btn-login py-2 plr-18px fw-bold">
						<a href="#" class="btn-gradient-link">VERIFICATION</a>
					</button>
				</div>
				<div class="col mb-4 position-relative a-games text-center">
					<button class="btn btn-primary btn-gradient btn-login py-2 plr-18px fw-bold">
						<a href="#" class="btn-gradient-link">HYSTORY</a>
					</button>
				</div>
				<div class="col mb-4 position-relative a-games text-center">
					<button class="btn btn-primary btn-gradient btn-login py-2 plr-18px fw-bold">
						<a href="#" class="btn-gradient-link">REDEMEEABLE</a>
					</button>
				</div>
				<div class="col mb-4 position-relative a-games text-center">
					<button class="btn btn-primary btn-gradient btn-login py-2 plr-18px fw-bold">
						<a href="#" class="btn-gradient-link">ACCOUNT</a>
					</button>
				</div>
		</div>
	</main>
<?php } ?>
<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>
