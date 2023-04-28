<!-- <?php
$n1 = 1;
$n2 = 50;
$total = $n1 + $n2;
echo "Total: ", $total, " registros.";
?> -->
<?php
// Verifica se os parâmetros via GET estão setados e não estão vazios.
   if ( isset($_GET['peso']) && !empty($_GET['peso']) &&
   isset($_GET['altura']) && !empty($_GET['altura']) ) {
        // $peso = $_GET['peso'];
        // echo "<br />" .$_GET['peso'].  "<br />";
        $peso = $_GET['peso'];
        // $peso = str_replace(",", ".", $_GET['peso']);
        $altura = str_replace(",", ".", $_GET['altura']);
        // echo $altura;
        if (!is_numeric($peso)) {
            $erro_peso = "O peso deve ser um número!";
        }
        if (!is_numeric($altura)) { 
            $erro_altura = "A altura deve ser um número!";
        }

        if (is_numeric($peso) && is_numeric($altura)) {
            $imc = $peso / pow($altura, 2); // $altura * $altura
            if ($imc < 18.5) {
                $msn = "Abaixo do peso";
                $class = "alert-danger";
            } elseif ($imc >= 18.5 && $imc <= 24.9) {
                $msn = "Peso normal";
                $class = "alert-success";
            } elseif ($imc > 25 && $imc <= 29.9) {
                    $msn = "Sobrepeso";
                    $class = "alert-warning";
            } elseif ($imc >= 30 && $imc <= 34.9) {
                $msn = "Obesidade Grau I";
                $class = "alert-danger";
            } elseif ($imc >= 35 && $imc <= 39.9) {
                $msn = "Obesidade Grau II (Severa)";
                $class = "alert-danger";
            } else {
                $msn = "Obesidade Grau III (Mórbida)";
                $class = "alert-danger";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <!-- <script src="/assets/js/js.js"></script> -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-primary p-5">
    <div class="container border border-2 rounded-4 p-4 bg-white" style="max-width: 400px;">
        <form action="" method="get">
        <!-- fs-10 estilizar a fonte -->
            <h1 class="mb-4 text-center fs-2">Calculadora de IMC</h1>
            <div class="mb-3">
                <label for="peso" class="form-label fw-bold">Peso</label>
                <input type="text" name="peso" class="form-control form-control-lg bg-light" required>
                <?php if(isset($erro_peso)) { echo "<span
                    class=\"alert alert-danger p-1 mt-3 d-block\">
                    $erro_peso</span>"; } ?>
            </div>
            <div class="mb-3">
                <label for="altura" class="form-label fw-bold">Altura</label>
                <input type="text" name="altura" class="form-control form-control-lg  bg-light" required>
                <?php if(isset($erro_altura)) { echo "<span
                    class=\"alert alert-danger p-1 mt-3 d-block\">
                    $erro_altura</span>"; } ?>
            </div>
            <div class="d-grid mb-4">
                <input type="submit" value="Calcular" class="btn btn-primary btn-lg">
            </div>
        </form>
        <?php if(isset($imc)) { ?>
            <div class="alert text-center fs-4 <?php echo $class; ?>">
                <span class="d-block fw-bold">IMC: <?php echo round($imc, 2); ?></span>
                <span><?php echo $msn; ?></span>
            </div>
        <?php  } ?>
    </div>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>