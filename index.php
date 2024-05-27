<?php
    //session_start();
    //Print_r ($_SESSION);
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

        <div class="hero-box container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="text">
                        <h1 class="fst-italic text-center">Henk's Autogarage</h1>
                    </div>
                </div>
            </div>
        </div>

        <section>
            <div class="container px-4 py-5">
                <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
                    <div class="col d-flex flex-column align-items-start gap-2">
                        <h2 class="fw-bold text-body-emphasis">Wij zijn gefasineerde mensen met een grote passie!</h2>
                        <p class="text-body-secondary">Sinds 20 jaar zijn wij met ons team hard op weg om tot de beste
                            te horen, in Nederland en daarbuiten. Als u op zoek bent naar goede service bent u op het
                            juiste adres, hopelijk kunnen we wat betekenen voor elkaar.</p>
                    </div>

                    <div class="col">
                        <div class="row row-cols-1 row-cols-sm-2 g-4">
                            <div class="col d-flex flex-column gap-2">
                                <img src="img/logo.jpeg" alt="afbeelding over bedrijf">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php require_once ('includes/footer.php'); ?>
    </main>

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body >
</html >