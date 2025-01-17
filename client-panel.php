<?php
    require_once 'includes/config_session.inc.php';
    require_once ("includes/data.php");

    //print_r($_SESSION);
    
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <?php 
                        $json = callApi('appointment');

                        foreach ($json as $data) {
                    ?>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h2 class="h4 my-0"><?php echo $data['problem']; ?></h2>
                            </div>
                            <div class="card-body">
                                <h3 class="h2 fw-normal">Datum: <?php echo formatDate($data['datum']); ?></h3>
                                <div class="d-flex justify-content-center flex-column py-3">
                                    <label for="text-area">Opmerkingen</label>
                                    <textarea name="" id="text-area" placeholder="Eventuele opmerkingen"><?php echo $data['notes']; ?></textarea>
                                </div>
                                <span><?php echo daysUntilAppointment($data['datum']);?></span>

                                <button type="button" class="w-100 btn btn-lg btn-primary">Factuur</button>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </section>

        <?php require_once ('includes/footer.php'); ?>
    </main>

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body >
</html >