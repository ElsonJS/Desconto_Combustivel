<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="https://img.icons8.com/color/32/null/gas-station.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <title>EJS Combustíveis</title>

        <style>
            body {
                background-image: url(./img/fundo.jpg);
            }

            .container-sm {
                position: relative;
                display: flex;
                text-align: center;
                justify-content: center;
                width: 40%;
            }

            .g-3 {
                position: relative;
                justify-content: center;
                background-color: #F3FC08;
                margin-top: 100px;
                color: #030303;
                border: 1px solid #0B11C1;
                border-radius: 10px;
                width: 100%;
            }

            .form-label {
                position: relative;
                left: -18px;
                font-weight: bold;
            }

            .col-12 {
                padding: 10px;
            }

            .btn-primary {
                font-weight: bold;
                background-color: #030782;
                border: 1px solid #F3FC08;
            }

            .container-lg {
                display: flex;
                justify-content: center;
                text-align: center;
                background-color: #0C7F04;
                margin-top: 50px;
                padding: 20px;
                font-weight: bold;
                border-radius: 10px;
                border: 1px solid #0B11C1;
                color: #fff;
                width: 38%;   
            }

        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="container-sm">
                <form method="post" action="" class="row g-3">
                    <h1>EJS Combustíveis</h1>
                    <div class="col-4">
                        <label for="litros" class="form-label">Quantos litros?</label>
                        <input type="number" class="form-control" id="litros" name="litros" min="1" required>
                    </div>
                    <div class="col-4">
                        <label for="tipo" class="form-label">Combustível:</label>
                        <select id="tipo" class="form-select" name="tipo" required>
                            <option value="A">Álcool</option>
                            <option value="G">Gasolina</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" value="Calcular">
                    </div>
                </form>
            </div>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $litros = floatval($_POST["litros"]);
                    $tipo = $_POST["tipo"];
                    $preco_gasolina = 3.30;
                    $preco_alcool = 2.90;

                    if ($tipo == "A") {
                        if ($litros <= 20) {
                            $desconto = $litros * 0.03;
                        } else {
                            $desconto = $litros * 0.05;
                        }
                        $preco_final = ($litros * $preco_alcool) - $desconto;
                        $mensagem = "O valor a ser pago pelo cliente é: R$ " . number_format($preco_final, 2, ",", ".");
                    } else {
                        if ($litros <= 20) {
                            $desconto = $litros * 0.04;
                        } else {
                            $desconto = $litros * 0.06;
                        }
                        $preco_final = ($litros * $preco_gasolina) - $desconto;
                        $mensagem = "O valor a ser pago pelo cliente é: R$ " . number_format($preco_final, 2, ",", ".");
                    }

                    echo '<div class="container-lg">' . $mensagem . '</div>';
                    header("Refresh:15");
                }
            ?>
        </div>        
    </body>
</html>