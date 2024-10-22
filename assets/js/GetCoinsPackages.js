document.addEventListener('DOMContentLoaded', function() {
    // Step 1: Parse the local storage data
    const storedData = JSON.parse(localStorage.getItem('userData')); // assuming you stored it under 'userData'

    console.log(storedData.data.token);
    
    if (!storedData || !storedData.data.token || !storedData.data.idPlayer) {
        console.error('Required user data (token or idPlayer) not found in localStorage');
        return;
    }

    const idPlayer = storedData.data.idPlayer;
    const token = storedData.data.token;

    // Step 2: Make API request
    const apiUrl = `https://spinvaultpreprod.sweepium.com:4010/GetCoinPackages?idPlayer=${idPlayer}&token=${token}`;
    
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data && data.result) {
                
                const coinPackages = data.data.packs; // Assuming the API returns an array of coin packages

                console.log(coinPackages);

                // Step 3: Dynamically update the HTML
                const container = document.querySelector('.getcoins');
                
                if (container) {
                    container.innerHTML = ''; // Clear existing content

                    // Use a for loop instead of forEach
                    for (let i = 0; i < coinPackages.length; i++) {
                        const packageItem = coinPackages[i];
                        
                        // Determine which image to use based on specialAfterPacks
                        const imagePath = packageItem.specialAfterPacks === 0 
                                          ? "coincardimg2.png" 
                                          : "coincardspecial.png";
                        
                        // Create the HTML dynamically based on the package data
                        const packageHtml = `<div class="col-6 col-md-3">
                                                <div class="starsplay-modelbody-innerwrap position-relative">
                                                    <div class="img-wrap">
                                                        <img src="${imagePath}" class="coin-img img-fluid" alt="coin">
                                                    </div>
                                                    <p class="gc-point fw-bold text-white position-absolute">GC ${packageItem.GC_coinsAmout}</p>
                                                    <p class="sc-point fw-bold position-absolute">SC ${packageItem.FC_coinsAmout}</p>
                                                </div>
                                                <a class="btn btn-gradient pricebtn mt-2 w-100" id="price-btn" href="/pages/loggedOn/coinsshop.php?id=${packageItem.idCoinsPackage}">$ ${packageItem.cashPackagePrize}</a>
                                            </div>`;
                        
                        container.innerHTML += packageHtml;
                    }
                }
            } else {
                console.error('Failed to load coin packages:', data);
            }
        })
        .catch(error => {
            console.error('Error fetching coin packages:', error);
        });
});
