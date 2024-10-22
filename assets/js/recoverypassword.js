document.addEventListener("DOMContentLoaded", function () {

function submitRecoveryForm(event) {

    event.preventDefault();
    const email = document.querySelector('.email-input').value;

    if (!email) {
        Swal.fire({
            title: 'Error',
            text: 'Email is required.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    // Construct the URL with the email as a query parameter
    const recoveryUrl = `https://spinvaultpreprod.sweepium.com:4010/RecoveryPassword?keySite=123456789abc&email=${encodeURIComponent(email)}`;

    // Make the GET request to the recovery URL
    fetch(recoveryUrl, {
        method: 'GET',
    })
    .then(response => {
        if (response.ok) {
            //alert('ok');
            return response.json(); // Assuming the response is in JSON format
        } else {
            throw new Error('Error in recovery process');
        }
    })
    .then(data => {
        console.log(data);
        // Assuming the response contains a success message or some useful data
        Swal.fire({
            title: 'Success',
            text: 'Recovery email sent successfully!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            console.log(result);
            if (result.isConfirmed) {
                recoveryForm.reset();
                window.location.href = '../../';
            }
        });
    })
    .catch(error => {
        Swal.fire({
            title: 'Error',
            text: 'Failed to send recovery email. Please try again.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        console.error('Error during password recovery:', error);
    });
}

    // Attach the submit event to the recovery form
    const recoveryForm = document.querySelector('.account-recovery-password');
    recoveryForm.addEventListener('submit', submitRecoveryForm);
});

