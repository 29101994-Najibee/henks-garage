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
        <section class="container">
                <div class="row g-5 pt-5">
                    <div class="col-md-8 offset-md-2 col-lg-8">
                        <h1 class="mb-3">Registeren</h1>
                        <form class="needs-validation" method="post">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="firstName" class="form-label">Je naam*</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value=""
                                        required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg" type="submit">Verzenden</button>
                        </form>
                    </div>
                </div>
        </section>

     
        <?php require_once ('includes/footer.php'); ?>

    </main>

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body >
</html >