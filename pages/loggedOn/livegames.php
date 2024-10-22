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
<main class="main-section logged-in livegames" role="container">
  <div class="slot-top-banner d-md-block d-none">
    <div
      class="position-relative slot-banner"
      style="background-image: url('../../assets/images/slot-banner.png')"
    >
      <div class="d-flex justify-content-center position-relative">
        <div
          class="container position-absolute mt-3 px-5 text-white d-flex flex-column flex-md-row justify-content-between"
        >
          <div class="left-section">
            <p class="fw-bold bold-text">Enjoy the live experience</p>
            <p class="fw-medium text-left w-md-100 w-lg-75 mt-3 small-text">
              Plenty of titles to suits <br />The most demanding gaming
              styles
            </p>
          </div>
          <div class="right-section">
            <img src="../../assets/images/live.png" alt="gold image" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container game-list">
    <!-- Game setion -->
    <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 mt-4 game-image" id="games-data-container-live">
    </div>
    <!-- Game section ends-->
    <div class="d-flex justify-content-center">
      <button id="load-more-btn" class="btn-gradient btn-gradient-link account-btn fw-bold text-uppercase py-3 px-5 d-flex rounded mt-5">Load More</button>
      <!-- <a
        class="btn-gradient btn-gradient-link account-btn fw-bold text-uppercase py-3 px-5 d-flex rounded mt-5"
        role="button"
        href=""
        >Load More</a
      > -->
    </div>
  </div>
</main>

<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>
<script>
  let categoryName = 'Live';
</script>
<script src="/assets/js/RenderGamesByCategory.js"></script>