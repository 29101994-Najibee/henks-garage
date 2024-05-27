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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <main>

        <?php require_once('includes/nav.php'); ?>

        <div class="container mt-3">
            <form action="includes/signup.inc.php" method="post">
                <?php check_signup_errors(); ?>
                <div class="row jumbotron box8">
                    <div class="col-sm-12 mx-t3 mb-4">
                        <h2 class="text-center text-info">Register</h2>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="Firstname" id="Firstname" placeholder="Voornaam">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="lastname">Last name</label>
                        <input type="text" class="form-control" name="Lastname" id="Lastname" placeholder="Achternaam">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="email"><i class="fa-regular fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" name="Mail" id="Mail" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="telefoon">Telefoon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="telefoon"><i class="fa-solid fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="telefoon">

                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="straat">Straat</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="straat"><i class="fa-solid fa-location-dot"></i></span>
                            </div>
                            <input type="text" class="form-control" name="Streetname" id="Streetname" placeholder="Straat Naam">
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="huisnummer">Huisnumer</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="straat"><i class="fa-solid fa-door-closed"></i></span>
                            </div>
                            <input type="text" class="form-control" name="HouseNumber" id="HouseNumber" placeholder="Huisnummer">
                        </div>
                        </div>
                    <div class="col-sm-2 form-group">
                        <label for="zip">Post-Code</label>
                        <input type="text" class="form-control" name="Zipcode" id="Zipcode" placeholder="Postcode">
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="pass">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="email"><i class="fa-solid fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
                        </div>
                        
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="pass2">Confirm Password</label> 
                         <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="email"><i class="fa-solid fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                    </div>
                        </div>
                        
                    <div class="col-sm-12">
                        <input type="checkbox" class="form-check d-inline" id="chb"><label for="chb" class="form-check-label">&nbsp;I accept all terms and conditions.
                    </div>
                    <div class="col-sm-12">
                        <p>Heb je al account ! <a href="login.php">Inloggen</a></p>
                       
                    </div>

                    <div class="col-sm-12 form-group mb-0">
                        <button class="btn btn-primary float-right">Submit</button>
                    </div>

                </div>
            </form>
        </div>
        <?php require_once('includes/footer.php'); ?>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
    </main>
</body>

</html>
<?php
unset($_SESSION['signup_data']);?>
