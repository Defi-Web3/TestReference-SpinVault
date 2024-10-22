document.addEventListener('DOMContentLoaded', () => {
    const providersSelect = document.querySelector('.providers');
    const gamesContainer = document.getElementById('games-data-search-container');
    const loadMoreBtn = document.getElementById('load-more-btn');
    const searchInput = document.getElementById('search');
    const apiUrlProviders = 'https://spinvaultpreprod.sweepium.com:4010/GamesProviders?keySite=123456789abc';
    const apiUrlGames = 'https://spinvaultpreprod.sweepium.com:4010/ListGames?SiteKey=123456789abc&Provider=';
    const coinBox = document.querySelector('.box-moneta');  // Reference to the coin box

    let gamesData = [];
    let currentGameIndex = 0;
    const gamesPerPage = 36;

    // Hide the "Load More" button initially
    if(loadMoreBtn){
        loadMoreBtn.style.display = 'none';    
    }

    // Fetch the game providers from the API
    fetch(apiUrlProviders)
        .then(response => response.json())
        .then(data => {
            providersSelect.innerHTML = '<option selected="" value="">Choose Providers</option>';
            data.data.forEach(provider => {
                const option = document.createElement('option');
                option.value = provider.nameGameProvider;
                option.textContent = provider.nameGameProvider;
                providersSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching providers:', error));

    // Event listener for provider selection
    providersSelect.addEventListener('change', function () {
        // Clear search input and reset game container when a provider is selected
        searchInput.value = ''; 
        clearGames(); // Reset the game container
        const selectedProvider = this.value;
        if (selectedProvider) {
            fetchGamesByProvider(selectedProvider);
        } else {
            clearGames();
        }
    });

    // Event listener for search input
    searchInput.addEventListener('input', function () {
        // Reset the provider dropdown and game container when typing in search input
        providersSelect.value = ''; 
        clearGames(); // Reset the game container
        const query = this.value.trim();
        if (query.length >= 3) {
            const matches = searchGames(query);
            showSuggestions(matches);
        } else {
            clearGames();
        }
    });

    // Determine currency based on the coin-box class
    function getCurrency() {
        if (coinBox.classList.contains('inactive')) {
            return 'GC';
        } else if (coinBox.classList.contains('active')) {
            return 'FC';
        }
        return 'FC';  // Default to GC if neither class is present
    }

    // Fetch games based on provider
    function fetchGamesByProvider(provider) {
        const fetchGamesUrl = `${apiUrlGames}${provider}`;
        fetch(fetchGamesUrl)
            .then(response => response.json())
            .then(data => {
                gamesData = data.list;
                currentGameIndex = 0;
                displayGames();
                toggleLoadMoreButton(); // Check if the "Load More" button should be visible
            })
            .catch(error => console.error('Error fetching games:', error));
    }

    // Fetch games and store them in localStorage
    async function fetchAndStoreGames() {
        try {
            const response = await fetch('https://spinvaultpreprod.sweepium.com:4010/ListGames?SiteKey=123456789abc');
            const data = await response.json();
            if (Array.isArray(data.list)) {
                localStorage.setItem('games', JSON.stringify(data.list));
            }
        } catch (error) {
            console.error('Error fetching games:', error);
        }
    }

    // Search games from localStorage
    function searchGames(query) {
        const storedGames = JSON.parse(localStorage.getItem('games')) || [];
        return storedGames.filter(game => game.nameGame.toLowerCase().includes(query.toLowerCase()));
    }

    // Display search results
    function showSuggestions(matches) {
        clearGames();
        if (matches.length === 0) {
            // Hide "Load More" button if no games are found
            loadMoreBtn.style.display = 'none';
        } else {
            matches.forEach(match => createGameCard(match));
            toggleLoadMoreButton();
        }
    }

    // Function to display games based on pagination
    function displayGames() {
        const endIndex = Math.min(currentGameIndex + gamesPerPage, gamesData.length);
        for (let i = currentGameIndex; i < endIndex; i++) {
            createGameCard(gamesData[i]);
        }
        currentGameIndex = endIndex;
        toggleLoadMoreButton();
    }

    // Create game card
    function createGameCard(game) {
        const gameDiv = document.createElement('div');
        gameDiv.classList.add('col', 'mb-4', 'position-relative', 'a-games');
        
        // Retrieve token and id from localStorage
        const userDataString = localStorage.getItem('userData');
        const userData = JSON.parse(userDataString);

        const token = userData?.data?.token;
        const id = userData?.data?.idPlayer;

        if (!token || !id) {
            console.error("Token or ID not found in localStorage.");
            return;
        }

        // Get the currency dynamically based on the coin-box class
        const currency = getCurrency();

        // Construct API URL to retrieve game URL
        const guid = game.guid;  // Assuming 'guid' is part of the game object
        const apiUrl = `https://spinvaultpreprod.sweepium.com:4000/GetLaunchUrlGame?SiteKey=123456789abc&Id=${id}&Token=${token}&Currency=${currency}&guid=${guid}`;

        const requestOptions = {
            method: "GET",
            redirect: "follow"
        };

        // Fetch the launch URL for the game
        fetch(apiUrl, requestOptions)
            .then(response => response.json())
            .then(result => {
                if (result && result.url) {
                    // Store the game URL in localStorage
                    localStorage.setItem(`gameurl`, result.url);

                    // Update the game card with the fetched URL
                    gameDiv.innerHTML = `
                        <a href="/pages/loggedOn/gamesplay.php" data-guid="${guid}">
                            <img src="${game.urlThumbnailButton}" class="img-fluid" alt="${game.nameGame}">
                        </a>`;
                    
                    // Append the game card to the games container
                    gamesContainer.appendChild(gameDiv);
                } else {
                    console.error('Failed to retrieve game URL.');
                }
            })
            .catch(error => console.error('Error fetching game URL:', error));
    }

    // Clear game results
    function clearGames() {
        gamesContainer.innerHTML = '';
        loadMoreBtn.style.display = 'none';
    }

    // Toggle "Load More" button
    function toggleLoadMoreButton() {
        if (gamesData.length > gamesPerPage && currentGameIndex < gamesData.length) {
            loadMoreBtn.style.display = 'block';
        } else {
            loadMoreBtn.style.display = 'none';
        }
    }

    // Load more games
    loadMoreBtn.addEventListener('click', displayGames);

    // Fetch games on page load
    window.onload = fetchAndStoreGames;
});
