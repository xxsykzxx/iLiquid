<?php

// Soubor pro připojení k DB
include_once 'db_connect.php';


function GetStoreCards(){
    
    // Připojení k DB
    $conn = DbConnection();

    //$conn->real_escape_string(); // Ošetření názvu tabulky
    $sql = "
        SELECT 
            storecards.Image as Image,
            storecards.Code as Code,
            storecards.Name AS Nazev, 
            storecards.Brand AS Brand, 
        GROUP_CONCAT(CONCAT(category.Flavour) ORDER BY category.id SEPARATOR ', ') AS Flavour
        FROM storecards
        LEFT JOIN category
            ON storecards.id = category.StoreCard_id
        GROUP BY storecards.id
    
    ";

    $result = $conn->query($sql);

   // Zkontrolovat, zda dotaz proběhl úspěšně
    if ($result === false) {
        // Dotaz selhal, zobrazit chybovou hlášku
        echo "Chyba SQL: " . $conn->error;
    } 
    else {
        if ($result->num_rows > 0) {
    
            // Zobrazení jednotlivých řádků
            while ($row = $result->fetch_assoc()) {

                $parameters = explode(',', $row['Flavour'] ?? '');

                echo '<div class="col-6 col-sm-4 mb-5">';
                    echo '<div class="p-3 d-flex flex-column align-items-center border">';
                        echo '<a href="detail.php?code='.htmlspecialchars($row["Code"]).'" class="d-flex justify-content-center" >';
                            echo '<img src=".\Pictures\\'.htmlspecialchars($row["Image"]).'" alt="obrazek" class="img-fluid mb-2" style="width:60%">';
                        echo '</a>';
                        echo '<h5 class="text-center">' . htmlspecialchars($row["Nazev"]) . '</h5>';
                        echo '<p>' . htmlspecialchars($row["Brand"]) . '</p>';
                        echo '<p class="text-center">';


                        if(!empty($parameters)){
                            foreach($parameters as $prichut){
                                echo '<span class="badge bg-dark mx-1">' . htmlspecialchars($prichut) . '</span>';
                            }
                        }

                        echo '</p>';

                        if ($_SESSION['loged'] == True){
                            echo '<button class="add-to-cart btn btn-primary px-5" data-product-id="'.htmlspecialchars($row["Code"]).'">Přidat</button>';
                        }

                    echo '</div>';
                echo '</div>';
            } 
        }   
        else {
            echo "Tabulka je prázdná nebo neexistuje.";
        }
        
    }



    // Uzavření připojení
    $conn->close();
    
}

function activeClass($page){
    $aktualniStranka = basename($_SERVER['PHP_SELF']);

    if ($aktualniStranka === $page){
        $vysledek = 'active';
    } else {
        $vysledek = '';
    }

    return $vysledek;
}

function GetCode($code) {
    if(isset($code)){
        return $code;
    }
}

function GetDetail($code){
    // Připojení k DB
    $conn = DbConnection();

    //$conn->real_escape_string(); // Ošetření názvu tabulky
    $sql = "
        SELECT 
            storecards.Image as Image,
            storecards.Code as Code,
            storecards.Name AS Nazev, 
            storecards.Brand AS Brand, 
            storecards.Description as Popis,
        GROUP_CONCAT(CONCAT(category.Flavour) ORDER BY category.id SEPARATOR ', ') AS Flavour
        FROM storecards
        LEFT JOIN category
            ON storecards.id = category.StoreCard_id
        WHERE storecards.code = '$code'
        GROUP BY storecards.id
        
    ";

    $result = $conn->query($sql);

   // Zkontrolovat, zda dotaz proběhl úspěšně
    if ($result === false) {
        // Dotaz selhal, zobrazit chybovou hlášku
        echo "Chyba SQL: " . $conn->error;
    } 
    else {
        if ($result->num_rows > 0) {
    
            // Zobrazení jednotlivých řádků
            while ($row = $result->fetch_assoc()) {

                $parameters = explode(',', $row['Flavour'] ?? '');

                echo '<div class="container">';
                    echo '<div class="row flex-lg-row-reverse align-items-center d-flex justify-content-center bg-light">';
                        echo '<div class="col-10 mx-auto col-sm-8 col-lg-6">';
                            echo '<img src=".\Pictures\\'.htmlspecialchars($row["Image"]).'" class="d-block mx-lg-auto img-fluid" alt="" loading="lazy">';
                        echo '</div>';

                        echo '<div class="col-lg-6 col-12 d-flex flex-column align-items-center text-center">';
                            echo '<h2 class="fw-bold display-5">'.htmlspecialchars($row["Nazev"]).'</h2>';

                            echo '<p class="text-center">';


                                if(!empty($parameters)){
                                    foreach($parameters as $prichut){
                                        echo '<span class="badge bg-success mx-1">' . htmlspecialchars($prichut) . '</span>';
                                    }
                                }

                                echo '</p>';

                            echo '<p>'.htmlspecialchars($row["Popis"]).'</p>';

                            echo '<div class="lc-block d-grid gap-2 d-md-flex justify-content-center">';
                                echo '<a class="btn btn-primary px-5" href="#" role="button">Přidat</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';

            } 
        }   
        else {
            echo "Tabulka je prázdná nebo neexistuje.";
        }
    }

    // Uzavření připojení
    $conn->close();

    
}

