<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "id21070232_form";
$password = "Joaquinlops9@";
$dbname = "id21070232_form";

// Establecer conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Recibir los datos del formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los índices existan antes de acceder a ellos
    $nombre = isset($_POST["name"]) ? $_POST["name"] : "";
    $correo = isset($_POST["email"]) ? $_POST["email"] : "";
    $telefono = isset($_POST["phone"]) ? $_POST["phone"] : "";

    // Aquí puedes agregar más campos según los datos de tu formulario

    // Guardar los datos en la base de datos si los campos no están vacíos
    if (!empty($nombre) && !empty($correo) && !empty($telefono)) {
        $sql = "INSERT INTO tables (nombre, correo, telefono) VALUES ('$nombre', '$correo', '$telefono')";

        if ($conn->query($sql) === TRUE) {
            echo "GRACIAS POR PARTICIPAR";
        } else {
            echo "Error al guardar los datos: " . $conn->error;
        }
        echo "<script>
            setTimeout(function(){ 
                window.location.href = '" . $_SERVER["HTTP_REFERER"] . "'; 
            }, 5000);
          </script>";
    } else {
        echo "Por favor, completa todos los campos del formulario.";
    }
}

// Cerrar la conexión
$conn->close();
?>
