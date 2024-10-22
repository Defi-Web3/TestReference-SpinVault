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
<main class="main-section logged-in get-coins" role="container">
  <section class="get-coins-wrap py-5">
    <div class="container">
      <div class="d-flex align-items-center mb-2">
        <h3 class="fw-bold text-center text-white mb-2 w-100">Get Coins</h3>
      </div>
      <div class="row row-content-top">
        <div class="col-12 col-lg-6">
          <div class="item-left rounded d-flex align-items-center mb-3">
            <img src="get-coin.webp" alt="Get Coin">
            <p class="px-2 small text-white font-weight-medium m-0">
              It’s always free to play our Spinvault Coins games. No purchase necessary to play!
            </p>
          </div>
        </div>

        <div class="col-12 col-lg-6 d-none d-lg-block">
          <div class="item-right rounded d-flex align-items-center mb-3">
            <img src="minilogo.png" alt="Coin">
            <p class="px-2 small m-0">
              Spinvault Coins are always FREE and can be redeemed for real prizes!
            </p>
            <div class="d-flex justify-content-end flex-grow-1">
              <a class="btn btn-dark text-uppercase fw-bold" href="/staticPages/SweepRules.php">Read more</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Coin packages starts -->
      <div class="row getcoins">
      </div>
      <!-- Coin Packages end -->
    </div>
  </section>
</main>
<script src="/assets/js/GetCoinsPackages.js"></script>
<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>