function DangerAllert($loged){
    if($loged == 'false'){
        echo '<div class="container d-flex justify-content-center">';
            echo '<div class="col-sm-6 col-10 text-center">';
                echo '<div class="alert alert-danger">';
                    echo '<strong>Pozor!</strong> <u>Přihlašovací jméno</u> nebo <u>heslo</u> není správné.';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    
}

function getCartItemCount() {
    // Zkontrolujte, zda existuje session košíku
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        // Sečte všechny hodnoty v poli
        return array_sum($_SESSION['cart']);
    }
    return 0; // Pokud košík neexistuje nebo je prázdný
}


function ShowCart(){

    //echo $_SESSION['user'];

    // Připojení k DB
    $conn = DbConnection();
    $user = $_SESSION['user'];

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // Pokud je košík prázdný
    if (empty($cart)) {
        echo "<p>Košík je prázdný.</p>";
        exit;
    }

    // Získání informací o produktech z databáze
    $productIds = array_keys($cart);
    //print_r($productIds);
    $placeholders = implode(',', array_fill(0, count($productIds), '?')); // Vrátí dotazníky kolik je v Array např.: ?,?,? => 0001, 0002, 0003

    // Vytvoření dotazu
    $sql = "
        SELECT Image, Code, Brand, Name, Price
        FROM storecards 
        JOIN persons ON persons.nick = ?
        WHERE code IN ($placeholders)
    ";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Dynamické vázání parametrů
        $types = 's' . str_repeat('i', count($productIds)); // Typy parametrů (i = integer)
        $stmt->bind_param($types, $user, ...$productIds);

        // Spuštění dotazu
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $products = $result->fetch_all(MYSQLI_ASSOC);
            
            foreach ($products as $product) {
                $image = $product['Image'];
                $code = $product['Code'];
                $brand = $product['Brand'];
                $name = $product['Name'];
                $quantity = $cart[$code];
                $price = $product['Price'] * $quantity;

                echo '
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src=".\Pictures\\'.htmlspecialchars($image).'"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>'.$name.'</h5>
                          <p class="small mb-0">'.$brand.'</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">'.$quantity.'ks</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">'.$price.' Kč</h5>
                        </div>
                        <a href="#!" style="color: #cecece;">koš</a>
                      </div>
                    </div>
                  </div>
                </div>
                ';







                //echo $image . ' ' . $brand . ' ' . $name . ' ' . $quantity;
                //echo '<br>';
            }

        } else {
            die("Chyba při vykonání dotazu: " . $stmt->error);
        }
    } else {
        die("Chyba při přípravě dotazu: " . $mysqli->error);
    }
}

