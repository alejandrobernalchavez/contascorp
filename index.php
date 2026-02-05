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
        <label for="sueldo">Sueldo base</label>
        <input
            type="text"
            id="sueldo"
            name="sueldo"
            inputmode="numeric"
            pattern="[0-9]+(\.[0-9]{1,2})?"
            placeholder="Ej: 600"
            required
        >

        <!-- Pestañas / Periodo -->
        <div class="tabs">
            <button type="submit" name="periodo" value="mensual" class="tab active">
                mensual
            </button>
            <button type="submit" name="periodo" value="quincenal" class="tab">
                quincenal
            </button>
            <button type="submit" name="periodo" value="semanal" class="tab">
                semanal
            </button>
        </div>

    </form>

  </div>
</div>

</body>
</html>
