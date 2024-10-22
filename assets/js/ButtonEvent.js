document.addEventListener('DOMContentLoaded', function() {
    // Login Button 
    const loginButton = document.getElementById('login');
    if (loginButton) {
        loginButton.addEventListener('click', function(event) {
            event.preventDefault(); 
            const url = this.querySelector('a').getAttribute('href'); 
            window.location.href = url; 
        }); 
    }

    // Get Coin Button
    const getcoinButton = document.getElementById('getcoin');
    if (getcoinButton) {
        getcoinButton.addEventListener('click', function(event) {
            event.preventDefault(); 
            const url = this.querySelector('a').getAttribute('href'); 
            window.location.href = url; 
        }); 
    }

    // Login To Play Button
    document.querySelectorAll('.a-games .overlay').forEach(function(overlay) {
        overlay.addEventListener('click', function(event) {
            event.preventDefault(); 
            const url = this.querySelector('a').getAttribute('href'); 
            window.location.href = url; 
        }); 
    });

    // Reedem Button
    const redeemButton = document.getElementById('redeem');
    if (redeemButton) {
        redeemButton.addEventListener('click', function(event) {
            event.preventDefault(); 
            const url = this.getAttribute('href'); 
            window.location.href = url; 
        });
    }

    // Notification Button
    const notifiedButton = document.getElementById('notified');
    if (notifiedButton) {
        notifiedButton.addEventListener('click', function(event) {
            event.preventDefault(); 
            const url = this.getAttribute('href'); 
            window.location.href = url; 
        });
    }

    // Play Now Button 
    // Handle click events for all <a> elements with the 'activity-tag' class to navigate to the specified URL.
    // This class is commonly used across various links for unified click behavior.
    document.querySelectorAll('.activity-tag').forEach(function(activity) {
        activity.addEventListener('click', function(event) {
            event.preventDefault(); 
            const url = this.getAttribute('href'); 
            window.location.href = url; 
        }); 
    });
});

