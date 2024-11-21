<?php
session_start();

require 'database.php'; 

$user = null; 

if (isset($_SESSION['user_id'])) {
    $records = $connection->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC); 

    if ($results !== false) {
        $user = $results;
    }
}

// Aquí podemos incluir el contenido HTML
// Incluir el archivo HTML
include('index.html');

// Aquí verificamos si el usuario está logueado para mostrar el contenido correspondiente
if (!empty($user)) {
    echo "<script>document.getElementById('user-content').innerHTML = '<br> Bienvenido " . htmlspecialchars($user['email']) . "<br> Has iniciado sesión correctamente🥳<a href=\"logout.php\">Cerrar sesión</a>';</script>";
} else {
    echo "<script>document.getElementById('user-content').innerHTML = '<h1>Por favor, inicie sesión o regístrese</h1><a href=\"login.php\">Iniciar sesión</a> o <a href=\"signup.php\">Registrarse</a>';</script>";
}
?>