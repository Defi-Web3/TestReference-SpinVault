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
<main class="main-section logged-in coins-shop" role="container">
<section class="coins-shop-wrap text-white">
  <div class="container py-5">
    <div class="row d-flex flex-wrap justify-content-between">
      <div class="col-md-4 col-12 item-left getcoins-detail">
      </div>

      <div class="col-md-7 col-12 item-right mt-4 mt-md-0">
        <h2 class="fw-bold text-white">Coins Shop</h2>
        <p class="m-0">Select payment options:</p>
        <div class="d-flex flex-wrap justify-content-between align-items-center">
          <a href="#"><img src="visa.svg"></a>
          <a href="#"><img src="mastercard.svg"></a>
          <a href="#"><img src="discover.svg"></a>
          <a href="#"><img src="cryptocurrency.svg"></a>
        </div>
        <p>Selected method: <span class="fw-bold">Visa</span></p>
        <p>By proceeding with your purchase you agree to our 
          <a href="/staticPages/TermsAndCondition.php" class="fw-bold">Terms and Conditions</a> 
          and 
          <a href="/staticPages/PrivacyPolicy.php" class="fw-bold">Privacy Policy</a>.
        </p>
        <div class="text-white text-center w-100">
          <button class="btn btn-gradient text-white text-uppercase fw-bold py-3 px-5 mt-4 mb-3">
            PLACE ORDER
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
</main>
<script src="/assets/js/GetPackageDetails.js"></script>
<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>
