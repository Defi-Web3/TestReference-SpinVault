// Header coin toggle switcher.
// document.addEventListener("DOMContentLoaded", () => {
//     const coinBox = document.getElementById("coin-box");
//     const coinIcon = document.getElementById("coin-icon");
//     const coinValue = document.getElementById("coin-value");
//     let isActive = false;
    
  
//     coinBox.addEventListener("click", () => {
//       isActive = !isActive;
  
//       if (isActive) {
//         coinBox.classList.add("active");
//         coinBox.classList.remove("inactive");
//         //coinValue.textContent = "SC 56,789.00";
//         coinIcon.src = "s-coin.png";
//       } else {
//         coinBox.classList.add("inactive");
//         coinBox.classList.remove("active");
//         //coinValue.textContent = "GC 912,356,789";
//         coinIcon.src = "g-coin.png";
//       }
//     });
// });

// Add active class on current clicked menu item header loggedon top & side nav 
$(function() {
    var currentPageUrl = window.location.href.split('/').pop();
    $('.header-loggedon .link').removeClass('active');
    $(".header-loggedon .link").each(function() {
        var linkHref = $(this).attr("href").split('/').pop();
        if (linkHref === currentPageUrl) {
            $(this).addClass("active");
        }
    });
    $('.header-loggedon .link').on('click', function() {
        $('.header-loggedon .link').removeClass('active');
        $(this).addClass('active');
    });
});

// Password field eye & eye slash toggle
$(document).ready(function() {
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
});