function TotalPrice(){

    //echo $_SESSION['user'];

    // Připojení k DB
    $conn = DbConnection();
    $user = $_SESSION['user'];

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // Získání informací o produktech z databáze
    $productIds = array_keys($cart);
    //print_r($productIds);
    $placeholders = implode(',', array_fill(0, count($productIds), '?')); // Vrátí dotazníky kolik je v Array např.: ?,?,? => 0001, 0002, 0003

    // Vytvoření dotazu
    $sql = "
        SELECT Image, Code, Brand, Name, Price
        FROM storecards 
        JOIN persons ON persons.nick = ?
        WHERE code IN ($placeholders)
    ";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Dynamické vázání parametrů
        $types = 's' . str_repeat('i', count($productIds)); // Typy parametrů (i = integer)
        $stmt->bind_param($types, $user, ...$productIds);

        // Spuštění dotazu
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $products = $result->fetch_all(MYSQLI_ASSOC);
            
            foreach ($products as $product) {
                $image = $product['Image'];
                $code = $product['Code'];
                $brand = $product['Brand'];
                $name = $product['Name'];
                $quantity = $cart[$code];
                $price = $product['Price'] * $quantity;
                $totalPrice += $price;
            }

            return $totalPrice;

        } else {
            die("Chyba při vykonání dotazu: " . $stmt->error);
        }
    } else {
        die("Chyba při přípravě dotazu: " . $mysqli->error);
    }
}

function YourName($nick){

    // Připojení k databázi
    $conn = DbConnection();

    // Příprava SQL dotazu
    $sql = "SELECT FirstName, SurName FROM persons WHERE Nick = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nick); // 's' znamená, že očekáváme řetězec
        $stmt->execute();
        $result = $stmt->get_result();

        // Kontrola výsledků
        if ($result->num_rows > 0) {
            // Načtení dat
            while ($row = $result->fetch_assoc()) {
                $jmeno = $row['FirstName'] . ' ' . $row['SurName'];
            }
            $stmt->close();
            $conn->close();
            return $jmeno;
        } else {
            $stmt->close();
            $conn->close();
            return 'chyba';
        }
    } else {
        $conn->close();
        return 'chyba2';
    }
    
    
}

function YourEmail($nick){

    // Připojení k databázi
    $conn = DbConnection();

    // Příprava SQL dotazu
    $sql = "SELECT Email FROM persons WHERE Nick = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nick); // 's' znamená, že očekáváme řetězec
        $stmt->execute();
        $result = $stmt->get_result();

        // Kontrola výsledků
        if ($result->num_rows > 0) {
            // Načtení dat
            while ($row = $result->fetch_assoc()) {
                $email = $row['Email'];
            }
            $stmt->close();
            $conn->close();
            return $email;
        } else {
            $stmt->close();
            $conn->close();
            return 'chyba';
        }
    } else {
        $conn->close();
        return 'chyba2';
    }
    
    
}

function YourPhone($nick){

    // Připojení k databázi
    $conn = DbConnection();

    // Příprava SQL dotazu
    $sql = "SELECT Phone FROM persons WHERE Nick = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nick); // 's' znamená, že očekáváme řetězec
        $stmt->execute();
        $result = $stmt->get_result();

        // Kontrola výsledků
        if ($result->num_rows > 0) {
            // Načtení dat
            while ($row = $result->fetch_assoc()) {
                $phone = $row['Phone'];
            }
            $stmt->close();
            $conn->close();
            return $phone;
        } else {
            $stmt->close();
            $conn->close();
            return 'chyba';
        }
    } else {
        $conn->close();
        return 'chyba2';
    }
    
    
}

function YourSweet($nick){

    // Připojení k databázi
    $conn = DbConnection();

    // Příprava SQL dotazu
    $sql = "SELECT Sweet FROM persons WHERE Nick = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nick); // 's' znamená, že očekáváme řetězec
        $stmt->execute();
        $result = $stmt->get_result();

        // Kontrola výsledků
        if ($result->num_rows > 0) {
            // Načtení dat
            while ($row = $result->fetch_assoc()) {
                $sweet = $row['Sweet'];
            }
            $stmt->close();
            $conn->close();
            return $sweet;
        } else {
            $stmt->close();
            $conn->close();
            return 'chyba';
        }
    } else {
        $conn->close();
        return 'chyba2';
    }
    
    
}

