$(document).ready(function() {
  $('.jquery-validation-form').each(function() {
    $(this).validate({
      // Define element for validation, pass class of form
      errorClass: 'jquery-validation-error',
      
      // If invalid, show error message in below, also use insertBefore()
      errorPlacement: function (error, element) {
        error.insertAfter(element);
      },

      // Define list of rules
      rules: {
        'user[full_name]': {
          required: true,
          rangelength: [2, 10]
        },
        'user[phone_number]': {
          required: true,
          number: true
        }
      },

      // Define content of message
      messages: {
        'user[full_name]': {
          required: 'Product required.',
          rangelength: 'Product invalid, length range form 2 to 10.'
        },
        'user[phone_number]': {
          required: 'Quantity required.',
          number: 'Quantity Iinvalid, must be a number'
        }
      }
    });
  });
});
