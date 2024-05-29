<?php
error_reporting(E_ALL);
require_once 'includes/config_session.inc.php';
require_once 'includes/appointment_model.php';

    print_r($_SESSION);

    if (!isset($_SESSION['idCustomer'])) {
        header('location:index.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <main>
        <?php require_once('includes/nav.php'); ?>

        <?php if (isset($_SESSION['idCustomer'])) { ?>
            <div class="container mt-3" style="margin-bottom: 10rem;">
                <form action="includes/appointment.inc.php" method="post">
                    <?php check_Appointment_errors(); ?>
                    <div class="row jumbotron box8">
                        <div class="col-sm-12 mx-t3 mb-4">
                            <h2 class="text-center text-info">Afspraak Maken</h2>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="firstname">First Name</label>

                            <input type="text" class="form-control" id="firstName" placeholder="<?php echo ($_SESSION['Firstname']); ?>">
                            <input type="hidden" name="idCustomer" value="<?php echo $_SESSION['idCustomer']; ?>">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control" id="Lastname" placeholder="<?php echo ($_SESSION['Lastname']); ?>">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="email"><i class="fa-regular fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo ($_SESSION['user_Mail']); ?>">
                            </div>
                        </div>
                        <input type="hidden" name="Status" value="Waiting">
                        <div class="col-sm-6 form-group">
                            <label for="Problem" class="form-label">Type aanvraag</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-caret-down"></i></span>
                                </div>

                                <select class="form-select" id="state" name="Problem" required onchange="updateHiddenStatus()">
                                    <option value="">Maak een keuze</option>
                                    <?php

                                    try {

                                        $problems = get_problem($pdo);


                                        foreach ($problems as $problem) {
                                            echo '<option value="' . htmlspecialchars($problem['Problem']) . '">' . htmlspecialchars($problem['Problem']) . '</option>';
                                        }
                                    } catch (PDOException $e) {
                                        echo "Verbinding mislukt: " . $e->getMessage();
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="date" class="form-label">Datum</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                </div>
                                <input type="date" class="form-control" id="date" name="AppointmentDate">
                                <div class="invalid-feedback">
                                    Please enter appointment date.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="kilometer" class="form-label">Kilometer Stand</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-car"></i></span>
                                </div>

                                <input type="text" class="form-control" id="Mileage" name="Mileage">
                                <div class="invalid-feedback">
                                    Please enter kilometer.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="message" class="form-label">Opmerkingen</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="Notes"><i class="fa-solid fa-message"></i></span>
                                </div>

                                <textarea id="message" class="form-control" name="Notes" rows="4" cols="50"></textarea>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 form-group mb-0">
                            <button class="btn btn-primary float-right">Submit</button>
                        </div>

                    </div>
                </form>
            </div>

        <?php } else {
            echo '<div class="card"><p>je moet een account hebben om een afspraak te kunnen maken.</p></div>';
        } ?>

        <?php require_once('includes/footer.php'); ?>

    </main>

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    <script>
        // JavaScript array met gereserveerde data
        const reservedDates = <?php echo json_encode($reserved_dates); ?>;

        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('date');
            dateInput.addEventListener('input', function() {
                const selectedDate = this.value;
                if (reservedDates.includes(selectedDate)) {
                    alert('Deze datum is al gereserveerd. Kies een andere datum.');
                    this.value = '';
                }
            });
        });
    </script>
</body>

</html>