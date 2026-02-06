* {
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #1e1e1e;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    background: #bfbfbf;
    padding: 30px;
    border-radius: 15px;
    width: 350px;
    text-align: center;
}

.titulo {
    color: white;
    background: #1b5c77;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    font-size: 16px;
}

.btn-calcular {
    background: #8fd3f4;
    border: none;
    padding: 12px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
}

.tabs {
    display: flex;
    margin-bottom: 15px;
}

.tab {
    flex: 1;
    padding: 10px;
    border: 1px solid #000;
    cursor: pointer;
    background: white;
}

.tab.active {
    background: #8fd3f4;
}

table {
    width: 100%;
    background: white;
    border-collapse: collapse;
}

td {
    padding: 8px;
    border-bottom: 1px solid #ccc;
}

.liquido td {
    color: green;
    font-weight: bold;
}

.volver {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    color: black;
}
