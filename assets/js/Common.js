const url = 'https://spinvaultpreprod.sweepium.com:4010/';
const siteKey = '123456789abc';
const mainElement = document.querySelector('main.main-section');
const isLoggedIn = mainElement.classList.contains('logged-in');
const gamesPerPage = 36; // Number of games to load per batch
let allGames = []; // Array to store all fetched games
let gamesLoaded = 0;

// Function to fetch and render games
function fetchAndRenderGames(containerId, category = '', params = '') {
    const queryParams = params ? `${category}=${params}` : 'Random=18';

    return fetch(`${url}ListGames?SiteKey=${siteKey}&${queryParams}`)
        .then(response => response.json())
        .then(data => {
            const dataContainer = document.getElementById(containerId);
            const htmlContent = data.list.map(item => {
                const thumbnailUrl = item.urlThumbnailButton && item.urlThumbnailButton !== null
                    ? item.urlThumbnailButton
                    : '/assets/images/no_image.png';

                return `
                    <div class="col mb-4 position-relative a-games games-data-container">
                        ${isLoggedIn ? 
                        `<a href="/pages/loggedOn/gamesplay.php" data-guid="${item.guid}"><img src="${thumbnailUrl}" class="img-fluid" alt=""></a>` 
                        : `
                        <img src="${thumbnailUrl}" class="img-fluid" alt="">
                        <div class="overlay">
                            <a class="btn btn-primary btn-gradient" href="/pages/login.php" role="button">Login to Play</a>
                        </div>`}
                    </div>
                `;
            }).join('');

            dataContainer.innerHTML += htmlContent;

            // Check if all games have been loaded
            const loadMoreBtn = document.getElementById('load-more-btn');
            if (gamesLoaded >= allGames.length) {
                loadMoreBtn.disabled = true; // Disable the button
                loadMoreBtn.textContent = 'No More Games'; // Update button text
            }
        })
        .catch(error => {
            return;
            console.error('Error fetching data:', error);
        });
}

