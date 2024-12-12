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


<!-- Registrace -->

    <br>
    <br>
    <br>


    <!-- Alert - špatné jméno / heslo -->

    <?php

        DangerAllert($loged);

    ?>

    <!-- Formulář Registrace -->

        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-4">

                                <h2 class="fw-bold mb-2 text-uppercase">Registrovat se</h2>

                                <hr>

                                <p class="text-white-50 mb-3">Přihlašovací údaje!</p>

                                <form action="registration-submit.php" method="post">
                                    <div data-mdb-input-init class="form-outline form-white mb-3">
                                        <input type="text" name="nickname" id="typeEmailX" class="form-control form-control-md" required />
                                        <label class="form-label mt-1" for="typeEmailX">Přihlašovací jméno</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-3">
                                        <input type="password" name="password" id="typePasswordX" class="form-control form-control-md" required />
                                        <label class="form-label mt-1" for="typePasswordX">Heslo</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-2">
                                        <input type="password" name="password2" id="typePasswordX" class="form-control form-control-md" required />
                                        <label class="form-label mt-1" for="typePasswordX">Heslo znovu</label>
                                    </div>  

                                    <hr>

                                    <p class="text-white-50 mb-3">Kontaktní údaje!</p>

                                    <div data-mdb-input-init class="form-outline form-white mb-2">
                                        <input type="email" name="email" id="typePasswordX" class="form-control form-control-md" required />
                                        <label class="form-label mt-1" for="typePasswordX">E-mail</label>
                                    </div> 

                                    <div class="row">
                                        <div class="col-6">
                                            <div data-mdb-input-init class="form-outline form-white mb-3">
                                                <input type="text" name="firstname" id="typeEmailX" class="form-control form-control-md" required />
                                                <label class="form-label mt-1" for="typeEmailX">Jméno</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div data-mdb-input-init class="form-outline form-white mb-3">
                                                <input type="text" name="surname" id="typeEmailX" class="form-control form-control-md" required />
                                                <label class="form-label mt-1" for="typeEmailX">Příjmení</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-3">
                                        <input type="text" name="address" id="typeEmailX" class="form-control form-control-md" required />
                                        <label class="form-label mt-1" for="typeEmailX">Adresa</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div data-mdb-input-init class="form-outline form-white mb-3">
                                                <input type="text" name="city" id="typeEmailX" class="form-control form-control-md" required />
                                                <label class="form-label mt-1" for="typeEmailX">Město</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div data-mdb-input-init class="form-outline form-white mb-3">
                                                <input type="text" name="psc" id="typeEmailX" class="form-control form-control-md" minlength="5" maxlength="5" pattern="[0-9]{5}" required title="Zadejte přesně 5 čísel." />
                                                <label class="form-label mt-1" for="typeEmailX">PSČ</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-3">
                                        <input type="text" name="phone" id="typeEmailX" class="form-control form-control-md" pattern="(\+420)?[0-9]{9}" title="Zadejte platné telefonní číslo. Může začínat +420 a musí obsahovat 9 číslic." required />
                                        <label class="form-label mt-1" for="typeEmailX">Telefonní číslo</label>
                                    </div>
                               
                                    <input class="btn btn-outline-light btn-lg px-5" type="submit" value="Registrovat se">

                                </form> 

                            </div>
                           

                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</body>

</html>