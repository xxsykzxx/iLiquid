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


<!-- Objednávka dokončena -->

    <br>
    <br>
    <br>


    <!-- Alert - špatné jméno / heslo -->

    <?php

        DangerAllert($loged);

    ?>

    <div class="container py-5">
        <div class="text-center">
            
            <h1 class="display-4">Děkujeme za Vaši objednávku! <img src="Pictures\done.png" alt="Logo" class="mb-4" width="75"></h1>
            <p class="lead mt-3 text-success">Vaše objednávka byla úspěšně přijata a nyní ji zpracováváme.</p>
            <p class="mt-4">Potvrzení objednávky jsme Vám zaslali na e-mailovou adresu, kterou jste uvedli.</p>
            <p class="mt-4">Máte-li jakékoliv dotazy, neváhejte nás kontaktovat.</p>
            <a href="index.php" class="btn btn-primary mt-3 btn-lg">Zpět na hlavní stránku</a>
        </div>
    </div>



    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</body>

</html>