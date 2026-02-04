<?php

// Mostrar errores (solo para desarrollo)
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Validar datos
if (!isset($_POST['sueldo']) || !isset($_POST['periodo'])) {
    header("Location: index.php");
    exit();
}

$sueldo = floatval($_POST['sueldo']);
$periodo = $_POST['periodo'];

// ===============================
// DESCUENTOS FIJOS
// ===============================
$isss = $sueldo * 0.03;
$afp  = $sueldo * 0.0725;

// Sueldo después de ISSS y AFP
$sueldoBaseISR = $sueldo - $isss - $afp;

// ===============================
// CALCULO ISR
// ===============================
$isr = 0;

// Función ISR
function calcularISR($sueldo, $periodo) {

    $isr = 0;

    if ($periodo == "mensual") {

        if ($sueldo <= 550) {
            $isr = 0;

        } elseif ($sueldo <= 895.24) {
            $isr = ($sueldo - 550) * 0.10 + 17.67;

        } elseif ($sueldo <= 2038.10) {
            $isr = ($sueldo - 895.24) * 0.20 + 60;

        } else {
            $isr = ($sueldo - 2038.10) * 0.30 + 288.57;
        }

    } elseif ($periodo == "quincenal") {

        if ($sueldo <= 275) {
            $isr = 0;

        } elseif ($sueldo <= 447.62) {
            $isr = ($sueldo - 275) * 0.10 + 8.83;

        } elseif ($sueldo <= 1019.05) {
            $isr = ($sueldo - 447.62) * 0.20 + 30;

        } else {
            $isr = ($sueldo - 1019.05) * 0.30 + 144.28;
        }

    } elseif ($periodo == "semanal") {

        if ($sueldo <= 137.50) {
            $isr = 0;

        } elseif ($sueldo <= 223.81) {
            $isr = ($sueldo - 137.50) * 0.10 + 4.42;

        } elseif ($sueldo <= 509.52) {
            $isr = ($sueldo - 223.81) * 0.20 + 15;

        } else {
            $isr = ($sueldo - 509.52) * 0.30 + 72.14;
        }
    }

    return $isr;
}

// Calcular ISR
$isr = calcularISR($sueldoBaseISR, $periodo);

// ===============================
// SUELDO LIQUIDO
// ===============================
$sueldoLiquido = $sueldo - $isss - $afp - $isr;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado - ContaScorp</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="container">

    <div class="logo">🦂</div>

    <h1>Resultado</h1>
    <p class="subtitle">Detalle del cálculo</p>

    <div class="resultados">

        <p><strong>Sueldo Base:</strong> $<?= number_format($sueldo,2) ?></p>

        <p><strong>ISSS (3%):</strong> $<?= number_format($isss,2) ?></p>

        <p><strong>AFP (7.25%):</strong> $<?= number_format($afp,2) ?></p>

        <p><strong>ISR:</strong> $<?= number_format($isr,2) ?></p>

        <hr>

        <p><strong>Sueldo Líquido:</strong> 
            <span style="color:green;font-size:18px;">
                $<?= number_format($sueldoLiquido,2) ?>
            </span>
        </p>

    </div>

    <br>

    <a href="index.php">
        <button>⬅ Volver</button>
    </a>

</div>

</body>
</html>