<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los valores del formulario
    $name = strip_tags($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Validación básica de campos
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Puedes configurar un correo real aquí (sin servidor SMTP para pruebas locales)
        $to = 'yavelwork@gmail.com'; // Tu correo
        $subject = 'Nuevo mensaje de contacto';
        $body = "Nombre: $name\nEmail: $email\nMensaje: $message";
        $headers = "From: $email";

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "success"; // Enviar éxito como respuesta
        } else {
            echo "error"; // Enviar error si no se puede enviar el correo
        }
    } else {
        echo "error"; // Enviar error si algún campo está vacío
    }
}
?>
