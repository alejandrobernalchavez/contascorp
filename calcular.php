<?php
// ===============================
// VALIDACIÓN
// ===============================
if (!isset($_POST['sueldo'])) {
    header("Location: index.php");
    exit;
}

$sueldoInput = trim($_POST['sueldo']);

// Validación estricta: solo números y hasta 2 decimales
if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $sueldoInput)) {
    die("Error: Sueldo inválido");
}

$sueldo = (float)$sueldoInput;

if ($sueldo <= 0) {
    die("Error: El sueldo debe ser mayor a cero");
}

// ===============================
// DESCUENTOS
// ===============================
$isss = ($sueldo > 1000) ? 30 : $sueldo * 0.03;
$afp  = $sueldo * 0.0725;

$sueldoBase = $sueldo - $isss - $afp;

// ===============================
// ISR MENSUAL (base)
// ===============================
function calcularISR($sueldo) {
    if ($sueldo <= 550) {
        return 0;
    } elseif ($sueldo <= 895.24) {
        return ($sueldo - 550) * 0.10 + 17.67;
    } elseif ($sueldo <= 2038.10) {
        return ($sueldo - 895.24) * 0.20 + 60;
    } else {
        return ($sueldo - 2038.10) * 0.30 + 288.57;
    }
}

$isrMensual = calcularISR($sueldoBase);

$mensual   = $sueldo - $isss - $afp - $isrMensual;
$quincenal = $mensual / 2;
$semanal   = $mensual / 4;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado - ContaScorp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS CORRECTAMENTE CARGADO -->
    <link rel="stylesheet" href="diseño.css">
</head>
<body>

<div class="wrapper">
<div class="container">

    <h1>CONTASCORP</h1>

    <!-- Pestañas -->
    <div class="tabs">
        <div class="tab active" onclick="mostrar('mensual')">mensual</div>
        <div class="tab" onclick="mostrar('quincenal')">quincenal</div>
        <div class="tab" onclick="mostrar('semanal')">semanal</div>
    </div>

    <!-- TABLA -->
    <table class="tabla-resultados">
        <tbody id="mensual">
            <tr><td>Sueldo líquido mensual</td><td>$<?= number_format($mensual, 2) ?></td></tr>
        </tbody>
        <tbody id="quincenal" style="display:none">
            <tr><td>Sueldo líquido quincenal</td><td>$<?= number_format($quincenal, 2) ?></td></tr>
        </tbody>
        <tbody id="semanal" style="display:none">
            <tr><td>Sueldo líquido semanal</td><td>$<?= number_format($semanal, 2) ?></td></tr>
        </tbody>
    </table>

    <br>
    <a href="index.php"><button>⬅ Volver</button></a>

</div>
</div>

<script>
function mostrar(tipo) {
    document.querySelectorAll("tbody").forEach(t => t.style.display = "none");
    document.getElementById(tipo).style.display = "table-row-group";

    document.querySelectorAll(".tab").forEach(t => t.classList.remove("active"));
    event.target.classList.add("active");
}
</script>

</body>
</html>
