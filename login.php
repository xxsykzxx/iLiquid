<!doctype html>
<html lang="cs">
  <head>
    <title>iLiquid</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </head>

  <body>

<!-- Potřebné PHP -->

    <?php

        include_once 'functions.php';

        # Získání kódu produktu výrobku
        $loged = $_GET['loged'];
        
    ?>

<!-- Navigace -->

    <?php
        include_once 'header.php';
    ?>


<!-- Log-In -->

    <br>
    <br>
    <br>

    <!-- Alert - špatné jméno / heslo -->

    <?php

        DangerAllert($loged);

    ?>

    <!-- Formulář log-in -->

        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-4">

                                <h2 class="fw-bold mb-2 text-uppercase">Přihlásit se</h2>
                                <p class="text-white-50 mb-5">Prosím zadej přihlašovací jméno a heslo!</p>

                                <form action="login-submit.php" method="post">
                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="text" name="name" id="typeEmailX" class="form-control form-control-lg" />
                                        <label class="form-label mt-1" for="typeEmailX">Přihlašovací jméno</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                        <label class="form-label mt-1" for="typePasswordX">Heslo</label>
                                    </div>

                                    <p class="small pb-lg-2"><a class="text-white-50" href="#!">Zapomněl si heslo ?</a></p>

                                    <input class="btn btn-outline-light btn-lg px-5" type="submit" value="Přihlásit">
                                </form> 

                            </div>

                            
                            <p class="mb-0">Nemáš přihlášení ? 
                                <a href="registration.php" class="text-white-50 fw-bold">Registruj se !</a>
                            </p>
                           

                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</body>

</html>