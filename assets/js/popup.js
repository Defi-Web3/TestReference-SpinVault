// Custom popup modal js bachup not using popup now
$(document).ready(function () {

  // Common Modal popup component  
  $('.common-modal-trigger').on('click', function (e) {
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

// Two-step forms
  $('.step2').hide();

  $('.continue-btn').on('click', function() {
    const $form = $(this).closest('.spinvault-register');
    $form.find('.step1').hide();
    $form.find('.step2').show();
    $form.find('.popup-modal-dialog').scrollTop(0);
  });

});
