<?php
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php");
?>
<main class="main-section recovery-password" role="container">
  <form class="form-common account-recovery-password my-5">
    <div class="container">
      <div class="items text-white w-md-50 m-auto">
        <h1 class="text-center border-0 p-0 mb-4 fw-bold">Password recovery</h1>
        <div class="item text-white w-100">
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="email" class="form-label fw-bold text-main-blue">Email</label>
              <input type="email" class="form-control p-2 email-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Email" name="email" value="">
            </div>
            <div class="col-md-12 mb-3 text-center">
            <button type="submit" class="btn btn-gradient text-white custom-button text-uppercase fw-bold py-3 px-5 mt-4 mb-3 spinvault-register">Send recovery email</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>

<script src="/assets/js/recoverypassword.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php"); ?>

