<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Alta de jurado</h1>
<hr/>
    <form action="altajuez.php" method="post">
        <label for="nombre">NOMBRE: </label>
        <input type="text" name="nombre" maxlength="50">
        <br>
        <label for="contra">Password: </label>
        <input type="text" name="contra" maxlength="30">
        <label for="id">ID: </label>
        <input type="text" name="id" maxlength="6">
        <br>
        <select name="categoria" id="">
            <option value = "Primaria">Primaria</option>
            <option value="Secundaria">Secundaria</option>
            <option value="Preparatoria">Preparatoria</option>
        </select>
        <br>
        <button type="submit" >Agregar</button>
    </form>
</body>
</html>