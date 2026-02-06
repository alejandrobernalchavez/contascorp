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

        <!-- LOGO ALACRÁN -->
        <div class="logo">
            <svg viewBox="0 0 512 512" class="scorpion" xmlns="http://www.w3.org/2000/svg">
                <path d="M256 40c-40 0-72 32-72 72v40c0 22-18 40-40 40s-40-18-40-40v-24c0-13-11-24-24-24s-24 11-24 24v24c0 48 40 88 88 88 18 0 32 14 32 32s-14 32-32 32H96c-26 0-48 22-48 48s22 48 48 48h64c35 0 64 29 64 64v24c0 13 11 24 24 24s24-11 24-24v-24c0-35 29-64 64-64h64c26 0 48-22 48-48s-22-48-48-48h-48c-18 0-32-14-32-32s14-32 32-32c48 0 88-40 88-88v-24c0-13-11-24-24-24s-24 11-24 24v24c0 22-18 40-40 40s-40-18-40-40v-40c0-40-32-72-72-72z"/>
            </svg>
        </div>

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
