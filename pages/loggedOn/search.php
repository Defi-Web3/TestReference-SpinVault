<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/checkSession.php");
// Start Loggedon Header 
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php");
// End Loggedon Header 

// Start Loggedon Mobile Menu 
include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/mobileMenuLoggedon.php"); 
// End Loggedon Mobile Menu
?>

<!-- main section -->
<main class="main-section logged-in search" role="container">
	<div class="container py-5">
		<div class="items d-flex justify-content-between mx-auto mb-4">
			<!-- Providers Select List -->
			<div class="providers-select-list item w-100 me-2">
				<select class="providers" aria-label="Providers">
					<option data-v-58a44b05="" selected="" value="">Choose Providers</option>
				</select>
			</div>

			<!-- Search Box -->
			<div class="search-box item d-flex align-items-center px-2 py-1 w-100 ms-2">
				<img src="filter.png" alt="filter">
				<div class="input-group">
					<input type="text" id="search" class="form-control" placeholder="Looking for something?">
				</div>
				<img src="/assets/icon/Find.png" alt="search">
			</div>
		</div>

		<!-- Search Result -->
		<div class="search-result row row-cols-3 row-cols-md-4 row-cols-lg-6 mt-4 game-image logged-in" id="games-data-search-container">

		</div>

		<div class="d-flex justify-content-center w-100">
			<button id="load-more-btn" class="btn-gradient btn-gradient-link account-btn fw-bold text-uppercase py-3 px-5 rounded mt-5">Load More</button>
		</div>
	</div>
</main>

<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>
