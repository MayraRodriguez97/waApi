<!DOCTYPE html>
<html>
<head>
    <title>Enviar mensaje por WhatsApp</title>
</head>
<body>
    <h1>Formulario para enviar mensaje</h1>
    <form method="POST" action="/enviar-mensaje">
        @csrf
        <label>Teléfono (con código país):</label><br>
        <input type="text" name="telefono" required><br><br>

        <label>Mensaje:</label><br>
        <textarea name="mensaje" rows="4" cols="50" required></textarea><br><br>

        <button type="submit">Enviar Mensaje</button>
    </form>
</body>
</html>
