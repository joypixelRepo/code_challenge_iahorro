require('./bootstrap');

$('.euro').on('focus', function() {
  deleteSpecialCharacters($(this));
});

$('.euro').on('focusout', function() {
  deleteSpecialCharacters($(this));
  $(this).val(
    $(this).val() + '€'
  );
});

$('#form-hipoteca').on('submit', function(e) {
  e.preventDefault();
  deleteSpecialCharacters($('.euro'));
  this.submit();
})

function deleteSpecialCharacters(elements) {
  console.log($(this));
  elements.each(function(index) {
    $(this).val(
      $(this).val().replace(/[^0-9\s]/gi, '').replace(/[_\s]/g, '-')
    );
  });
}