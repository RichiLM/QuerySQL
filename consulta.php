<!DOCTYPE html>
<html lang="es">

<head>
    <title>Resultados de Consulta</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #AFAFAF;
        }

        a,
        .editar {
            text-decoration: none;
            background-color: #000;
            color: white;
            padding: 8px 20px;
            border-radius: 5px;

            display: inline-block;
            margin-top: 20px;

            font-weight: bold;
            font-size: 15px;
        }

        h3 {
            margin-bottom: 0;
        }

        .editar {
            border: none;
            cursor: pointer;
            margin: 20px 0;
        }

        textarea {
            display: none;
        }
    </style>
</head>

<body>
    <h2>Resultados de Consulta</h2>
    <?php
    require 'conexion.php';

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql_query = $_POST['sql_query'];

    echo '<h3>Querie ejecutado: ' . $sql_query . '</h3>';

    ?>
    <form action="index.php" method="post">
        <textarea name="consulta"><?php echo $sql_query; ?></textarea>
        <input class="editar" type="submit" value="Editar Querie" name="editar">
        <a href="index.php">Volver</a>
        <a href="index.php" target="_blank">Abrir nuevo index</a>
    </form>
    <?php
    $result = $conn->query($sql_query);

    if ($result === TRUE) {
        echo "La operación se realizó con éxito.<br>";
        $rows_affected = $conn->affected_rows;
        echo "Filas afectadas: $rows_affected";
    } elseif ($result === FALSE) {
        echo "Error al ejecutar la consulta: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            echo "Registros: " . mysqli_num_rows($result);
            echo "<table>";
            echo "<tr>";
            while ($field = $result->fetch_field()) {
                echo "<th>" . $field->name . "</th>";
            }
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }

    $conn->close();
    ?>
    <form action="index.php" method="post">
        <textarea name="consulta"><?php echo $sql_query; ?></textarea>
        <input class="editar" type="submit" value="Editar Querie" name="editar">
        <a href="index.php">Volver</a>
        <a href="index.php" target="_blank">Abrir nuevo index</a>
    </form>
</body>

</html>