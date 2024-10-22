document.addEventListener("DOMContentLoaded", function () {
    // Function to fetch US states from the API and populate the dropdown
    function fetchUSStates() {
        const apiUrl = 'https://spinvaultpreprod.sweepium.com:4010/GetUSStates?SiteKey=123456789abc';

        // Fetch the states from the API
        fetch(apiUrl)
        .then(response => {
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
        })

        .then(data => {
            // Find the select element for states
            const stateSelect = document.getElementById('state-select');

            // Clear any existing options (except the default "Select State")
            stateSelect.innerHTML = '<option value="-1" disabled selected>Select State</option>';

            // Populate the dropdown with states
            data.data.forEach(state => {
                const option = document.createElement('option');
                    option.value = state.idState; // Assuming the API returns a 'code' for each state
                    option.textContent = state.nameState; // Assuming the API returns a 'name' for each state
                    stateSelect.appendChild(option);
                });
        })
        .catch(error => {
            Swal.fire({
                title: 'Error',
                text: 'Error fetching states. Please try again later.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    }

    // Call the function to fetch and populate states
    fetchUSStates();

    // Function to populate day dropdown
function populateDays() {
    const daySelect = document.getElementById('birthday-day');
    daySelect.innerHTML = '<option value="-1" disabled selected>Day</option>';
    
    // Add days 01 to 31
    for (let day = 1; day <= 31; day++) {
        const option = document.createElement('option');
        option.value = day.toString().padStart(2, '0'); // Pad single digits with a leading zero
        option.textContent = day.toString().padStart(2, '0'); // Display two digits
        daySelect.appendChild(option);
    }
}


// Function to populate month dropdown
function populateMonths() {
    const monthSelect = document.getElementById('birthday-month');
    monthSelect.innerHTML = '<option value="-1" disabled selected>Month</option>';
    
    // Month names
    const months = [
        "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December"
    ];

    // Add months to the dropdown
    months.forEach((month, index) => {
        const option = document.createElement('option');
        option.value = (index + 1).toString().padStart(2, '0'); // Month value in 2 digits (01-12)
        option.textContent = month;
        monthSelect.appendChild(option);
    });
}


    // Function to populate year dropdown (e.g., 1900 to current year)
    function populateYears() {
        const yearSelect = document.getElementById('birthday-year');
        yearSelect.innerHTML = '<option value="-1" disabled selected>Year</option>';

        const currentYear = new Date().getFullYear();
        const startYear = 1900;

        // Add years from 1900 to current year
        for (let year = currentYear; year >= startYear; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }
    }

    // Call the functions to populate day, month, and year dropdowns
    populateDays();
    populateMonths();
    populateYears();

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

    // Function to display error messages in the register-error-message
    function displayError(message) {
        const errorContainer = document.getElementById('register-error-message');
        errorContainer.textContent = message;
        errorContainer.style.display = 'block'; // Show the error container
    }

    // Function to set cookies
    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    // Add event listener for phone number validation
    const phoneInput = document.querySelector('.phone-input');
    phoneInput.addEventListener('input', function (event) {
        this.value = this.value.replace(/\D/g, '');
        if (this.value.length > 12) {
            this.value = this.value.slice(0, 12);
        }
    });


    // Function to submit form
    function submitForm(event) {
        console.log('in register');
        event.preventDefault(); // Prevent the form from submitting the traditional way

        // Clear previous error messages
        //document.getElementById('register-error-message').textContent = '';

        // Get form values
        const email = document.querySelector('.email-input').value.trim();
        const username = document.querySelector('.username-input').value.trim();
        const password = document.querySelector('.password-input').value.trim() || '';
        const stateId = document.querySelector('.state-input').value;
        const phoneNumber = document.querySelector('.phone-input').value.trim();

        // Get birthdate components
        const birthDay = document.querySelector('.birthday-day-select').value;
        const birthMonth = document.querySelector('.birthday-month-select').value;
        const birthYear = document.querySelector('.birthday-year-select').value;

        // Validate Email
        if (!email) {
            Swal.fire({
                title: 'Error',
                text: 'Email is required.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Validate Username
        if (!username) {
            Swal.fire({
                title: 'Error',
                text: 'Username is required.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Validate Password
        if (!password) {
            Swal.fire({
                title: 'Error',
                text: 'Password is required.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

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

        // Validate phone number (ensure exactly 10 digits)
        if (phoneNumber.length !== 12) {
            Swal.fire({
                title: 'Error',
                text: 'Phone number must be exactly 12 digits.',
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


        // Check if terms and conditions are agreed
        const termsChecked = document.getElementById('terms_conditions').checked;
        if (!termsChecked) {
            Swal.fire({
                title: 'Error!',
                text: 'You must agree to the Terms and Conditions.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Get the hidden user_id value
        const userId = document.getElementById('user_id').value;

        // Prepare the payload for the POST request
        const payload = {
            keySite: '123456789abc',
            email: email,
            password: password,
            nickName: username,
            stateId: stateId,
            countryId: 1,
            phoneNumber: phoneNumber,
            birthDate: birthDate
        };

        console.log(payload);

        // If user_id exists, add isEnabled: 1 to the payload
        // if (userId) {
        //     payload.isEnabled = 1;
        // }

        // API URL
        const apiUrl = 'https://spinvaultpreprod.sweepium.com:4010/PlayerRegister';

        // Make the API request
        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        })

        .then(response => {
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
        })

        .then(data => {

            console.log(data);
                // On success, check if user_id exists
            if (userId) {
                    // Set a cookie and save user data
                setCookie('loggedIn', true, 7);

                localStorage.setItem('userData', JSON.stringify(data));

                    // Redirect to index.php
                window.location.href = '../../';
            } else {
                console.log(data);
                Swal.fire({
                    title: 'Success!',
                    text: 'Registration successful!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                     window.location = "../../";   
                   });

                // Reset the form after successful submission
                form.reset();
            }
        })

        .catch(error => {
            Swal.fire({
                title: 'Registration Failed',
                text: 'Registration failed. Please try again later.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    }

    // Attach the submit event to the form
    const form = document.querySelector('.account-register');
    form.addEventListener('submit', submitForm);
});
