<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ContaScorp</title>

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="wrapper">
    <div class="container">

        <!-- Título -->
        <h1>CONTASCORP</h1>

        <!-- Formulario -->
        <form action="calcular.php" method="POST" autocomplete="off">

            <!-- Sueldo -->
            <label for="sueldo">Sueldo base ($)</label>
            <input
                type="text"
                id="sueldo"
                name="sueldo"
                placeholder="Ej: 600"
                required
                inputmode="decimal"
                pattern="[0-9]+(\.[0-9]{1,2})?"
                title="Solo números. No letras, no símbolos."
                oninput="this.value = this.value
                    .replace(/[^0-9.]/g,'')
                    .replace(/^\.|(\..*)\./g,'$1')"
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
