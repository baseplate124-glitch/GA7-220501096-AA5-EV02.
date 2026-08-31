<?php
// Registro de usuario
include("db.php");

$username = $_POST['username'];
$password = $_POST['password'];

// Encriptar contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "✅ Registro exitoso";
} else {
    echo "❌ Error en el registro";
}

$conn->close();
?>
