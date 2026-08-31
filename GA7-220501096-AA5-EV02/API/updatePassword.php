<?php
include 'db.php';

$username = $_POST['username'] ?? null;
$newPassword = $_POST['password'] ?? null;

if ($username && $newPassword) {
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE usuarios SET password = ? WHERE username = ?");
    $stmt->bind_param("ss", $hashedPassword, $username);
    if ($stmt->execute()) {
        echo "Contraseña actualizada";
    } else {
        echo "Error al actualizar";
    }
    $stmt->close();
} else {
    echo "Faltan datos";
}

$conn->close();
?>
