$("#registrationForm").validate({
  //error place
  errorPlacement: function(error, element) {
    var placement = $(element).data('error');
    $(placement).append(error)
  },
  rules: {
    "user[first_name]": {
      required: true,
      maxlength: 50,
      minlength: 2
    },
    "user[last_name]": {
      required: true,
      maxlength: 50,
      minlength: 2
    },
    "user[password]": {
      minlength: 6,
      maxlength: 50
    },
    "user[password_confirmation]": {
      equalTo: "#user_password"
    },
    "user[phone_number]": {
      number: true,
      maxlength: 11,
      minlength: 9
    }
  },
  messages: {
    "user[first_name]": {
      required: "First name is required.",
      maxlength: "First name must be less than 50",
      minlength: "First name must be more than 6"
    },
    "user[last_name]": {
      required: "Last name is required.",
      maxlength: "Last name must be less than 50",
      minlength: "Last name must be more than 6"
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
    "user[phone_number]": {
      number: "Phone is number.",
      maxlength: "Phone number must be less than 11",
      minlength: "Phone number must be more than 9"
    }
  }
});