// Function to fetch all games by type or category
function fetchAllGames(category = '', params = '', containerId = '') {
    const queryParams = params ? `${category}=${params}` : 'Random=18';

    return fetch(`${url}ListGames?SiteKey=${siteKey}&${queryParams}`)
        .then(response => response.json())
        .then(data => {
            allGames = data.list;
            renderGamesBatch(containerId);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

// Function to render games in batches
function renderGamesBatch(containerId, gamesPerPage = 36) {
    const dataContainer = document.getElementById(containerId);
    const gamesToRender = allGames.slice(gamesLoaded, gamesLoaded + gamesPerPage);

    const htmlContent = gamesToRender.map(item => {
        const thumbnailUrl = item.urlThumbnailButton && item.urlThumbnailButton !== null
            ? item.urlThumbnailButton
            : '/assets/images/no_image.png';

        return `
            <div class="col mb-4 position-relative a-games">
                ${isLoggedIn ? 
                `<a href="/pages/loggedOn/gamesplay.php" data-guid="${item.guid}"><img src="${thumbnailUrl}" class="img-fluid" alt=""></a>` 
                : `
                <img src="${thumbnailUrl}" class="img-fluid" alt="">
                <div class="overlay">
                    <a class="btn btn-primary btn-gradient" href="/pages/login.php" role="button">Login to Play</a>
                </div>`}
            </div>
        `;
    }).join('');

    dataContainer.innerHTML += htmlContent;

    // Update gamesLoaded
    gamesLoaded += gamesToRender.length;

    // Hide Load More button if all games are loaded
    if (gamesLoaded >= allGames.length) {
        const loadMoreBtn = document.getElementById('load-more-btn');
        loadMoreBtn.className = '';
        loadMoreBtn.style.display = 'none';
    }
}

function doGoogleLogin(){

    const apiUrlGoogleAuth = url + 'Auth/Google';
    const w = 480;
    const h = 600;

    const dualScreenLeft =
        window.screenLeft !== undefined ? window.screenLeft : window.screenX;
    const dualScreenTop =
        window.screenTop !== undefined ? window.screenTop : window.screenY;

    const width = window.innerWidth
        ? window.innerWidth
        : document.documentElement.clientWidth
        ? document.documentElement.clientWidth
        : screen.width;
    const height = window.innerHeight
        ? window.innerHeight
        : document.documentElement.clientHeight
        ? document.documentElement.clientHeight
        : screen.height;

    const left = width / 2 - w / 2 + dualScreenLeft;
    const top = height / 2 - h / 2 + dualScreenTop;

    const windowFeatures = `width=${w},height=${h},top=${top},left=${left},toolbar=no,menubar=no,status=no,resizable=no,scrollbars=no,location=no`;

    window.open(
        `${apiUrlGoogleAuth}?keySite=${siteKey}`,
        "_blank",
        windowFeatures
    );
}


function getPlayerBalance() {
    const Balanceurl = url + 'PlayerGetBalance';
    console.log(Balanceurl);

    const storedData = JSON.parse(localStorage.getItem('userData'));    
    const token = storedData.data.token;
    const idPlayer = storedData.data.idPlayer;

    if (!token || !idPlayer) {
        console.error('Token or Player ID not found in localStorage');
        return;
    }

    const payload = {
        keySite: siteKey,
        token: token,
        idPlayer: idPlayer
    };

    // Make the POST request
    fetch(Balanceurl, {
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
        console.log('Player Balance:', data);

        const balanceDataFc = data.data[0]; // FC Data
        const balanceDataGc = data.data[1]; // GC Data

        const boxMoneta = document.getElementById('coin-box');
        const coinValue = document.getElementById('coin-value');
        const coinIcon = document.getElementById('coin-icon');
        const coinSlideNavGc = document.getElementById('coin-value-gc');
        const coinSlideNavSc = document.getElementById('coin-value-sc');

        // Check if the element with ID 'redeemableGcCoins' exists
        const redeemableGcCoinsElement = document.getElementById('redeemableGcCoins');
        if (redeemableGcCoinsElement) {
            redeemableGcCoinsElement.textContent = `${balanceDataGc.amount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
        }

        // Check if the element with ID 'redeemableFcCoins' exists
        const redeemableFcCoinsElement = document.getElementById('redeemableFcCoins');
        if (redeemableFcCoinsElement) {
            redeemableFcCoinsElement.textContent = `${balanceDataFc.amount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
        }

        // Parse amounts as integers and calculate totals
        let totalFcAmount = parseInt(balanceDataFc.amount) + parseInt(balanceDataFc.redeemAmount);
        let totalGCAmount = parseInt(balanceDataGc.amount) + parseInt(balanceDataGc.redeemAmount);

        // Log the total amounts
        console.log(totalGCAmount);

        // Update the GC and SC values with commas and two decimal places
        coinSlideNavGc.textContent = `GC ${totalGCAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
        coinSlideNavSc.textContent = `SC ${totalFcAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

        // Check if the div has the 'inactive' class
        if (boxMoneta.classList.contains('inactive')) {
            // Update with redeemAmount for GC
            coinValue.textContent = `GC ${totalGCAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
            coinIcon.src = "g-coin.png";
        } else {
            // Update with amount for FC
            coinValue.textContent = `SC ${totalFcAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
            coinIcon.src = "s-coin.png";
        }
    })
    .catch(error => {
        console.error('Error fetching player balance:', error);
    });
}




document.addEventListener("DOMContentLoaded", () => {
    const coinBox = document.getElementById("coin-box");
    const coinIcon = document.getElementById("coin-icon");

    // Check if the state is saved in localStorage
    let savedState = localStorage.getItem("coinBoxState");
    let isActive = savedState === "active";

    // Initially set the state based on savedState
    if (isActive) {
        coinBox.classList.add("active");
        coinBox.classList.remove("inactive");
        coinIcon.src = "f-coin.png"; // Assuming f-coin is for the active state
    } else {
        coinBox.classList.add("inactive");
        coinBox.classList.remove("active");
        coinIcon.src = "g-coin.png"; // Assuming g-coin is for the inactive state
    }

    // Toggle between 'active' and 'inactive' on click
    coinBox.addEventListener("click", () => {
        isActive = !isActive;

        if (isActive) {
            coinBox.classList.add("active");
            coinBox.classList.remove("inactive");
            coinIcon.src = "f-coin.png"; // Change icon for active state
            localStorage.setItem("coinBoxState", "active"); // Save active state
        } else {
            coinBox.classList.add("inactive");
            coinBox.classList.remove("active");
            coinIcon.src = "g-coin.png"; // Change icon for inactive state
            localStorage.setItem("coinBoxState", "inactive"); // Save inactive state
        }

        // Fetch balance whenever the state changes
        getPlayerBalance();
    });

    // Fetch balance initially and every N seconds (e.g., 10 seconds)
    getPlayerBalance(); // Initial call on page load

    const N = 10000; // Interval in milliseconds (e.g., 10 seconds)
    setInterval(getPlayerBalance, N);
});



// Call the function every 10 seconds
//setInterval(getPlayerBalance, 10000);
