$(document).ready(function() {
  $('#edit-search-theme-form-1').click(function() {
    if ($(this).val() == Drupal.t('Search')) {
      $(this).val('');
    }
  });
  $('#edit-search-theme-form-1').blur(function() {
    if ($(this).val() == '') {
      $(this).val(Drupal.t('Search'));
    }
  });
});