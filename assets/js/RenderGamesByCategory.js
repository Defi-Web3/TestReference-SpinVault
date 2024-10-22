document.addEventListener('DOMContentLoaded', () => {
    fetchAllGames('Category', categoryName, 'games-data-container-live');
    document.getElementById('load-more-btn').addEventListener('click', () => {
        renderGamesBatch('games-data-container-live');
    });
});
