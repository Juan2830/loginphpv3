<?php
require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['lastname'])) {

    // Comprobar que las contraseñas coinciden
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $message = 'Las contraseñas no coinciden.';
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO users (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)";
        $stmt = $connection->prepare($sql);

        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':lastname', $_POST['lastname']);
        $stmt->bindParam(':email', $_POST['email']);
        
        // Hashear la contraseña antes de guardarla
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Nuevo usuario creado exitosamente';
        } else {
            $message = 'Lo sentimos, debe haber habido un problema al crear tu cuenta :(';
        }
    }
}

// Incluir el archivo HTML para mostrar el formulario
include('signup.html');
