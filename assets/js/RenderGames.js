document.addEventListener('DOMContentLoaded', () => {
    fetchAndRenderGames('games-data-container');
    fetchAndRenderGames('games-data-container-new', 'Tag', 'New');
    fetchAndRenderGames('games-data-container-recommended', 'Tag', 'Recommended');
    fetchAndRenderGames('games-data-container-top', 'Tag', 'Top games');
    fetchAndRenderGames('games-data-container-games', 'Tag', 'Hot games');
});
