    document.addEventListener("DOMContentLoaded", function () {
            // Function to set a cookie
            function setCookie(name, value, days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                const expires = "expires=" + date.toUTCString();
                document.cookie = name + "=" + value + ";" + expires + ";path=/";
            }

            // Function to get a cookie value by name
            function getCookie(name) {
                const nameEQ = name + "=";
                const ca = document.cookie.split(';');
                for (let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            // Function to submit the login form
            function submitLoginForm(event) {
                event.preventDefault(); // Prevent the default form submission

                // Get form values
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;


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

                // Prepare the payload for the POST request
                const payload = {
                    keySite: "123456789abc",
                    email: email,
                    password: password
                };

                // API URL
                const apiUrl = 'https://spinvaultpreprod.sweepium.com:4010/PlayerLogin';

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
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Login successful:', data);

                    if(data.result == false){

                        Swal.fire({
                        title: 'Error',
                        text: 'Invalid Credentials. Please try again later !',
                        icon: 'error',
                        confirmButtonText: 'OK'
                            });
                    return;
                    }

                    // Check if login is successful (you may need to adjust based on API response)
                    if (data.result == true) {
                        // Set a cookie for login status (valid for 7 days)
                        setCookie('loggedIn', true, 7);

                        // Save user data in localStorage
                        localStorage.setItem('userData', JSON.stringify(data));

                        // Redirect to index.php
                        window.location.href = '../../';
                    } else {
                        displayError('Login failed. Invalid credentials.');
                    }
                })
                .catch(error => {
                    console.error('Error during login:', error);
                    displayError('Login failed. Please check your credentials and try again.');
                });
            }

            // Function to display error messages
            function displayError(message) {
                const errorContainer = document.getElementById('error-container');
                errorContainer.textContent = message;
                errorContainer.style.display = 'block'; // Show the error container
            }

            // Attach the submit event to the form
            const loginForm = document.getElementById('loginform');
            loginForm.addEventListener('submit', submitLoginForm);
        });