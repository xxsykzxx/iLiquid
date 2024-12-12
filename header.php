<?php 
    session_start();
?>

<script src="script.js?v=1.0" defer></script>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">MOREX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo activeClass('index.php'); ?>" href="index.php">Index</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo activeClass('detail.php'); ?>" href="detail.php">Detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Dárkové zboží</a>
                    </li>

                    <?php

                        if($_SESSION['loged'] === TRUE){
                            echo '
                                <div class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                        Profil
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Detail</a></li>
                                        <li><a class="dropdown-item" href="#">Link 2</a></li>
                                        <li><a class="dropdown-item" href="loged-out.php?login=false">Odhlásit se</a></li>
                                    </ul>
                                </div>
                            ';
                        }
                        
                    ?>

                </ul>

                
                <?php 
                    // print_r($_SESSION);
                    
                    if ($_SESSION['loged'] == false){
                        echo '<a href="login.php" class="btn btn-primary">Přihlásit se</a>';    
                    } else {
                        echo '<a href="cart.php" class=" mx-2 btn btn-primary">Košík <span id="cart-count" class="badge bg-dark">0</span></a>';
                    }
                     
                
                ?> 

                    
                
            </div>
        </div>
    </nav>