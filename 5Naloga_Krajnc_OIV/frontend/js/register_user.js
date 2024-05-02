$(document).ready(function () {             //$(document).ready() da se DOM prvo cel naloži preden se skripta požene

    $.validator.addMethod("passwordStrength", function (value, element) {
        // Uporaba zxcvbn za oceno moči gesla 
        var result = zxcvbn(value);

        return this.optional(element) || result.score >= 3;
    }, "Geslo ni dovolj varno. Uporabite močnejše geslo.");

    $.validator.addMethod("checkEmailAvailability", function(value, element) {
        var email = value;
        var result = true;
    
        $.ajax({
            type: "POST",
            url: "http://localhost/5Naloga_Krajnc_OIV/backend/register_user_back.php",
            data: { 
                'submit': 1,
                'email': email
            },
            async: false,
            success: function (response) {
                result = response.trim() !== 'Email ni več na voljo. Prosim izberite drugačen email.';
            }
        });
    
        return result;
    
    }, "Email ni več na voljo. Izberi drugačen email.");
    
    

    $("#input_form").validate({
        rules: {
            email: {
                required: true,
                email: true,
                checkEmailAvailability: true
            },
            password: {
                required: true,
            //     minlength: 6,
            //     passwordStrength: true
            }
        },
        messages: {
            email: {
                required: "Potrebeno je vpisati email",
                email: "Napačna oblika email naslova",
                checkEmailAvailability: "Email ni več na voljo. Izberi drugačen email."
            },
            password: {
                required: "Potrebno je določiti geslo",
            //     minlength: "Geslo je prekratko, minimalna zahteva je 6",
            //     passwordStrength: "Geslo ni dovolj varno. Uporabite močnejše geslo"
            }
        },

        submitHandler: function (form) {
            form.submit();
        }
    });
}); 


$(document).ready(function () {
    $("#submit").click(function () {
        console.log("Submit clicked");

        let email = $("#email").val().trim();
        let password = $("#password").val().trim();

        console.log("Email:", email);
        console.log("Password:", password);

        if (email === "" || password === "") {
            return false;
        }
        console.log("Before Ajax call");
        $.ajax({
            url: 'http://localhost/5Naloga_Krajnc_OIV/backend/register_user_back.php',
            method: 'POST',
            data: {
                email: email,
                password: password,
            },
            cache: false,
            success: function (data) {
                alert(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        })
    })
})

