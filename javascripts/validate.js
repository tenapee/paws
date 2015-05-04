/**
 * Created by tenapercy on 4/26/15.
 */
$(document).ready(function() {
    $("#signUp").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            username: {
                required: true,
                minlength: 7
            },
            password: {
                required: true,
                minlength: 7
            }
        },
        messages: {
            username: {
                minlength: "Usernames must be at least 7 characters!"
            },
            password: {
                minlength: "Passwords must be at least 7 characters!"
            }
        }
    });
    $("#signIn").validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true
            }
        }
    });
});