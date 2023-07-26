const fetch = require('node-fetch');

const express = require('express');
const app = express();
app.use(express.urlencoded({ extended: true }));

const TELEGRAM_BOT_TOKEN = '6620773400:AAGkiDgo9siPedG_tDrTA7V5aUT6KmcTn18';
const CHAT_ID = '5356736186';

app.post('/enviar_datos', (req, res) => {
    const { usuario, nombre, apellido, email, redes, redestele } = req.body;

    // Obtener los valores de los checkboxes marcados
    const checkbox1 = req.body.checkbox1 === 'on' ? 'Sí' : 'No';
    const checkbox2 = req.body.checkbox2 === 'on' ? 'Sí' : 'No';
    const checkbox3 = req.body.checkbox3 === 'on' ? 'Sí' : 'No';
    const checkbox4 = req.body.checkbox4 === 'on' ? 'Sí' : 'No';
    const checkbox5 = req.body.checkbox5 === 'on' ? 'Sí' : 'No';

    const message = `
¡Hola ${nombre} ${apellido}! 👋 \n
Gracias por registrarte en Personal Staff Verificado.\n
Tus datos son:\n
- Gamertag: ${usuario}\n
- Nombre: ${nombre}\n
- Apellido: ${apellido}\n
- Email: ${email}\n
- Discord: ${redes}\n
- Telegram: ${redestele}\n
\n
Aceptaste los siguientes términos:\n
1. En el servidor no se usarán hacks ni otros tipos de software maliciosos: ${checkbox1}\n
2. Estás de acuerdo que al romper una regla de sancione a la persona: ${checkbox2}\n
3. Al entrar al servidor de Discord o al juego debes leer obligatoriamente las reglas: ${checkbox3}\n
4. ¿Tienes más de 13+ años?: ${checkbox4}\n
5. Aceptas todos estos Términos del servidor: ${checkbox5}\n
\n
¡Gracias por confiar en nosotros!`;

    fetch(`https://api.telegram.org/bot${TELEGRAM_BOT_TOKEN}/sendMessage`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            chat_id: CHAT_ID,
            text: message,
            parse_mode: 'Markdown', // Indicar que se está utilizando el formato Markdown
        }),
    })
        .then(() => {
            res.send('Datos enviados correctamente al bot de Telegram');
        })
        .catch((error) => {
            console.error('Error al enviar datos a Telegram:', error);
            res.status(500).send('Hubo un error al enviar los datos.');
        });
});

const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Servidor escuchando en el puerto ${PORT}`);
});