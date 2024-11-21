<?php
session_start();

require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    
    // Validación reCAPTCHA
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $secretKey = '6Le1AoYqAAAAABQ3UJQ4QFplW9WWs3wQifMyePSX';
    $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify";

    $response = file_get_contents($recaptchaUrl . "?secret=" . $secretKey . "&response=" . $recaptchaResponse);
    $responseKeys = json_decode($response, true);

    if ($responseKeys['success']) {
        
        // Verificar las credenciales del usuario
        $records = $connection->prepare('SELECT id, email, password FROM users WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        // Comprobar si el usuario existe y la contraseña es correcta
        if ($results && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header("Location: /loginphp"); // Redirigir después de un login exitoso
            exit;
        } else {
            $message = 'Lo sentimos, esas credenciales no coinciden.';
        }
    } else {
        $message = 'Por favor, completa el CAPTCHA correctamente.';
    }
}

// Incluir el archivo HTML para mostrar el formulario
include('login.html');
