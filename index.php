<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ContaScorp</title>

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos -->
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="container">

    <!-- Logo -->
    <div class="logo">🦂</div>

    <!-- Título -->
    <h1>ContaScorp</h1>
    <p class="subtitle">Calculadora de Sueldo Líquido</p>

    <!-- Formulario -->
    <form action="calcular.php" method="POST">

        <!-- Sueldo -->
        <label for="sueldo">Sueldo Base ($)</label>
        <input 
            type="number" 
            id="sueldo"
            name="sueldo"
            step="0.01"
            required 
            placeholder="Ej: 600.00"
        >

        <!-- Periodo -->
        <label for="periodo">Periodo de Pago</label>
        <select id="periodo" name="periodo" required>
            <option value="">Seleccione</option>
            <option value="mensual">Mensual</option>
            <option value="quincenal">Quincenal</option>
            <option value="semanal">Semanal</option>
        </select>

        <!-- Botón -->
        <button type="submit">
            Calcular Sueldo
        </button>

    </form>

    <!-- Footer -->
    <div class="footer">
        © 2026 ContaScorp - Todos los derechos reservados
    </div>

</div>

</body>
</html>