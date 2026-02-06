<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ContaScorp</title>

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos -->
    <link rel="stylesheet" href="diseño.css">
</head>
<body>

<div class="wrapper">
    <div class="container">

        <!-- Título -->
        <h1>CONTASCORP</h1>

        <!-- Formulario -->
        <form action="calcular.php" method="POST">

            <!-- Sueldo -->
            <label for="sueldo">Sueldo base ($)</label>
            <input
                type="text"
                id="sueldo"
                name="sueldo"
                inputmode="decimal"
                pattern="[0-9]+(\.[0-9]{1,2})?"
                placeholder="Ej: 600"
                title="Solo números, sin letras ni símbolos"
                required
            >

            <!-- Botón Calcular -->
            <button type="submit">
                CALCULAR
            </button>

        </form>

    </div>
</div>

</body>
</html>
