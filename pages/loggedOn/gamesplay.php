<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/checkSession.php");
?>
 <!-- Start Loggedon Header  -->
<div class="header-games-play">
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php"); ?>
</div>
<!-- End Loggedon Header  -->

<!-- Start Loggedon Mobile Menu  -->
<?php include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/mobileMenuLoggedon.php"); ?>
<!-- End Loggedon Mobile Menu  -->


<!-- main section -->
<main class="main-section logged-in games-play" role="container">
	<div class="container">
		<iframe id="gameIframe" src="" style="width: 100%; height: calc(100vh - 148.017px)">
		</iframe>
	</div>
</main>

<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>
<script src="/assets/js/RenderGamesByCategory.js"></script>
<script type="text/javascript">
	let GameUrl2 = localStorage.getItem("gameurl");
	if (GameUrl2) {
		document.getElementById('gameIframe').src = GameUrl2;
	} else {
		console.log("Game URL not found in localStorage");
	}
</script>