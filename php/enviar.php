<?php
// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    
    // Dirección de correo electrónico donde quieres recibir los mensajes
    $destinatario = '4peacenfreedom@gmail.com';
    
    // Asunto del correo
    $asunto = 'Mensaje de contacto desde tu sitio web';
    
    // Construye el cuerpo del correo
    $cuerpoMensaje = "Nombre: $nombre\n";
    $cuerpoMensaje .= "Correo electrónico: $email\n";
    $cuerpoMensaje .= "Mensaje:\n$mensaje\n";
    
    // Encabezados del correo
    $headers = "From: $nombre <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Envía el correo
    if (mail($destinatario, $asunto, $cuerpoMensaje, $headers)) {
        echo '<p>Tu mensaje ha sido enviado con éxito. ¡Gracias por ponerte en contacto!</p>';
    } else {
        echo '<p>Lo sentimos, ha ocurrido un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.</p>';
    }
} else {
    // Si se accede al archivo directamente sin enviar datos del formulario, redirige al formulario
    header("Location: formulario.html");
    exit;
}
?>
