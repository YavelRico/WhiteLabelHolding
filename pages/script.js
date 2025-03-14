document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir que la página se recargue al enviar el formulario

    var form = new FormData(this); // Crear un FormData con el contenido del formulario

    fetch('send.php', {
        method: 'POST',
        body: form
    }).then(response => response.text()) // Obtener la respuesta del servidor
    .then(data => {
        const responseElement = document.getElementById('response');

        if (data === 'success') {
            responseElement.innerHTML = '<p>¡Gracias por tu mensaje, te responderemos pronto!</p>';
            responseElement.style.color = 'green';
            document.getElementById('contactForm').reset(); // Limpiar el formulario
        } else {
            responseElement.innerHTML = '<p>Hubo un error al enviar el mensaje. Inténtalo nuevamente.</p>';
            responseElement.style.color = 'red';
        }
    }).catch(error => {
        document.getElementById('response').innerHTML = '<p>Hubo un error en el servidor. Inténtalo más tarde.</p>';
        document.getElementById('response').style.color = 'red';
    });
});
