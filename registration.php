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

                                <form action="registration-submit.php" method="post">

                                    <!-- Kontaktní údaje --> 
                                    <p class="text-white-50 mb-3">Kontaktní údaje</p>

                                    <div class="row">
                                        <div class="col-6">
                                            <div data-mdb-input-init class="form-outline form-white">
                                                <input type="text" name="firstname" id="typeEmailX" class="form-control form-control-md" required />
                                                <label class="form-label mt-1" for="typeEmailX">Jméno</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div data-mdb-input-init class="form-outline form-white">
                                                <input type="text" name="surname" id="typeEmailX" class="form-control form-control-md" required />
                                                <label class="form-label mt-1" for="typeEmailX">Příjmení</label>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Přihlašovací údaje --> 
                                    <p class="text-white-50 mb-3">Přihlašovací údaje!</p>

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
                                    
                                    <!-- Tlačítko - Výběr odběru (osobní / dodání) -->
                                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active text-white" id="pills-personal-tab" data-bs-toggle="pill" data-bs-target="#pills-personal" type="button" role="tab" aria-controls="pills-personal" aria-selected="true">
                                                <u>Osobní odběr</u>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link text-white" id="pills-address-tab" data-bs-toggle="pill" data-bs-target="#pills-address" type="button" role="tab" aria-controls="pills-address" aria-selected="false">
                                                <u>Poslat na adresu</u>
                                            </button>
                                        </li>
                                    </ul>

                                    <!-- Výběr odběru (osobní / dodání) --> 
                                    <div class="tab-content" id="pills-tabContent">

                                        <!-- Sekce Osobní odběr -->
                                        <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                                            <input class="btn btn-outline-light btn-lg px-5" type="submit" name="osobni" value="Registrovat se" />
                                            <!-- <input type="hidden" name="delivery_method" value="osobni"> -->
                                            <!-- <button type="submit" class="btn btn-outline-light btn-lg px-5 mt-3">Registrovat se 4</button> -->
                                        </div>

                                        <!-- Sekce Poslat na adresu -->
                                        <div class="tab-pane fade" id="pills-address" role="tabpanel" aria-labelledby="pills-address-tab">

                                            <p class="text-white-50 mb-3">Doručovací údaje!</p>

                                            <div data-mdb-input-init class="form-outline form-white mb-2">
                                                <input type="email" name="email" id="typePasswordX" class="form-control form-control-md"  />
                                                <label class="form-label mt-1" for="typePasswordX">E-mail</label>
                                            </div> 

                                            <div data-mdb-input-init class="form-outline form-white mb-3">
                                                <input type="text" name="address" id="typeEmailX" class="form-control form-control-md"  />
                                                <label class="form-label mt-1" for="typeEmailX">Adresa</label>
                                            </div>

                                            <div class="row">
                                                <div class="col-8">
                                                    <div data-mdb-input-init class="form-outline form-white mb-3">
                                                        <input type="text" name="city" id="typeEmailX" class="form-control form-control-md"  />
                                                        <label class="form-label mt-1" for="typeEmailX">Město</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div data-mdb-input-init class="form-outline form-white mb-3">
                                                        <input type="text" name="psc" id="typeEmailX" class="form-control form-control-md" />
                                                        <label class="form-label mt-1" for="typeEmailX">PSČ</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div data-mdb-input-init class="form-outline form-white mb-3">
                                                <input type="text" name="phone" id="typeEmailX" class="form-control form-control-md" />
                                                <label class="form-label mt-1" for="typeEmailX">Telefonní číslo</label>
                                            </div>
                                            
                                            <input class="btn btn-outline-light btn-lg px-5" type="submit" name="adresa" value="Registrovat se" />
                                            <!-- <input type="hidden" name="delivery_method2" value="adresa"> -->
                                            <!-- <button type="submit" class="btn btn-outline-light btn-lg px-5">Registrovat se 2</button> -->

                                        </div>
                                    </div>                    

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