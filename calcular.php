<?php
// ===============================
// VALIDACIÓN
// ===============================
if (!isset($_POST['sueldo'])) {
    header("Location: index.php");
    exit;
}

$sueldoInput = trim($_POST['sueldo']);

if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $sueldoInput)) {
    die("Sueldo inválido");
}

$sueldo = (float)$sueldoInput;
if ($sueldo <= 0) {
    die("Sueldo inválido");
}

// ===============================
// DESCUENTOS BASE
// ===============================

// ISSS
if ($sueldo > 1000) {
    $isss = 30;
    $isssTxt = "ISSS (Tope $30)";
} else {
    $isss = $sueldo * 0.03;
    $isssTxt = "ISSS (3%)";
}

// AFP
$afp = $sueldo * 0.0725;

// Base ISR
$baseISR = $sueldo - $isss - $afp;

// ===============================
// FUNCIÓN ISR OFICIAL
// ===============================
function calcularISR($sueldo, $periodo) {

    if ($periodo === "mensual") {
        if ($sueldo <= 550) return 0;
        if ($sueldo <= 895.24) return ($sueldo - 550) * 0.10 + 17.67;
        if ($sueldo <= 2038.10) return ($sueldo - 895.24) * 0.20 + 60.00;
        return ($sueldo - 2038.10) * 0.30 + 288.57;
    }

    if ($periodo === "quincenal") {
        if ($sueldo <= 275) return 0;
        if ($sueldo <= 447.62) return ($sueldo - 275) * 0.10 + 8.83;
        if ($sueldo <= 1019.05) return ($sueldo - 447.62) * 0.20 + 30.00;
        return ($sueldo - 1019.05) * 0.30 + 144.28;
    }

    if ($periodo === "semanal") {
        if ($sueldo <= 137.50) return 0;
        if ($sueldo <= 223.81) return ($sueldo - 137.50) * 0.10 + 4.42;
        if ($sueldo <= 509.52) return ($sueldo - 223.81) * 0.20 + 15.00;
        return ($sueldo - 509.52) * 0.30 + 72.14;
    }

    return 0;
}

// ===============================
// CÁLCULOS POR PERÍODO
// ===============================
$isrMensual   = calcularISR($baseISR, "mensual");
$isrQuincenal = calcularISR($baseISR / 2, "quincenal");
$isrSemanal   = calcularISR($baseISR / 4, "semanal");

$liqMensual   = $sueldo - $isss - $afp - $isrMensual;
$liqQuincenal = ($sueldo / 2) - ($isss / 2) - ($afp / 2) - $isrQuincenal;
$liqSemanal   = ($sueldo / 4) - ($isss / 4) - ($afp / 4) - $isrSemanal;
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Resultado - ContaScorp</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="diseño.css">
</head>
<body>

<div class="wrapper">
<div class="container">

<h1>CONTASCORP</h1>

<div class="tabs">
    <div class="tab active" onclick="mostrar('mensual', this)">mensual</div>
    <div class="tab" onclick="mostrar('quincenal', this)">quincenal</div>
    <div class="tab" onclick="mostrar('semanal', this)">semanal</div>
</div>

<table class="tabla-resultados">

<tbody id="mensual">
<tr><td>Sueldo base</td><td>$<?= number_format($sueldo,2) ?></td></tr>
<tr><td><?= $isssTxt ?></td><td>$<?= number_format($isss,2) ?></td></tr>
<tr><td>AFP (7.25%)</td><td>$<?= number_format($afp,2) ?></td></tr>
<tr><td>ISR</td><td>$<?= number_format($isrMensual,2) ?></td></tr>
<tr class="total"><td>Sueldo líquido mensual</td><td>$<?= number_format($liqMensual,2) ?></td></tr>
</tbody>

<tbody id="quincenal" style="display:none">
<tr><td>ISR quincenal</td><td>$<?= number_format($isrQuincenal,2) ?></td></tr>
<tr class="total"><td>Sueldo líquido quincenal</td><td>$<?= number_format($liqQuincenal,2) ?></td></tr>
</tbody>

<tbody id="semanal" style="display:none">
<tr><td>ISR semanal</td><td>$<?= number_format($isrSemanal,2) ?></td></tr>
<tr class="total"><td>Sueldo líquido semanal</td><td>$<?= number_format($liqSemanal,2) ?></td></tr>
</tbody>

</table>

<br>
<a href="index.php"><button>← Volver</button></a>

</div>
</div>

<script>
function mostrar(id, el) {
    document.querySelectorAll("tbody").forEach(t => t.style.display = "none");
    document.getElementById(id).style.display = "table-row-group";
    document.querySelectorAll(".tab").forEach(t => t.classList.remove("active"));
    el.classList.add("active");
}
</script>

</body>
</html>
