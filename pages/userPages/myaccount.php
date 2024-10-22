<?php
session_start();

// Start Loggedon Header 
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php");
// End Loggedon Header 

// Start Loggedon Mobile Menu 
include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/mobileMenuLoggedon.php"); 
// End Loggedon Mobile Menu 
?>

<main class="main-section logged-in my-account" role="container">
  <form class="form-common account-update my-5">
    <div class="container">
      <div class="items text-white">
        <h1 class="text-center border-0 p-0 mb-4 fw-bold">My Account</h1>

        <div class="item text-white w-100">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstname" class="form-label fw-bold text-main-blue">First Name</label>
              <input type="text" class="form-control p-2 firstname-input fw-medium rounded-1 text-main-blue border-purple" placeholder="First Name" name="firstname" value="" disabled>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastname" class="form-label fw-bold text-main-blue">Last Name</label>
              <input type="text" class="form-control p-2 lastname-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Last Name" name="lastname" value="" disabled>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label fw-bold text-main-blue">Email</label>
              <input type="email" class="form-control p-2 email-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Email" name="email" value="" disabled>
            </div>
            <div class="col-md-6 mb-3">
              <label for="username" class="form-label fw-bold text-main-blue">Username</label>
              <input type="text" class="form-control p-2 text-dark username-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Username" name="username" value="" disabled>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="password" class="form-label fw-bold text-main-blue">Password</label>
                <input id="password-field" type="password" class="form-control p-2 password-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Password" name="password" disabled>
                <span toggle="#password-field" class="fas fa-eye-slash field-icon toggle-password text-dark"></span>
              </div>
              <div class="col-md-6 mb-3">
                  <label for="confirm-password" class="form-label fw-bold text-main-blue">Confirm Password</label>
                  <input id="confirm-password-field" type="password" class="form-control p-2 confirm-password-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Confirm Password" name="confirm-password" disabled>
                  <span toggle="#confirm-password-field" class="fas fa-eye-slash field-icon toggle-password text-dark"></span>
              </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="birthday" class="form-label fw-bold text-main-blue">Date of Birth</label>
              <div class="d-flex">
                <select id="birthday-month" class="form-select me-2 py-2 birthday-month-select border-purple" name="birthday.month">
                  <option value="-1" disabled selected>Month</option>
                </select>
                <select  id="birthday-day" class="form-select me-2 py-2 birthday-day-select border-purple" name="birthday.day">
                  <option value="-1" disabled selected>Day</option>
                </select>
                <select id="birthday-year" class="form-select py-2 birthday-year-select border-purple" name="birthday.year">
                  <option value="-1" disabled selected>Year</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="phone" class="form-label fw-bold text-main-blue">Phone</label>
              <div class="d-flex border-purple">
                <select class="form-select w-25 border-0 phone-country-select border-purple" aria-label="Phone number country">
                  <option value="US" selected> 🇺🇸 US</option>
                </select>
                <input type="tel" class="form-control w-75 phone-input fw-medium rounded-1 text-main-blue fs-4" value="+1">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="address" class="form-label fw-bold text-main-blue">Address</label>
              <input type="text" class="form-control p-2 address-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Street" name="address">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="city" class="form-label fw-bold text-main-blue">City</label>
              <input type="text" class="form-control p-2 city-input fw-medium rounded-1 text-main-blue border-purple" placeholder="City" name="city">
            </div>
            <div class="col-md-6 mb-3">
              <label for="postcode" class="form-label fw-bold text-main-blue">Postcode</label>
              <input type="text" class="form-control p-2 postcode-input fw-medium rounded-1 text-main-blue border-purple" placeholder="Postcode" name="postcode">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="country" class="form-label fw-bold text-main-blue">Country</label>
              <select class="form-select p-2 country-select fw-medium rounded-1 text-main-blue border-purple" name="country">
                <option value="-1" disabled selected>United States of America</option>
                <option value="United States of America">United States of America</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="state" class="form-label fw-bold text-main-blue">State / Region</label>
              <select id="state-select" class="form-select p-2 state-input fw-medium rounded-1 text-main-blue border-purple" name="state">
                <option value="-1" disabled selected>Select State</option>
              </select>
            </div>
          </div>
          <input type="hidden" name="user_id" id="user_id" value="">
          <input type="hidden" name="token" id="token" value="">
          <!-- <div class="row">
            <div class="col-md-12 mb-3 d-flex align-items-start align-items-md-center gap-2">
              <input type="checkbox" class="border border-gray-300 rounded-3 bg-gray-50" id="terms_conditions" name="terms">
              <label class="form-check-label text-white checkbox-text fw-bold" for="terms_conditions">I have read and agree to the <a class="fw-bold text-main-purple" href="/staticPages/TermsAndCondition.php"> Terms And Conditions</a></label>
            </div>
          </div> -->
        </div>

        <div class="item text-white text-center w-100">
          <button type="submit" class="btn btn-gradient text-white custom-button text-uppercase fw-bold py-3 px-5 mt-4 mb-3 account-update">Update</button>
        </div>

      </div>
    </div>
  </form>
