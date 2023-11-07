<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Datos de Vivienda</title>

</head>
<body>
    <form action="" method="post">
        <label for="numero">Numero</label>
        <input  type="number" name="numero" min="1" max="12" required><br>

        <label for="palos">Selecciona un palo:</label>
        <select id="palos" name="palos" required>
            <option value="OROS">Oros</option>
            <option value="COPAS">Copas</option>
            <option value="ESPADAS">Espadas</option>
            <option value="BASTOS">Bastos</option>
        </select>

        <button type="submit" value="submit">Enviar</button>
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        header("Location: http://localhost/EjerciciosClasePHP/ModeloVistaControlador/BarajaMVC/EjemploBasico.php?controller=Carta&action=mostrarCarta&palo=" . $_POST['palos'] . "&numero=" . $_POST['numero']);
    }
        ?>
</body>
</html>