<?php
// Dirección de correo electrónico donde recibir las respuestas del formulario
$correo_destino = "4peacenfreedom@gmail.com";  

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $correo = $_POST['correo'];
    $comentarios = $_POST['comentarios'];

   // Crear el mensaje a enviar
   $mensaje = "Nombre: $nombre\n";
   $mensaje .= "Edad: $edad\n";
   $mensaje .= "Género: $genero\n";
   $mensaje .= "Correo electrónico: $correo\n";
   $mensaje .= "Comentarios: $comentarios\n";

   // Enviar el mensaje por correo electrónico
   $asunto = "Nuevo mensaje del formulario de contacto";
   $headers = "From: $correo\r\n";
   $headers .= "Reply-To: $correo\r\n";
   mail($correo_destino, $asunto, $mensaje, $headers);

   // Mostrar mensaje de éxito
   echo "<h2>¡Mensaje enviado con éxito!</h2>";
   echo "<p>Los datos han sido enviados a la dirección de correo electrónico: $correo_destino</p>";
} else {
   // Mostrar un mensaje si el formulario no ha sido enviado
   echo "<h2>Error: El formulario no ha sido enviado.</h2>";
}
?>