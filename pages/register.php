<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php");?>

<main class="main-section register" role="container">
  <form class="form-common account-register my-5">
    <div class="container">

      <div class="items text-white">
        <h1 class="text-center border-0 p-0 mb-4 fw-bold">Create an Account</h1>
        <div class="item text-white w-100">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label fw-bold text-main-blue">Email</label>
              <input type="email" class="form-control p-2 email-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Email" name="email" value="">
            </div>
            <div class="col-md-6 mb-3">
              <label for="username" class="form-label fw-bold text-main-blue">Username</label>
              <input type="text" class="form-control p-2 text-dark username-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Username" name="username" value="">
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-3">
              <label for="password" class="form-label fw-bold text-main-blue">Password</label>
              <input id="password-field" type="password" class="form-control p-2 password-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Password" name="password">
              <span toggle="#password-field" class="fas fa-eye-slash field-icon toggle-password text-dark"></span>
            </div>
          </div>

          <div class="row"> 
            <div class="col-12 mb-3">
              <label for="state" class="form-label fw-bold text-main-blue">State / Region</label>
              <select id="state-select" class="form-select p-2 state-input fw-medium rounded-1 text-main-blue border-purple" name="state">
                <!-- <option value="-1" disabled selected>Select State</option> -->
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-3">
              <label for="phone" class="form-label fw-bold text-main-blue">Phone (Optional)</label>
              <div class="d-flex border-purple">
                <select class="form-select w-25 border-0 phone-country-select border-purple" aria-label="Phone number country">
                  <option value="US" selected> 🇺🇸 US</option>
                </select>
                <input type="tel" class="form-control w-75 phone-input fw-medium rounded-1 text-main-blue fs-4" value="+1">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-3">
              <label for="birthday" class="form-label fw-bold text-main-blue">Date of Birth</label>
              <div class="d-flex">
                <select id="birthday-month" class="form-select me-2 py-2 birthday-month-select border-purple" name="birthday.month">
                  <option value="-1" disabled selected>Month</option>
                </select>
                <select id="birthday-day" class="form-select me-2 py-2 birthday-day-select border-purple" name="birthday.day">
                  <option value="-1" disabled selected>Day</option>
                </select>
                <select id="birthday-year" class="form-select py-2 birthday-year-select border-purple" name="birthday.year">
                  <option value="-1" disabled selected>Year</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mb-3 d-flex align-items-start align-items-md-center gap-2">
              <input type="hidden" id="user_id" name="user_id" value="">
              <input type="checkbox" class="border border-gray-300 rounded-3 bg-gray-50" id="terms_conditions" name="terms">
              <label class="form-check-label text-white checkbox-text fw-bold" for="terms_conditions">I have read and agree to the <a class="fw-bold text-main-purple" href="/staticPages/TermsAndCondition.php"> Terms And Conditions</a></label>
            </div>
          </div>
        </div>

        <div class="item text-white text-center w-100">
          <button type="submit" class="btn btn-gradient text-white custom-button text-uppercase fw-bold py-3 px-5 mt-4 mb-3 spinvault-register">Register</button>
          <p id="register-error-message" class="register-error-message" style="display: none; color: red;"></p>
          <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
            <div class="bg-purple side-lines flex-grow-1"></div>
            <div class="text-center fw-bold text-sm col-4 col-sm-2">or connect with</div>
            <div class="bg-purple side-lines flex-grow-1"></div>
          </div>

          <div class="social-media d-flex justify-content-center gap-4 mb-5">
            <button class="d-flex align-items-center gap-2 p-2 pe-4 rounded-2 text-white fw-bold border-0" disabled>
              <img src="facebook-logo.svg" alt="facebook" class="img-fluid">
              <p class="m-0">facebook</p>
            </button>
            <button class="d-flex align-items-center gap-2 p-2 pe-4 rounded-2 text-white fw-bold border-0" disabled>
              <img src="google-logo.svg" alt="google" class="img-fluid">
              <p class="m-0">Google</p>
            </button>
          </div>
        </div>
      </div>
      
    </div>
  </form>
</main>

<!-- Register js -->
<script src="/assets/js/Register.js"></script>
<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php"); ?>