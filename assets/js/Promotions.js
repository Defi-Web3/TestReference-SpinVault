const PromoUrl = 'https://spinvaultpreprod.sweepium.com:4003/v2/GetBonus';

fetch(PromoUrl, {
  method: 'POST',
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
    'AuthorizationSite': '123456789abc'
  }
})
.then(response => {
  //console.log('Response status:', response.status);
  return response.json();
})
.then(result => {
  //console.log('Success:', result.results);
  populatePromotions(result.results);
  initializeMoreButtons();
})
.catch(error => {
  return;
  console.error('Error:', error);
});

function populatePromotions(promotions){

  const container = document.getElementById('promotions-container');
  container.innerHTML = '';

  for (let i = 0; i < promotions.length; i++) {

    const promotion = promotions[i];

    const promotionCard = `<div class="col">
      <div class="card border-0 rounded-md bg-transparent">
        <img class="card-img rounded-md" src="${promotion.imageBonus}">
        <div class="card-img-overlay d-flex flex-column justify-content-end align-items-center">
          <div class="overlay-inner-wrap w-full">
            <p class="fw-bold title m-0 text-center">${promotion.bonusDetails.title}</p>
            <p class="fw-bold text-white subtitle m-0 text-center">${promotion.bonusDetails.subTitle}</p>
            <p class="coin text-white mb-3 text-center">Get <span class="fw-bold">${promotion.bonusDetails.GC_amountBonus} GC</span> and <span class="fw-bold">${promotion.bonusDetails.FC_amountBonus} FC</span></p>
            <a class="common-modal-trigger text-white btn btn-lg btn-gradient d-block text-uppercase fw-bold mb-4 rounded" data-target=".register-form-modal" href="/pages/register.php">get free coins</a>

            <!-- More button -->
            <button id="moreBtn-${i}" class="common-modal-trigger text-white btn btn-lg text-uppercase border-2 border-white fw-bold btn-plain w-full rounded" data-target=".promotions-more-modal-${i}">More</button>
            <!-- Custom modal popup start -->
            <div class="common-modal-popup promotions-more-modal promotions-more-modal-${i}">
              <div class="popup-modal-dialog">
                <div class="popup-modal-content text-white bg-blue px-5 py-4">
                  <div class="popup-modal-header">
                    <button type="button" class="modal-close">
                      <img class="icon-close" src="close.png" alt="Close Icon" />
                    </button>
                  </div>

                  <div class="popup-modal-body">
                    <!-- <img class="card-img d-block m-auto" src="${promotion.imageBonus}"> -->
                    <h2 class="modal-title text-center fw-bold mt-3">${promotion.bonusDetails.title}</h2>
                    <h4 class="modal-subtitle mb-2 text-center">${promotion.bonusDetails.subTitle}</h4>
                    <p class="modal-description text-center border-0 p-0 m-0 fw-bold">${promotion.bonusDetails.textBonus}</p>
                  </div>

                </div>
              </div>
            </div>
            <!-- Custom modal popup end -->

          </div>
        </div>
      </div>
    </div>`;
    container.innerHTML += promotionCard;
  }
}

// Initialize Cards MoreButtons
function initializeMoreButtons() {
  $('.common-modal-trigger').on('click', function () {
    var targetModal = $(this).data('target');
    $(targetModal).fadeIn().css('display', 'flex');
  });
  $('.modal-close').on('click', function () {
    $(this).closest('.common-modal-popup').fadeOut();
  });
  $(window).on('click', function (e) {
    if ($(e.target).hasClass('common-modal-popup')) {
      $(e.target).fadeOut();
    }
  });
}
