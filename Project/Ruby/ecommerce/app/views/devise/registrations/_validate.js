$(".form_user").validate({
  //error place
  errorPlacement: function(error, element) {
    var placement = $(element).data('error');
    $(placement).append(error)
  },
  rules: {
    "user[full_name]": {
      required: true,
      maxlength: 50,
      minlength: 6
    },
    "user[phone_number]": {
      required: true,
      maxlength: 11,
      minlength: 9
    },
    "user[password]": {
      minlength: 6,
      maxlength: 50
    },
    "user[password_confirmation]": {
      equalTo: "#user_password"
    },
    "user[current_password]": {
      required: true,
      minlength: 6,
      maxlength: 50
    }
  },
  messages: {
    "user[full_name]": {
      required: "Username is required.",
      maxlength: "Username must be less than 50",
      minlength: "Username must be more than 6"
    },
    "user[phone_number]": {
      required: "Phone number is required.",
      maxlength: "Phone number must be less than 11",
      minlength: "Phone number must be more than 9"
    },
    "user[password]": {
      required: "Password is required",
      maxlength: "Password must be less than 50",
      minlength: "Password must be more than 6"
    },
    "user[password_confirmation]": {
      required: "Password confirmation is required",
      equalTo: "Password and password confirmation must be same"
    },
    "user[current_password]": {
      required: "Current password is required",
      maxlength: "Current password must be less than 50",
      minlength: "Current password must be more than 6"
    }
  }
});
