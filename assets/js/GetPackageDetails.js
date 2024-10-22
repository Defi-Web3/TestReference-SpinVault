document.addEventListener('DOMContentLoaded', function() {
    // Step 1: Parse the local storage data
    const storedData = JSON.parse(localStorage.getItem('userData')); // assuming you stored it under 'userData'

    if (!storedData || !storedData.data.token || !storedData.data.idPlayer) {
        console.error('Required user data (token or idPlayer) not found in localStorage');
        return;
    }

    const token = storedData.data.token;

    // Step 2: Get the package id from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const packageId = urlParams.get('id');
    console.log(packageId);

    if (!packageId) {
        console.error('Package ID not provided in URL');
        return;
    }

    // Step 3: Make API request
    const apiUrl = `https://spinvaultpreprod.sweepium.com:4010/GetCoinPackage?keySite=123456789abc&token=${token}&idCoinPackage=${packageId}`;
    
    console.log(apiUrl);

    fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        if (data && data.result) {
                const coinPackages = data.data; // Assuming the API returns the coin package details

                console.log(coinPackages);
                // Step 4: Find the package with the matching ID

                if (coinPackages) {
                    // Step 5: Dynamically update the HTML with the specific package details
                    const container = document.querySelector('.getcoins-detail');
                    
                    if (container) {
                        container.innerHTML = ''; // Clear existing content

                        // Determine the image path based on specialAfterPacks
                        const coinImagePath = coinPackages.specialAfterPacks === 0 
                        ? 'coincardimg2.png' 
                        : 'coincardspecial.png';

                        // Create the HTML dynamically based on the package data
                        const packageHtml = `<div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="img-wrap position-relative">
                        <img src="${coinImagePath}" class="coin-img img-fluid" alt="coin">
                        <p class="gc-point fw-bold text-white position-absolute">GC ${coinPackages.GC_coinsAmout}</p>
                        <p class="sc-point fw-bold text-black position-absolute">SC ${coinPackages.FC_coinsAmout}</p>
                        </div>
                        <div class="order-summary text-center d-flex flex-column justify-content-center mt-3">
                        <h6 class="mb-0">Order summary:</h6>
                        <h4 class="mt-2">USD ${coinPackages.originalPackagePrize}</h4>
                        </div>
                        </div>`;
                        
                        container.innerHTML = packageHtml;
                    }
                } else {
                    console.error(`No package found with ID: ${packageId}`);
                }
            } else {
                console.error('Failed to load coin packages:', data);
            }
        })
    .catch(error => {
        console.error('Error fetching coin packages:', error);
    });
});
