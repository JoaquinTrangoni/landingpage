<?php
// Conexión a la base de datos (reemplaza con tus credenciales)
$servername = "localhost";
$username = "id21070232_form";
$password = "Joaquinlops9@";
$dbname = "id21070232_form";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener los datos de la tabla "usuarios"
$sql = "SELECT id, nombre, correo, telefono FROM tables";
$result = $conn->query($sql);

// Imprimir los datos en formato de tabla
if ($result->num_rows > 0) {
    echo "<table style='width: 50%; margin: 0 auto; border-collapse: collapse;'>";
    echo "<tr style='border: 1px solid black; padding: 8px; background-color: #f2f2f2; text-align: center;'><th>ID</th><th>Nombre</th><th>Correo</th><th>DNI</th</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: center;'>" . $row["id"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: center;'>" . $row["nombre"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: center;'>" . $row["correo"] . "</td>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: center;'>" . $row["telefono"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron usuarios";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
