<?php
error_reporting(E_ALL);

require_once 'includes/config_session.inc.php';
require_once 'includes/appointment_model.php';


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
</head>

<body>
    <main>
        <?php require_once('includes/nav.php'); ?>

        <?php

        ?>
        <?php require_once('includes/nav.php'); ?>
        <?php //if(isset($_SESSION['idCustomer'])) { 
        ?>
        <section class="container" style="margin-bottom: 15rem;">
            <div class="row g-5 pt-5">
                <div class="col-md-8 offset-md-2 col-lg-8">
                    <h1 class="mb-3">Afspraak maken</h1>
                    <?php check_Appointment_errors(); ?>
                    <form action="includes/appointment.inc.php" method="post">
                        <div class="row g-3">
                            <div class="col-10">
                                <label for="firstName" class="form-label">Je naam*</label>
                                <input type="text" class="form-control" id="firstName" placeholder=<?php echo ($_SESSION['Firstname'] . $_SESSION['Lastname']); ?>>
                                <input type="hidden" name="idCustomer" value="<?php echo $_SESSION['idCustomer']; ?>">
                                <div class="invalid-feedback">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo ($_SESSION['user_Mail']); ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="state" class="form-label">Type aanvraag*</label>
                                    <select class="form-select" id="state" name="Status" required onchange="updateHiddenStatus()">
                                        <option value="">Maak een keuze</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Accepted">Accepted</option>
                                        <option value="InProgress">InProgress</option>
                                        <option value="Done">Done</option>
                                        <option value="InvoiceSent">InvoiceSent</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="date" class="form-label">Datum*</label>
                                    <input type="date" class="form-control" id="date" name="AppointmentDate">
                                    <div class="invalid-feedback">
                                        Please enter appointment date.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="kilometer" class="form-label">Kilometer Stand*</label>
                                    <input type="text" class="form-control" id="Mileage" name="Mileage">
                                    <div class="invalid-feedback">
                                        Please enter kilometer
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Probleem</label>
                                    <textarea id="problem" class="form-control" name="Problem" rows="4" cols="50"></textarea>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Opmerkingen</label>
                                    <textarea id="message" class="form-control" name="Notes" rows="4" cols="50"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg" type="submit">Verzenden</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php //} else {echo 'je moet een account hebben om een afspraak te kunnen maken.';}
        ?>



        <?php require_once('includes/footer.php'); ?>

    </main>

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>