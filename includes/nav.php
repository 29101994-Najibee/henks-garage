<header class="p-3">
    <div class="container" >
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 ">
                <img src="img/logo.png" class="logo" alt="logo van garagebedrijf">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <?php if(isset($_SESSION['user_Mail'])) { ?>
                    <li><a href="appointment.php" class="nav-link px-2">Afspraak maken</a></li>
                    <li><a href="client-panel.php" class="nav-link px-2">Klantenpaneel</a></li>
                <?php }?>
            </ul>
            <div class="text-end">
                <?php if(isset($_SESSION['user_Mail'])) {
                    echo '<a href="index.php?abort=1" class="btn btn-outline-light me-2">Uitloggen</a> ';
                } else {
                    echo '<a href="login.php" class="btn btn-outline-light me-2">Log in</a> 
                    <a href="register.php" class="btn btn-primary">Aanmelden</a>'; 
                } ?>
                <a href="loginEmployee.php" class="btn btn-secondary">Medewerker</a>
            </div>
        </div>
    </div>
</header>
