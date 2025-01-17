<?php
require_once ("includes/data.php");
session_start();
// print_r($_SESSION);

if (!isset($_SESSION['loginEmployee'])) {
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
</head>

<body>
    <main>
        <?php require_once ('includes/nav.php'); ?>

        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center py-5">
                            <h1>Overzicht van alle openstaande afspraken</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="dropdown mb-5">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Filteren
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="service-desk.php" class="text-black dropdown-item">Alle afspraken</a></li>
                                <li><a href="service-desk.php?status=1" class="text-black dropdown-item">Open</a></li>
                                <li><a href="service-desk.php?status=3" class="text-black dropdown-item">Gesloten</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <?php
                    if (isset($_GET['status'])) {
                        if ($_GET['status'] == 1) {
                            $json = callApi('status_open');
                        } else if ($_GET['status'] == 3) {
                            $json = callApi('status_closed');
                        } else if ($_GET['status'] == 4) {
                            updateAppointment($_GET['Appointment']);

                            $json = callApi('receptionist');
                        } else {
                            $json = callApi('receptionist');
                        }
                    } else {
                        $json = callApi('receptionist');
                    }

                    foreach ($json as $data) {
                        ?>
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <div class="d-flex justify-content-center">
                                        <h2 class="h4 my-0"><?php echo $data['problem']; ?> </h2>

                                        <div class="dropdown mb-5">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                
                                            </button>
                                            <ul class="dropdown-menu">
                                                <?php echo '<li><a href="service-desk.php?status=4&Appointment=' . $data['id'] . '" class="text-black dropdown-item">Done</a></li>'; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h3 class="h2 fw-normal">Datum: <?php echo formatDate($data['datum']); ?></h3>
                                    <div class="d-flex justify-content-center flex-column py-3">
                                        <label for="text-area">Opmerkingen</label>
                                        <textarea name="" id="text-area"
                                            placeholder="Eventuele opmerkingen"><?php echo $data['notes']; ?></textarea>
                                    </div>
                                    <span><?php echo daysUntilAppointment($data['datum']); ?></span>

                                    <button type="button" class="w-100 btn btn-lg btn-primary">Factuur</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <?php require_once ('includes/footer.php'); ?>
    </main>

    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>