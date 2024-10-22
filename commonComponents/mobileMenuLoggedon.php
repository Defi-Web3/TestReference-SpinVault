<!-- Start Loggedon Mobile Menu -->
<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
  <div class="mobile-menu">
      <div class="container-mobile-menu">
        <img src="../../assets/images/home.svg" alt="logo" />
        <span><a href="/pages/main.php">Home</a></span>
      </div>
      <div class="container-mobile-menu me-5">
        <img src="../../assets/images/Slots.png" alt="logo" />
        <span><a href="/pages/loggedOn/favorites.php">Favorites</a></span>
      </div>
      <div class="container-mobile-menu btn-buy-mobile">
        <span><a href="./shopcoins.php">BUY</a></span>
      </div>
      <div class="container-mobile-menu">
        <img src="../../assets/images/search.png" alt="logo" />
        <span><a href="#">Search</a></span>
      </div>
      <button
        class="navbar-toggler p-0 shadow-none border-0"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasDarkNavbar"
        aria-controls="offcanvasDarkNavbar"
        aria-label="Toggle navigation"
      >
        <div class="container-mobile-menu">
          <img src="../../assets/images/burger.webp" class="hamburger" alt="logo" />
          <span>More</span>
        </div>
      </button>
    </div>
<?php } ?>
<!-- End Loggedon Mobile Menu -->