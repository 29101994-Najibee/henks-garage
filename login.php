<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'includes/config_session.inc.php';
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
                    <div class="container align-items-center" style="margin-top: 15rem;">
                        <?php check_login_errors(); ?>
                        <h2 class="tittle">Login Form</h2>
                        <?php if (!isset($_SESSION['user_id'])) { ?>
                            <form action="includes/login.inc.php" method="post">
                                <div class="form-row">
                                    <div class="col">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="email"><i class="fa-regular fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" name="Mail" id="Mail" placeholder="Email">
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
                                </div>
                                <div class="form-group row" style="margin-top:15px">
                                    <div class="col-sm-10">
                                        <button class="btn btn-primary" type="submit">Verzenden</button>
                                    </div>
                                </div>
                                <footer>Heb geen account? <a class="text-dark" href="register.php">Register nu</a></footer>
                            </form>
                        <?php } ?>
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
