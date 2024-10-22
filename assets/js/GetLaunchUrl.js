document.addEventListener('DOMContentLoaded', () => {

    const coinBox = document.querySelector('.box-moneta');
    // Determine currency based on the coin-box class
    function getCurrency() {
        if (coinBox.classList.contains('inactive')) {
            return 'GC';
        } else if (coinBox.classList.contains('active')) {
            return 'FC';
        }
        return 'FC';  // Default to GC if neither class is present
    }

    // Event delegation: Add event listener to the document
    document.addEventListener('click', function(e) {
        
        // Check if the clicked element is inside a games-data container and is an anchor tag
        const container = e.target.closest('[id^="games-data-container-"]');
        const anchor = e.target.closest('a');

        if (container && anchor) {
            e.preventDefault();

            // Retrieve the token and id from localStorage
            const userDataString = localStorage.getItem('userData');
            const userData = JSON.parse(userDataString);

            const token = userData?.data?.token;
            const id = userData?.data?.idPlayer;

            if (!token || !id) {
                alert("Token or ID not found in localStorage.");
                return;
            }

            const currency = getCurrency();
            // Retrieve the guid from the data attribute of the clicked anchor
            const guid = anchor.getAttribute('data-guid');

            // Construct the API URL
            const apiUrl = `https://spinvaultpreprod.sweepium.com:4000/GetLaunchUrlGame?SiteKey=123456789abc&Id=${id}&Token=${token}&Currency=${currency}&guid=${guid}`;

            const requestOptions = {
                method: "GET",
                redirect: "follow"
            };

            fetch(apiUrl, requestOptions)
                .then((response) => response.json()) // Assuming the API returns JSON
                // .then((result) => {
                //     if (result && result.url) {
                //         // Call function to create iframe popup
                //         // createIframePopup(result.url);
                //     } else {
                //         alert('Failed to retrieve game URL.');
                //     }
                // })

                .then((result) => {
                    if (result && result.url) {
                        // Redirect to the game page
                        localStorage.setItem("gameurl", result.url);
                        window.location.href = `/pages/loggedOn/gamesplay.php`;
                    } else {
                        alert('Failed to retrieve game URL.');
                    }
                })
                .catch((error) => console.error('Error:', error));
        }
    });

});
