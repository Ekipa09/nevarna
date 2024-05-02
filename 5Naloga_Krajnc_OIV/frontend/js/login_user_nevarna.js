$(document).ready(function () {
    $("#input_form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Potrebeno je vpisati email",
            },
            password: {
                required: "Potrebno je vpisati geslo"
            }
        },
        submitHandler: function (form) {
            var email = $("#email").val().trim();
            var password = $("#password").val().trim();

            console.log('Email: ', email);
            console.log('Geslo: ', password);

            $.ajax({
                url: 'http://localhost/5Naloga_Krajnc_OIV/backend/login_user_back_nevarna.php',
                method: 'POST',
                data: {
                    email: email,
                    password: password,
                },
                cache: false,
                dataType: 'json',
                success: function (data) {
                    // alert(data);
                    console.log(data)
                    if (data.status === 'success') {
                        window.location.href = 'blank.php';
                    } else {
                        alert("Prijava ni uspela. Preverite vaše podatke.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr);
                    console.error(status);
                    console.error(error);
                }
            });
        }
    });
});



