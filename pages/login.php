
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php");
?>

<main class="main-section login" role="container">
    <section class="py-5" id="login">
        <div class="container">
            <div class="row align-items-center align-content-center justify-content-center px-0 px-sm-2 text-white mx-auto">
                <h1 class="text-center fw-bold">Login</h1>
                <form class="text-white d-flex px-0 px-sm-2 justify-content-center flex-column align-items-center" id="loginform" method="POST" action="">
                    <div class="mb-4 col-12 col-md-10 col-lg-8 col-xl-6">
                        <label for="email" class="fw-bold fs-4 text-main-blue">Email</label>
                        <input class="w-100 fw-medium p-2 rounded-1 text-main-blue fs-4 border-purple"
                            placeholder="Enter your email"  type="email" name="email" id="email" value="">
                    </div>
                    <div class="mb-4 col-12 col-md-10 col-lg-8 col-xl-6">
                        <label for="password" class="fs-4 fw-bold text-main-blue" >Password</label>
                        <input  placeholder="Enter your password" class="w-full fw-medium p-2 rounded-1 text-main-blue fs-4 border-purple" type="password" name="password" id="password" value="">
                        <span toggle="#password" class="fas fa-eye-slash field-icon toggle-password text-dark"></span>
                    </div>
                    
                    <div class="d-flex col-12 col-md-10 col-lg-8 col-xl-6 justify-content-between mb-5 fw-bold">
                        <div class="d-flex gap-2">
                            <div class="d-flex align-items-center">
                                <input id="remember" aria-describedby="remember" class="border border-gray-300 rounded-3 bg-gray-50"
                                    type="checkbox">
                                </div>
                            <div class="remember-label">
                                <label for="remember" class=" text-sm">Remember
                                    me</label>
                            </div>
                        </div>
                        <a class="text-sm forgot-text underline" href="/pages/recoverypassword.php">Forgot
                            password?</a> 
                        </div>
                    <div class="d-flex justify-content-center col-12 mb-4">
                        <button type="submit"
                            class="btn-gradient btn btn-bg text-white custom-button text-uppercase fs-4 fw-bold py-2 px-5 mb-3 rounded-2">
                            Submit
                        </button>
                    </div>

                    <div class="d-flex align-items-center justify-content-center mb-4 gap-2 col-12 col-md-10 col-lg-8 col-xl-6">
                        <div class="bg-purple side-lines"></div>
                        <div class="text-center fw-bold text-sm col-4 col-sm-3">or connect with</div>
                        <div class="bg-purple side-lines"></div>
                    </div>

                    <div class="social-media d-flex align-items-center justify-content-center gap-4 mb-5  gap-2 col-12 col-md-10 col-lg-8 col-xl-6">
                        <a class="d-flex align-items-center justify-content-start text-decoration-none gap-2 p-2 pe-4 w-auto cursor-pointer rounded-2 text-white fw-bold"
                            href="#">
                            <img src="facebook-logo.svg" alt="facebook" class="img-fluid"/>
                            <p class="font-semibold m-0">facebook</p>
                        </a>
                        <a id="google-login-btn" class="d-flex align-items-center justify-content-start text-decoration-none gap-2 p-2 pe-4 w-auto cursor-pointer rounded-2 text-white fw-bold" href="#">
                            <img src="google-logo.svg" alt="google" class="img-fluid"/>
                            <p class="font-semibold m-0">Google</p>
                        </a>

                    </div>
                    <p class="text-sm fw-bold text-center">
                        Don’t have an account? 
                        <a class="forgot-text" href="/pages/register.php">Create One</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
</main>
<div id="error-container"></div>

<script src="/assets/js/Login.js"></script>

<?php include($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php"); ?>

