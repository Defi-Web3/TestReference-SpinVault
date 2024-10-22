document.addEventListener('DOMContentLoaded', () => {
    fetchAllGames('Type', type, 'games-data-container-slots');
    document.getElementById('load-more-btn').addEventListener('click', () => {
        renderGamesBatch('games-data-container-slots');
    });
});