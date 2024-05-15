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
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h2 class="h4 my-0">Type afspraak</h2>
                            </div>
                            <div class="card-body">
                                <h3 class="h2 fw-normal">Datum: 16-5-2024</h3>
                                <div class="d-flex justify-content-center flex-column py-3">
                                    <label for="text-area">Opmerkingen</label>
                                    <textarea name="" id="text-area" placeholder="Eventuele opmerkingen"></textarea>
                                </div>

                                <button type="button" class="w-100 btn btn-lg btn-primary">Factuur</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php require_once ('includes/footer.php'); ?>
    </main>

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app.js"></>
</body >
</html >