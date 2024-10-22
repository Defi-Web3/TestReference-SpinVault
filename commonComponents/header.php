<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SpinVault</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;700;900&display=swap"
            rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


        <!-- SweetAlert2 -->
        <link href="/assets/vendors/sweet-alert-2/css/sweetalert2.min.css" rel="stylesheet" media="screen">   
        
        <!-- Bootstrap -->
        <link href="/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/assets/css/style.css" rel="stylesheet" media="screen">
        
        <link rel="shortcut icon" href="/assets/img/favicon.png"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css">
        <!-- Images Path -->
        <base href="/assets/images/">
    </head>
<body>
<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
    <!-- Start Loggedon Header Section -->
    <header class="header-loggedon navbar bg-black" data-bs-theme="dark">
      <div class="container">
        <nav
          class="navbar d-flex justify-content-between align-items-center w-100"
        >
          <div class="d-flex">
            <a
              class="desktop-logo d-md-block d-none"
              href="../../"
              class="star-logo"
            >
              <img src="logo.png" class="img-fluid" alt="logo" />
            </a>
            <a class="mobile-logo d-md-none d-block" href="../../">
              <img src="minilogo.png" />
            </a>
          </div>

          <!-- Switcher  -->
          <div class="box-moneta" id="coin-box">
            <img
              src="g-coin.png"
              alt="Coin"
              class="icona-moneta"
              id="coin-icon"
            />
            <span class="valore-moneta" id="coin-value"></span>
            <div class="binario"></div>
          </div>
          <!-- Switcher  -->

          <div class="d-flex"><?php
            if (basename($_SERVER['PHP_SELF']) == 'profile.php') { ?>
              <div class="login-button ms-3 d-none d-md-block">
                <button class="btn btn-primary btn-gradient btn-login py-2 plr-18px fw-bold">
                  <a href="/index.php" class="btn-gradient-link activity-tag">Exit</a>
                </button>
              </div> <?php } else { ?>
                <div class="login-button mx-3 d-none d-md-block">
                  <button
                    class="btn btn-primary btn-gradient btn-login py-2 plr-18px fw-bold" id="getcoin"
                  >
                    <a href="/pages/loggedOn/getcoins.php" class="btn-gradient-link">Get coins</a>
                  </button>
                </div>
                <!-- <a class="notification-icon mx-2" id="notified" href="#">
                  <img
                    class="custom-img-size object-fit-contain"
                    src="notification.webp"
                  />
                </a> -->

            <button
              class="navbar-toggler p-0 shadow-none border-0"
              type="button"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasDarkNavbar"
              aria-controls="offcanvasDarkNavbar"
              aria-label="Toggle navigation"
            >
              <img src="burger.webp" class="hamburger" alt="logo" />
            </button>
            <?php } ?>
          </div>
        </nav>

        <!-- Start Sidebar -->
          <?php include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/slideLoggedonMenu.php");?>
        <!-- End Sidebar -->

        <!-- Start Submenus -->
        <?php include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/iconSubmenuLoggedon.php");?>
        <!-- End Submenus -->
        
      </div>
    </header>
    <!-- End Loggedon Header Section -->
<?php }else{ ?>

    <!-- Start loggedout header-section -->
    <header class="header navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container header-main">
            <a href="../../" class="star-logo">
                <img src="logo.png" class="img-fluid" alt="logo">
            </a>
            <div class="offcanvas offcanvas-end gap-3 text-bg-dark" data-bs-theme="dark" tabindex="-1"
                id="offcanvasDarkNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a href="#" class="star-logo">
                        <img src="logo.png" class="img-fluid" alt="logo">
                    </a>
                    <div class="offcanvas-header login-button d-flex justify-content-end ms-auto">
                        <button class="btn btn-primary btn-gradient btn-login py-2 plr-18px fw-bold">
                            <a href="/pages/login.php">Login</a>
                        </button>
                    </div>
                    <button type="button" class="btn-close ms-0 me-1" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <ul class="nav col-12 col-lg-auto ms-lg-auto mb-2 justify-content-around mb-md-0 navbar-nav text-center row-gap-3">
                    <li><a href="/pages/allgames.php" class="nav-link px-3 fw-bold">GAMES</a></li>
                    <li><a href="/pages/promopage.php" class="nav-link px-3 fw-bold">PROMOTION</a></li>
                    <li><a href="/pages/contacts.php" class="nav-link px-3 fw-bold">CONTACT</a></li>
                    <li><a href="/staticPages/about.php" class="nav-link px-3 fw-bold">ABOUT</a></li>
                </ul>
                <div class="offcanvas-header create-button text-center">
                    <button class="btn btn-primary btn-gradient btn-login py-3 px-3 plr-18px fs-4 fw-bold w-100">
                        <a href="/pages/register.php">Create Account</a>
                    </button>
                </div>
            </div>
            <div class="login-button desktop-login ms-3">
                <button class="btn btn-primary btn-gradient btn-login py-2 plr-18px fw-bold" id="login">
                    <a href="/pages/login.php">Login</a>
                </button>
            </div>


            <button class="navbar-toggler ms-1" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </header>
    <!-- End loggedout header-section -->
<?php } ?>


<?php 
  // Start Loggedon Mobile Menu 
  include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/mobileMenuLoggedon.php");
  // End Loggedon Mobile Menu
?> 