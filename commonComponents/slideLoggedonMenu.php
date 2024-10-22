<!-- SIDEBAR -->
        <div
          class="offcanvas offcanvas-end gap-3 text-bg-dark w-sm-100 border-0 px-2"
          data-bs-theme="dark"
          tabindex="-1"
          id="offcanvasDarkNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header d-flex justify-content-between">
            <div class="offcanvas-header login-button d-flex w-100 p-0">
              <!-- Switcher Offcanvas -->
              <img
                width="70%"
                src="Logo.png"
                class="img-fluid"
                alt="logo"
              />
            </div>

            <img
              src="close.png"
              class="close ms-0 cursor-pointer"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
              style="cursor: pointer"
            />
          </div>

          <div class="offcanvas-body pt-0">
            <div class="d-flex justify-content-between w-full">
              <h5>VIP : Bronze</h5>
              <h5>43 VIP Points</h5>
            </div>
            <div class="d-flex justify-content-between w-full">
              <h5>Gold Coins:</h5>
              <h5 id="coin-value-gc" style="color: #d79e16">GC 23</h5>
            </div>
            <div class="d-flex justify-content-between w-full">
              <h5>Sweep Coins:</h5>
              <h5 id="coin-value-sc" style="color: #07c15b">SC 73.00</h5>
            </div>
            <div class="d-flex justify-content-center my-4 w-full btn-sidebar">
              <a
                class="btn-gradient text-uppercase fw-bold text-white rounded btn-plain" id="redeem"
                href="/pages/loggedOn/redeemprize.php"
                ><span
                  ><img
                    class="minilogo-sidebar"
                    src="minilogo.png"
                    alt="" /></span
                >REDEEM PRIZE</a
              >
            </div>

            <ul class="link-items navbar-nav d-inline-block pe-3 mt-3">
              <li class="nav-item">
                <a href="/pages/loggedOn/promotions.php" class="menu-item link d-inline-block text-white text-decoration-none rounded mb-2 p-2">
                  <span class="icon-img">
                    <img
                     
                      src="/assets/icon/Prmotions.svg"
                    />
                  </span>
                  <span class="fw-bold fs-sm text-uppercase ms-1"
                    >Promotions</span
                  >
                </a>
              </li>
              <li class="nav-item">
                <a href="/pages/loggedOn/invite.php" class="menu-item link d-inline-block text-white text-decoration-none rounded mb-2 p-2">
                  <span class="icon-img">
                    <img src="/assets/icon/Invite.svg" />
                  </span>
                  <span class="fw-bold fs-sm text-uppercase ms-1"
                    >Invite Friends</span
                  >
                </a>
              </li>
              <li class="nav-item">
                <a href="/pages/userPages/myaccount.php" class="menu-item link d-inline-block text-white text-decoration-none rounded mb-2 p-2">
                  <span class="icon-img">
                    <img
                     
                      src="/assets/icon/UserAccount.svg"
                    />
                  </span>
                  <span class="fw-bold fs-sm text-uppercase ms-1"
                    >My Account</span
                  >
                </a>
              </li>
              <li class="nav-item">
                <a href="/pages/loggedOn/transactionhistory.php" class="menu-item link d-inline-block text-white text-decoration-none rounded mb-2 p-2">
                  <span class="icon-img">
                    <img src="/assets/icon/History.svg" />
                  </span>
                  <span class="fw-bold fs-sm text-uppercase ms-1"
                    >Transaction History</span
                  >
                </a>
              </li>
              <li class="nav-item">
                <a href="/pages/loggedOn/verification.php" class="menu-item link d-inline-block text-white text-decoration-none rounded mb-2 p-2">
                  <span class="icon-img">
                    <img src="/assets/icon/verifiction_menu_icon.svg" />
                  </span>
                  <span class="fw-bold fs-sm text-uppercase ms-1"
                  >Verification</span
                  >
                </a>
              </li>
              <li class="nav-item">
                <a href="/pages/loggedOn/support.php" class="menu-item link d-inline-block text-white text-decoration-none rounded mb-2 p-2">
                  <span class="icon-img">
                    <img src="/assets/icon/faq.svg" />
                  </span>
                  <span class="fw-bold fs-sm text-uppercase ms-1" id="faq">Support</span>
                </a>
              </li>
              <br />
              <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
              <li class="nav-item btn-logout">
                <a href="/pages/services/logout_system.php" class="menu-item link d-inline-block text-white text-decoration-none">
                  <span class="fw-bold fs-sm text-uppercase ms-1">Logout</span>
                </a>
              </li>
              <?php }else{?>
              <li class="nav-item btn-logout">
                <a href="/pages/services/login.php" class="menu-item link d-inline-block text-white text-decoration-none rounded mb-2 p-2">
                  <span class="fw-bold fs-sm text-uppercase ms-1">Login</span>
                </a>
              </li>
            <?php } ?> 
            </ul>
          </div>
        </div>
        <!-- SIDEBAR -->