<!DOCTYPE html>
<html>
<head>
    <title>Mensajes WAAPI</title>
</head>
<body>
    <h1>Enviar mensaje</h1>
    <form method="POST" action="/enviar">
        @csrf
        <label>Número:</label><br>
        <input type="text" name="numero" placeholder="521XXXXXXXXXX"><br><br>

        <label>Mensaje:</label><br>
        <textarea name="mensaje"></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
