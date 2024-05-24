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
                             
        <div class="container mt-3">
        <form action="includes/login.inc.php" method="post">
            <?php check_login_errors(); ?>
                <div class="row jumbotron box8">
                    <div class="col-sm-12 mx-t3 mb-4">
                        <h2 class="text-center text-info">Login</h2>
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
                        <label for="pass">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="email"><i class="fa-solid fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
                        </div>
                        
                    </div>
                    
                    <div class="col-sm-12">
                        <p>Heb je geen account ! <a href="register.php">Registreren</a></p>
                       
                    </div>
                    <div class="col-sm-12 form-group mb-0">
                        <button class="btn btn-primary float-right">Submit</button>
                    </div>
            </div>
        </form>
        </div>
               
        <?php require_once ('includes/footer.php'); ?>
    </main>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
