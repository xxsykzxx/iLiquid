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

    <?php
        
        include_once 'functions.php';
        
    ?>

  <!-- Navigace -->

    <?php
        include_once 'header.php';
    ?>


<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <br>
    <br>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner mt-2">
    <div class="carousel-item active">
        <img src=".\Pictures\domecky_cz.webp" alt="Foto1" class="d-block" style="width:80%">
    </div>
    <div class="carousel-item">
        <img src=".\Pictures\rolnicky_cz.webp" alt="Foto2" class="d-block" style="width:80%">
    </div>
    <div class="carousel-item">
        <img src=".\Pictures\vanocni_vence_cz.webp" alt="Foto3" class="d-block" style="width:80%">
    </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    </button>
</div>

<?php

    print_r($_SESSION);

?>

<div id="alert-container" class="position-fixed top-0 end-0 p-3 mt-5" style="z-index: 1050; width: 100%; max-width: 400px;"></div>


<!-- Položky -->
<div class="container mt-5">
    <div class="row gx-5">
        <?php
            GetStoreCards();
        ?>  

    </div>
</div>




</body>

</html>