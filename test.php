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


<!-- Test -->

<br>
<br>
<br>

<h1> Formulář </h1>

<div class="container mt-5">
        <h2>Vyplňte své údaje</h2>

        <!-- Formulář pro jméno a příjmení -->
        <form id="mainForm" action="submit.php" method="POST">

            <div class="mb-3">
                <label for="firstName" class="form-label">Jméno</label>
                <input type="text" class="form-control" id="firstName" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Příjmení</label>
                <input type="text" class="form-control" id="lastName" name="last_name" required>
            </div>

            <h3>Vyberte způsob dopravy</h3>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-personal-tab" data-bs-toggle="pill" data-bs-target="#pills-personal" type="button" role="tab" aria-controls="pills-personal" aria-selected="true">
                        Osobní odběr
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill" data-bs-target="#pills-address" type="button" role="tab" aria-controls="pills-address" aria-selected="false">
                        Poslat na adresu
                    </button>
                </li>
            </ul>
            
            <div class="tab-content" id="pills-tabContent">
                <!-- Sekce Osobní odběr -->
                <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                    <input type="hidden" name="delivery_method" value="personal">
                    <button type="submit" class="btn btn-primary mt-3">Odeslat formulář</button>
                </div>

                <!-- Sekce Poslat na adresu -->
                <div class="tab-pane fade" id="pills-address" role="tabpanel" aria-labelledby="pills-address-tab">
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresa</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <input type="hidden" name="delivery_method" value="address">
                    <button type="submit" class="btn btn-primary mt-3">Odeslat formulář</button>
                </div>
            </div>
        </form>
</div>

<h1> Tohle jsem přidal </h1>





</body>

</html>