<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ContaScorp - Calculadora de Sueldo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <div class="contenedor">

        <!-- Logo / Título -->
        <header>
            <h1>🦂 ContaScorp</h1>
            <p>Calculadora de Sueldo Líquido</p>
        </header>

        <!-- Formulario -->
        <form action="calcular.php" method="POST" class="formulario">

            <!-- Sueldo -->
            <div class="campo">
                <label for="sueldo">Sueldo Base ($):</label>
                <input 
                    type="number" 
                    name="sueldo" 
                    id="sueldo" 
                    step="0.01"
                    required
                    placeholder="Ej: 600.00"
                >
            </div>

            <!-- Tipo de pago -->
            <div class="campo">
                <label>Periodo de Pago:</label>

                <select name="periodo" required>
                    <option value="">Seleccione</option>
                    <option value="semanal">Semanal</option>
                    <option value="quincenal">Quincenal</option>
                    <option value="mensual">Mensual</option>
                </select>
            </div>

            <!-- Botón -->
            <button type="submit">Calcular Sueldo</button>

        </form>

        <!-- Pie -->
        <footer>
            <p>© 2026 ContaScorp - Todos los derechos reservados</p>
        </footer>

    </div>

</body>
</html>