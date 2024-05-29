<?php 
    require_once("includes/data.php");
    session_start();

    if(isset($_POST['submit'])) {
        // Sanitize user inputs
        $firstName = htmlspecialchars($_POST['firstName']);
        $password = htmlspecialchars($_POST['Password']);
    
        // Assign sanitized values to session variables
        $_SESSION['loginEmployee'] = $firstName;
        $_SESSION['loginEmployeePassword'] = $password;
        
        $data = callApi('receptionistLogin');

        if ($data) {
            header('Location: service-desk.php');
            exit();
        } else {
            echo 'Geen employee gevonden';
        }
    }
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
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <main>
        <?php require_once ('includes/nav.php'); ?>

        <div class="container mt-3">
            <form method="post">
                <div class="row jumbotron box8">
                    <div class="col-sm-12 mx-t3 mb-4">
                        <h2 class="text-center text-info">Login Medewerker</h2>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="firstName">Voornaam</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="firstName"><i class="fa-regular fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="John">
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="pass">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="email"><i class="fa-solid fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="Password" id="Password"
                                placeholder="Password">
                        </div>

                    </div>
                    <div class="col-sm-12 form-group mb-0">
                        <button class="btn btn-primary float-right" name="submit">Submit</button>
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