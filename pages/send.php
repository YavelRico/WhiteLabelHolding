<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    $to = "yavelwork@gmail.com"; // TU EMAIL
    $subject = "Nuevo mensaje de contacto";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";

    $body = "Nombre: $name\nEmail: $email\nMensaje:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "¡Mensaje enviado con éxito!";
    } else {
        echo "Hubo un error al enviar el mensaje.";
    }
}
?>
