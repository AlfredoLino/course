<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styleHomeAdmin.css">

</head>
<body>
    <nav>

    <h1>A D M I N I S T R A D O R</h1>
    <a class = "btn btn-info" href="closeSession.php">SALIR.</a>
    </nav>
    <?php
        require("sessionOnAdmin.php");
        require("connectionPDO.php");
    ?>
    <main>
        <h2>Opciones: </h2>
        <div class = "divflex">
            <ul >
                <li><a class = "btn btn-primary" href="formequipo.php">Registrar equipo.</a></li>
                <li><a class = "btn btn-primary" href="altaevento.php">Registrar evento.</a></li>
                <li><a class = "btn btn-primary" href="altajuez.php">Registrar juez.</a></li>
                <li><a class = "btn btn-primary" href="altaintegrante.php">Registrar integrante</a></li>
            </ul>
            <section class ="tablas">
                <div class="contenedorPadre">
                    <div class="contenedor well">
                        <h2>Eventos:</h2>
                        <table>
                            <tr> <th scope = "col">Evento</th><th scope = "col">Fecha</th></tr>
                            <?php
                                $conexion = new conexionServer();
                                $registro = $conexion ->mostrar_eventos();
                                while($record = $registro ->fetch(PDO::FETCH_ASSOC)){
                                $nombre=$record["nombre"];
                                $fecha = $record["fecha"];
                                echo "<tr><td>$nombre</td><td>$fecha</td><td class = 'boton_del'><a class = 'btn btn-danger' href='eliminarevento.php?idevento=$nombre'>Eliminar</a></td></tr>";
                                }
                            ?>
                        </table>
                    </div>


                    <div class="contenedor well" id ="jueces">
                        <h2>Jueces:</h2>
                        <table>
                        <tr> <th scope = "col">Juez</th><th scope = "col">ID</th><th scope = "col">Categoria</th></tr>
                            <?php
                                $registro = $conexion ->mostrar_juecez();
                                while($record = $registro ->fetch(PDO::FETCH_ASSOC)){
                                $nombre = $record["nombre"];
                                $id = $record["id"];
                                $categoria = $record["categoria"];
                                echo "<tr><td>$nombre</td>
                                <td>$id</td> <td>$categoria</td>
                                <td class = 'boton_del' ><a class = 'btn btn-danger' href='eliminarjuez.php?idevento=$id'>Eliminar</a></td></tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            <div class="contenedor ultimo">
              <h2>Equipos dados de alta: </h2>
              <table>
              <tr> <th scope = "col">Equipo</th><th scope = "col">ID</th>
              <th scope = "col">Categoria</th><th scope = "col">evento</th><th scope = "col">Integrantes dentro</th></tr>
                  <?php
                      $registro = $conexion ->mostrar_equipos();
                      while($record = $registro ->fetch(PDO::FETCH_ASSOC)){
                      $nombre = $record["nombre"];
                      $_idequipo = $record["id"];
                      $categoria = $record["categoria"];
                      $integrantes = $record["integrantes_in"];
                      $evento_nombre = $conexion ->buscar_evento($record["evento"]);
                      $eve = $evento_nombre["nombre"];
                      echo "<tr>
                              <td>$nombre</td>
                              <td>$_idequipo</td>
                              <td>$categoria</td>
                              <td>$eve</td>
                              <td>$integrantes</td>
                              <td><a class = 'btn btn-danger' href='elimnar_equipo.php?id=$_idequipo'>Borrar</a></td>
                          </tr>";
                      }
                  ?>
              </table>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
