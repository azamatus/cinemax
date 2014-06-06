$(document).ready(function(){
    $('#register_button_id').click(function(){
        $('#registration_form').dialog(
            {
                closeText: "",
                minHeight: 300,
                minWidth: 450
            }
        );
    });
    $("#registration").validate({
        rules: {
            fos_user_registration_form_plainPassword_first: "required",
            "fos_user_registration_form[plainPassword][second]": {
                equalTo: '#fos_user_registration_form_plainPassword_first'
            }
        }
    });
    jQuery(function($) {
        $('#fos_user_registration_form_plainPassword_first').pwstrength();
    });
});
jQuery.extend(jQuery.validator.messages, {
    required: "Эти сведения вводить обязательно.",
    remote: "Please fix this field.",
    email: "Введите свой адрес электронной почты.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Введенные пароли не совпадают.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Please enter at least {0} characters."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});