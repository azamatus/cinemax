/**
 * Created by Aza on 14.01.14.
 */
$(document).ready(function(){
    $('.feedback form').validate({
       rules: {
           cinemax_feedbackbundle_feedback_email: {
                required: true,
                email: true
            },
           cinemax_feedbackbundle_feedback_message:{
                required: true
            },
           cinemax_feedbackbundle_feedback_captcha:{
                required: true
            }
        },
        errorPlacement: function(error,element) {
            return true;
        }
    });
});