function YourNicotine($nick){

    // Připojení k databázi
    $conn = DbConnection();

    // Příprava SQL dotazu
    $sql = "SELECT Nicotine FROM persons WHERE Nick = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nick); // 's' znamená, že očekáváme řetězec
        $stmt->execute();
        $result = $stmt->get_result();

        // Kontrola výsledků
        if ($result->num_rows > 0) {
            // Načtení dat
            while ($row = $result->fetch_assoc()) {
                $nicotine = $row['Nicotine'];
            }
            $stmt->close();
            $conn->close();
            return $nicotine;
        } else {
            $stmt->close();
            $conn->close();
            return 'chyba';
        }
    } else {
        $conn->close();
        return 'chyba2';
    }
    
    
}

function YourPrice($nick){

    // Připojení k databázi
    $conn = DbConnection();

    // Příprava SQL dotazu
    $sql = "SELECT Price FROM persons WHERE Nick = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nick); // 's' znamená, že očekáváme řetězec
        $stmt->execute();
        $result = $stmt->get_result();

        // Kontrola výsledků
        if ($result->num_rows > 0) {
            // Načtení dat
            while ($row = $result->fetch_assoc()) {
                $price = $row['Price'];
            }
            $stmt->close();
            $conn->close();
            return $price;
        } else {
            $stmt->close();
            $conn->close();
            return 'chyba';
        }
    } else {
        $conn->close();
        return 'chyba2';
    }
    
    
}

function YourDelivery($nick){

    // Připojení k databázi
    $conn = DbConnection();

    // Příprava SQL dotazu
    $sql = "SELECT Delivery FROM persons WHERE Nick = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nick); // 's' znamená, že očekáváme řetězec
        $stmt->execute();
        $result = $stmt->get_result();

        // Kontrola výsledků
        if ($result->num_rows > 0) {
            // Načtení dat
            while ($row = $result->fetch_assoc()) {
                $delivery = $row['Delivery'];
            }
            $stmt->close();
            $conn->close();
            return $delivery;
        } else {
            $stmt->close();
            $conn->close();
            return 'chyba';
        }
    } else {
        $conn->close();
        return 'chyba2';
    }
    
    
}

function AddRegistration($firstname, $surname, $nick, $password, $phone, $email){

    $conn = DbConnection();
    
    // Předpřipravený dotaz
    $stmt = $conn->prepare("INSERT INTO persons (FirstName, SurName, Nick, Password, Phone, Email, Sweet, Nicotine, Price, Delivery) VALUES (?, ?, ?, ?, ?, ?, 0, 0, 0, 0)");

    // Propojení parametrů
    $stmt->bind_param("ssssis", $firstname, $surname, $nick, $password, $phone, $email);

    // Provedení dotazu
    if ($stmt->execute()) {
        //echo "Nový záznam byl úspěšně přidán";
        return TRUE;
        exit;
    } else {
        echo "Chyba: " . $stmt->error;
        return FALSE;
        exit;
    }
}

function SelectIdRegistration($nickname){
    $conn = DbConnection();

    $stmt = $conn->prepare("SELECT ID FROM persons Where Nick = ?");

    $stmt->bind_param("s", $nickname);

    // Provedení dotazu
    if ($stmt->execute()) {
        
        // Získání výsledku
        $result = $stmt->get_result();

        // Zpracování výsledku
        if ($row = $result->fetch_assoc()) {
           return $row['ID'];
        } else {
            return 0;
        }
        exit;
    } else {
        echo "Chyba: " . $stmt->error;
        //return FALSE;
        exit;
    }

}

function AddResidence($address, $city, $psc,$person_id){

    $conn = DbConnection();
    
    // Předpřipravený dotaz
    $stmt = $conn->prepare("INSERT INTO personoffices (Name, Address, City, PSC, Person_id) VALUES ('', ?, ?, ?, ?)");

    // Propojení parametrů
    $stmt->bind_param("ssii", $address, $city, $psc, $person_id);

    // Provedení dotazu
    if ($stmt->execute()) {
        //echo "Nový záznam byl úspěšně přidán";
        return TRUE;
        exit;
    } else {
        echo "Chyba: " . $stmt->error;
        return FALSE;
        exit;
    }
}