</main>
<script src="/assets/js/Register.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const storedData = JSON.parse(localStorage.getItem('userData'));

    if (storedData.data) {
        // Update form fields with localStorage data
        document.querySelector('.firstname-input').value = storedData.data.firstName || '';
        document.querySelector('.lastname-input').value = storedData.data.lastName || '';
        document.querySelector('.email-input').value = storedData.data.email || '';
        document.querySelector('.username-input').value = storedData.data.nickName || '';
        document.querySelector('.phone-input').value = storedData.data.phoneNumber || '';
        document.querySelector('.address-input').value = storedData.data.address || '';
        document.querySelector('.city-input').value = storedData.data.city || '';
        document.querySelector('.postcode-input').value = storedData.data.postcode || '';
        document.querySelector('.state-input').value = storedData.data.idState || ''; // Ensure this matches the state format
        document.querySelector('#user_id').value = storedData.data.idPlayer;
        document.querySelector('#token').value = storedData.data.token;

        if (storedData.data.birthDate) {
            const birthDate = new Date(storedData.data.birthDate);
            document.querySelector('#birthday-month').value = birthDate.getMonth() + 1; // Jan is 0
            document.querySelector('#birthday-day').value = birthDate.getDate();
            document.querySelector('#birthday-year').value = birthDate.getFullYear();
        }

        setTimeout(() => {
            const stateSelect = document.querySelector('#state-select');
            const stateId = storedData.data.idState; // Assuming idState is the value of the option
            for (let i = 0; i < stateSelect.options.length; i++) {
                if (stateSelect.options[i].value == stateId) {
                    stateSelect.selectedIndex = i; // Set the selected index to the matching state
                    break;
                }
            }
        }, 1000);

    } else {
        console.error('No user data found in localStorage');
    }

    // Function to calculate age
    function calculateAge(birthDate) {
        const today = new Date();
        const birth = new Date(birthDate);
        let age = today.getFullYear() - birth.getFullYear();
        const monthDifference = today.getMonth() - birth.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birth.getDate())) {
            age--;
        }
        return age;
    }

        //Function to update user
    function submitUpdateForm(event) {
        console.log('in update');

        event.preventDefault(); // Prevent the form from submitting the traditional way

        // Get form values
        //const email = document.querySelector('.email-input').value.trim();
        //const username = document.querySelector('.username-input').value.trim();
       // const password = document.querySelector('.password-input').value.trim() || '';
       // const firstName = document.querySelector('.firstname-input').value.trim();
       // const lastName = document.querySelector('.lastname-input').value.trim();
        const stateId = document.querySelector('.state-input').value;
        const phoneNumber = document.querySelector('.phone-input').value.trim();
        const address = document.querySelector('.address-input').value.trim();
        const city = document.querySelector('.city-input').value.trim();
        const postcode = document.querySelector('.postcode-input').value.trim();
        const token = document.querySelector('#token').value;
        const userId = document.querySelector('#user_id').value;

        // Get birthdate components
        const birthDay = document.querySelector('.birthday-day-select').value;
        const birthMonth = document.querySelector('.birthday-month-select').value;
        const birthYear = document.querySelector('.birthday-year-select').value;

        // Validate Email
        // if (!email) {
        //     Swal.fire({
        //         title: 'Error',
        //         text: 'Email is required.',
        //         icon: 'error',
        //         confirmButtonText: 'OK'
        //     });
        //     return;
        // }

        // Validate Username
        // if (!username) {
        //     Swal.fire({
        //         title: 'Error',
        //         text: 'Username is required.',
        //         icon: 'error',
        //         confirmButtonText: 'OK'
        //     });
        //     return;
        // }

        // Validate Password
        // if (!password) {
        //     Swal.fire({
        //         title: 'Error',
        //         text: 'Password is required.',
        //         icon: 'error',
        //         confirmButtonText: 'OK'
        //     });
        //     return;
        // }

        // Validate State
        if (!stateId || stateId === '-1') {
            Swal.fire({
                title: 'Error',
                text: 'Please select a state.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Validate Birthdate components
        if (birthDay === '-1' || birthMonth === '-1' || birthYear === '-1') {
            Swal.fire({
                title: 'Error',
                text: 'Please complete your birth date.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Get birthDate string
        const birthDate = `${birthYear}-${birthMonth}-${birthDay}`;

        // Validate age (should be more than 18 years old)
        const age = calculateAge(birthDate);
        
        if (age < 18) {
            Swal.fire({
                title: 'Error',
                text: 'You must be at least 18 years old to register.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Prepare the payload for the POST request
        const payload = {
            keySite :'123456789abc',
            token: token,
            idPlayer: userId,            
            postcode: postcode,
            address: address,
            city: city,
            birthDate: birthDate,
            phoneNumber: phoneNumber,
            idCountry: 1,
            idState: stateId,
        };

        console.log(payload);
        // API URL
        const apiUrl = 'https://spinvaultpreprod.sweepium.com:4010/PlayerUpdate';

        // Make the API request
        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        }).then(response => {
            if (!response.ok) {
                Swal.fire({
                    title: 'Network Error',
                    text: 'Network response was not ok. Please try again later.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(data => {

            if (data.result) {

                 //localStorage.setItem('userData', JSON.stringify(payload));
                 
                 Swal.fire({
                    title: 'Success!',
                    text: 'Registration successful!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });

                formUpdate.reset();
              }
        }).catch(error => {
            Swal.fire({
                title: 'Registration Failed',
                text: 'Registration failed. Please try again later.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    }

    const formUpdate = document.querySelector('.account-update');
    formUpdate.addEventListener('submit', submitUpdateForm);
});
</script>

<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>