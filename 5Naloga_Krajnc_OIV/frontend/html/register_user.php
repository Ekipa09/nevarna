<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/650eaa312d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script src="../js/register_user.js"></script>
    <script src="../zxcvbn/zxcvbn.js"></script>

    <link rel="stylesheet" href="../css/register_user.css" />
</head>

<body>
    <div class="form-container">
        <form name="input_form" id="input_form" method="post" enctype="multipart/form-data" >
            <div class="register">Registracija</div>

            <label for="Email">Elektronski naslov:</label>
            <p>Format: neki.neki@neki.com</p>
            <input type="text" name="email" placeholder="Email" id="email">
            <small class="error-email" style="color: red;"></small>

            <label for="geslo">Geslo:</label>
            <input type="password" name="password" placeholder="Geslo" id="password">

            <input class="btn btn-primary " type="submit" name="submit" value="Potrdi" id="submit">

            <br>
            <label style="display: flex; justify-content:center;">Ali ste že registrirani?</label>
            <a href="../html/login_user.html" class="btn btn-primary ">Prijava</a>

        </form>
    </div>
</body>

</html>