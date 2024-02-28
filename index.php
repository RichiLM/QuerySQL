<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ejecutar Consulta SQL</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        
        .boton {
            text-decoration: none;
            background-color: #000;
            color: white;
            padding: 8px 20px;
            border-radius: 5px;
            border: none;

            display: inline-block;
            margin-top: 20px;

            font-weight: bold;
            cursor: pointer;
        }

        textarea {
            height: 200px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h2>Consulta SQL</h2>
    <?php
    if (isset($_POST["consulta"])){
        $qr = $_POST["consulta"];
    }
    ?>
    <form action="consulta.php" method="post">
        <label for="sql_query">Ingrese su consulta SQL:</label><br>
        <?php
        if(isset($qr)){
            echo '<textarea id="sql_query" name="sql_query" rows="4" cols="50" required>' . $qr . '</textarea><br>';
        } else {
            echo '<textarea id="sql_query" name="sql_query" rows="4" cols="50" required></textarea><br>';
        }
        ?>
        <input class="boton" type="submit" value="Ejecutar Consulta">
    </form>
</body>
</html>
