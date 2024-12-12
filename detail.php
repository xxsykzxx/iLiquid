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
        $code = $_GET['code'];
        
    ?>

<!-- Navigace -->

    <?php
        include_once 'header.php';
    ?>


<!-- Detail produktu -->

    <br>

    <h1 class="mt-5">Detail</h1>

    <?php

        print_r($_SESSION);
        GetDetail($code);

    ?>

    <br>

    <div class="container py-6">
        <div class="row flex-lg-row-reverse align-items-center d-flex justify-content-center g-5">
            <div class="col-10 mx-auto col-sm-8 col-lg-6">
                <img src=".\Pictures\1-X0429-08.webp" class="d-block mx-lg-auto img-fluid" alt="" loading="lazy">
            </div>

            <div class="col-lg-6 col-12 d-flex flex-column align-items-center text-center">
                <h2 class="fw-bold display-5">Zvonek porcelán X0429-08</h2>
                <p>Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>

                <div class="lc-block d-grid gap-2 d-md-flex justify-content-center">
                    <a class="btn btn-primary px-5" href="#" role="button">Přidat</a>
                </div>
            </div>
        </div>
    </div>




    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</body>

</html>