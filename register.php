
@@ -1,128 +1,59 @@
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Henk's Autogarage</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  
    <main>

    <?php require_once ('includes/nav.php'); ?>

        <section class="container">
            <div class="row g-5 pt-5">
                <div class="col-md-8 offset-md-2 col-lg-8">
                    <div class="container align-items-center" style="margin-top: 8rem;">
                    <?php check_signup_errors(); ?>
                        <h2 class="tittle">Registeer Form</h2>
                        <form action="includes/signup.inc.php" method="post">
                            <div class="form-row">
                                <div class="col">
                                    <label>Voornaam</label>
                                    <input type="text" class="form-control" name="Firstname" id="Firstname" placeholder="Voornaam" value="<?php echo isset($_SESSION['signup_data']['Firstname']) ? htmlspecialchars($_SESSION['signup_data']['Firstname']) : ''; ?>">
                                </div>
                                <div class="col">
                                    <label>Achternaam</label>
                                    <input type="text" class="form-control" name="Lastname" id="Lastname" placeholder="Achternaam" value="<?php echo isset($_SESSION['signup_data']['Lastname']) ? htmlspecialchars($_SESSION['signup_data']['Lastname']) : ''; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="email"><i class="fa-regular fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="Mail" id="Mail" placeholder="Email" value="<?php echo isset($_SESSION['signup_data']['Mail']) ? htmlspecialchars($_SESSION['signup_data']['Mail']) : ''; ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Telefoon</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="telefoon"><i class="fa-solid fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="telefoon" value="<?php echo isset($_SESSION['signup_data']['PhoneNumber']) ? htmlspecialchars($_SESSION['signup_data']['PhoneNumber']) : ''; ?>">
                <div class="row g-5 pt-5">
                    <div class="col-md-8 offset-md-2 col-lg-8">
                        <h1 class="mb-3">Registeren</h1>
                        <form class="needs-validation" method="post">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="firstName" class="form-label">Je naam*</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value=""
                                        required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Straat</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="straat"><i class="fa-solid fa-location-dot"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="Streetname" id="StreetName" placeholder="Straat Naam" value="<?php echo isset($_SESSION['signup_data']['Streetname']) ? htmlspecialchars($_SESSION['signup_data']['Streetname']) : ''; ?>">
                                        <input type="text" class="form-control" name="HouseNumber" id="Housenumber" placeholder="Huis nummer" value="<?php echo isset($_SESSION['signup_data']['HouseNumber']) ? htmlspecialchars($_SESSION['signup_data']['HouseNumber']) : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Postcode</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Zipcode"><i class="fa-solid fa-door-closed"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="Zipcode" id="Zipcode" placeholder="Postcode" value="<?php echo isset($_SESSION['signup_data']['Zipcode']) ? htmlspecialchars($_SESSION['signup_data']['Zipcode']) : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="password"><i class="fa-solid fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Bevestig Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="cpassword"><i class="fa-solid fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Bevestig Password">

                                <div class="col-12">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top:15px">
                                <div class="col-sm-10">
                                    <button class="btn btn-primary" type="submit">Verzenden</button>
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg" type="submit">Verzenden</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

     
        <?php require_once ('includes/footer.php'); ?>

    </main>

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
<?php
unset($_SESSION['signup_data']);
?>
</body >
</html >