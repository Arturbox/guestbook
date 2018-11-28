/**
 * Created by artur on 07.11.2018.
 */
$(document).ready(function() {

    $("#signupForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            text: {
                required: true
            }

        },
        messages: {
            name: {
                required: "Please enter a name",
                minlength: "Your name must consist of at least 2 characters"
            },
            email: "Please enter a valid email address",
            text: "Please enter a message"
        }
    });


});