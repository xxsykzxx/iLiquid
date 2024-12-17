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

<br>
<br>
<br>

<!-- Košík a jeho položky -->
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

                <div class="col-lg-7">
                    <h4 class="mb-3"><a href="#!" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Souhrn košíku:</a></h4>
                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="mb-0">V košíku máš dohromady: <?php echo getCartItemCount(); ?> liquidy</h5>
                        </div>
                    </div>

                    <?php

                        ShowCart();

                    ?>

                </div>

              
              <div class="col-lg-5">

                <div class="card bg-dark text-white rounded-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Tvůj detail</h5>
                    </div>

                    <form action="submit_order.php" method="post" class="mt-4">
                        <div data-mdb-input-init class="form-outline form-white mb-3">
                            <label class="form-label" for="typeExp">Jméno a příjmení:</label>
                            <label class="form-control form-control-lg"><?php echo(YourName($_SESSION['user'])) ; ?></label>
                        </div>

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <label class="form-label" for="typeExp">Email:</label>
                            <label class="form-control form-control-lg"><?php echo(YourEmail($_SESSION['user'])) ; ?></label>
                        </div>

                        <div data-mdb-input-init class="form-outline form-white mb-3">
                            <label class="form-label" for="typeExp">Telefon:</label>
                            <label class="form-control form-control-lg"><?php echo(YourPhone($_SESSION['user'])) ; ?></label>
                            
                        </div>

                        <div class="row mb-4">
                            <div class="col-4">
                                <div data-mdb-input-init class="form-outline form-white">

                                    <label class="form-label" for="typeExp">Příchuť:</label>
                                    <label class="form-control form-control-lg"><?php echo(YourSweet($_SESSION['user'])) ; ?>%</label>
                                    
                                </div>
                            </div>
                            <div class="col-4">
                                <div data-mdb-input-init class="form-outline form-white">

                                    <label class="form-label" for="typeExp">Nikotin:</label>
                                    <label class="form-control form-control-lg"><?php echo(YourNicotine($_SESSION['user'])) ; ?> mg</label>

                                </div>
                            </div>

                            <div class="col-4">
                                <div data-mdb-input-init class="form-outline form-white">

                                    <label class="form-label" for="typeExp">Cena / ks:</label>
                                    <label class="form-control form-control-lg"><?php echo(YourPrice($_SESSION['user'])) ; ?> Kč</label>

                                </div>
                            </div>

                        </div>

                    


                      <hr class="my-4">

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Celkem:</p>
                        <p class="mb-2"><?php echo TotalPrice(); ?> Kč</p>
                      </div>

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Doprava:</p>
                        <p class="mb-2"><?php echo YourDelivery($_SESSION['user']); ?> Kč</p>
                      </div>

                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-2">Dohromady:</p>
                        <p class="mb-2"><?php echo TotalPrice() + YourDelivery($_SESSION['user']); ?> Kč</p>
                      </div>


                      <button type='submit' value='dokoncit' class="btn btn-light btn-lg w-100 d-flex justify-content-between">
                          <span><?php echo TotalPrice() + YourDelivery($_SESSION['user']); ?> Kč</span>
                          <span>Dokončit</span>
                      </button>

                    </form>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>




</body>

</html>