<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Te estamos buscando! - </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <div class="caja">
            <form action="http://personal.byethost8.com/enviar_datos" method="post">
                <h1>Personal Staff Verificado</h1>
                <br>
                <hr>
                <br>
                <label for="">Ingresa tu Gamertag:<span>*</span></label>
                <input type="text" name="usuario" id="usuario" placeholder="Como te llamas en el juego?" required>
                <br>
                <label for="">Ingresa tu Nombre:<span>*</span></label>
                <input type="text" name="nombre" id="nombre" placeholder="Como te llamas en la vida real?" required>
                <br>
                <label for="">Ingresa tu Apellido:<span>*</span></label>
                <input type="text" name="apellido" id="apellido" placeholder="Como te apellidas en la vida real?"
                    required>
                <br>
                <label for="">Ingresa tu Email:<span>*</span></label>
                <input type="email" name="email" id="email" placeholder="Correo para contáctarte" required>
                <br>
                <label for="">Discord:<span>*</span></label>
                <input type="text" name="redes" id="redes" placeholder="example#00000" required>
                <label for="">Telegram:<span>*</span></label>
                <input type="text" name="redestele" id="redestele" placeholder="Número de Célular" required>
                <br>
                <label for="">>> Acepta nuestros términos <<</label>
                        <br>
                        <div class="checkbox">
                            <p><input type="checkbox" name="checkbox1"> En el servidor no se usarán hacks ni otros tipos
                                de software maliciosos, <span>estás de acuerdo?</span></p>
                            <p><input type="checkbox" name="checkbox2"> <span>Estás de acuerdo</span> que al romper una
                                regla se sancionará a la persona?</p>
                            <p><input type="checkbox" name="checkbox3"> Al entrar al servidor de Discord o al juego
                                debes leer obligatoriamente las reglas, <span>estás de acuerdo?</span></p>
                            <p><input type="checkbox" name="checkbox4"> ¿Tienes más de 13+ años? - <span>Si tienes esa
                                    edad o menos no la marques</span></p>
                            <p><input type="checkbox" name="checkbox5"> Aceptas todos estos <span>Términos del
                                    servidor?</span></p>
                        </div>
                        <br>
                        <button type="submit">¡Enviar mis datos al Servidor!</button>
            </form>
        </div>
    </main>
    <script src="app.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
          const form = document.querySelector('form');
          const enviarBoton = document.getElementById('enviarBoton');
      
          form.addEventListener('submit', (event) => {
            event.preventDefault(); // Evitar el comportamiento por defecto de enviar el formulario
      
            const formData = new FormData(form);
            fetch('/enviar_datos', {
              method: 'POST',
              body: formData
            })
            .then((response) => {
              // Verificar si la respuesta fue exitosa (código 200)
              if (response.ok) {
                // Mostrar el mensaje en la página
                const mensaje = document.createElement('div');
                mensaje.textContent = '¡Datos enviados correctamente al bot de Telegram!';
                mensaje.classList.add('mensaje-exito'); // Puedes definir estilos para este mensaje en tu hoja de estilos (style.css)
                form.appendChild(mensaje);
      
                // Opcional: Limpiar los campos del formulario después del envío
                form.reset();
              } else {
                console.error('Error al enviar datos a Telegram');
                alert('Hubo un error al enviar los datos. Por favor, intenta de nuevo más tarde.');
              }
            })
            .catch((error) => {
              console.error('Error al enviar datos a Telegram:', error);
              alert('Hubo un error al enviar los datos. Por favor, intenta de nuevo más tarde.');
            });
          });
        });
      </script>
      
</body>

</html>