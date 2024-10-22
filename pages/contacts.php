<?php include($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php") ?>

<main class="main-section contacts">
	<div class="container">
		<form class="d-flex bg-blue flex-column align-items-center py-5">
			<h1 class="fw-bold text-white mb-5 lh-base text-center text-md-start">Submit your request</h1>

			<!-- Email Field -->
			<div class="mb-3 col-12 col-md-6 col-lg-4">
				<label for="form-field-email" class="form-label text-main-blue fw-bold">Email</label>
				<input id="form-field-email" placeholder="Email" required aria-required="true" class="form-control text-main-blue py-3 px-4 border-2 fst-italic" name="email">
				<span class="text-warning small"></span>
			</div>

			<!-- Description Field -->
			<div class="mb-3 col-12 col-md-6 col-lg-4">
				<label for="form-field-message" class="form-label text-main-blue fw-bold">Description</label>
				<textarea id="form-field-message" name="message" rows="4" placeholder="Content" class="form-control text-main-blue btn-outline-light px-4 border-2 fst-italic"></textarea>
				<span></span>
			</div>

			<!-- Submit Button -->
			<button type="submit" class="btn btn-gradient text-white custom-button text-uppercase fw-bold py-3 px-5 mt-4 mb-3"><p class="px-4 m-0">Submit</p></button>
		</form>
	</div>
</main>


<?php include($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>
