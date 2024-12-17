<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Pills Form with Name</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validateForm(event) {
            const activeTab = document.querySelector('.nav-link.active').id;
            if (activeTab === 'pills-address-tab') {
                const addressInput = document.getElementById('address');
                if (!addressInput.value.trim()) {
                    event.preventDefault();
                    alert('Vyplňte adresu pro doručení.');
                }
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2>Vyplňte své údaje</h2>
        <!-- Formulář pro jméno a příjmení -->
        <form id="mainForm" action="submit.php" method="POST" onsubmit="validateForm(event)">
            <div class="mb-3">
                <label for="firstName" class="form-label">Jméno</label>
                <input type="text" class="form-control" id="firstName" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Příjmení</label>
                <input type="text" class="form-control" id="lastName" name="last_name" required>
            </div>

            <h3 class="text-center">Vyberte způsob dopravy</h3>
            <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-white bg-success" id="pills-personal-tab" data-bs-toggle="pill" data-bs-target="#pills-personal" type="button" role="tab" aria-controls="pills-personal" aria-selected="true">
                        Osobní odběr
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white bg-success" id="pills-address-tab" data-bs-toggle="pill" data-bs-target="#pills-address" type="button" role="tab" aria-controls="pills-address" aria-selected="false">
                        Poslat na adresu
                    </button>
                </li>
            </ul>
            
            <div class="tab-content" id="pills-tabContent">
                <!-- Sekce Osobní odběr -->
                <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                    <input type="hidden" name="delivery_method" value="personal">
                    <button type="submit" class="btn btn-success mt-3">Odeslat formulář</button>
                </div>

                <!-- Sekce Poslat na adresu -->
                <div class="tab-pane fade" id="pills-address" role="tabpanel" aria-labelledby="pills-address-tab">
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresa</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <input type="hidden" name="delivery_method" value="address">
                    <button type="submit" class="btn btn-success mt-3">Odeslat formulář</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
