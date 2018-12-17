<?php
    include "conectar.php";
    $nombre=$_POST["nombre"];
    $iden=$_POST['iden'];
    $correo=$_POST["correo"];
    $tele=$_POST['tele'];
    #envio de informacion a BD con declaraciion preparada
    # 1-preparacion de  la sentencia prepare ("INSERT INTO `datos_user`(`nombre`, `identificacion`, `correo`, `telefono`) VALUES (?,?,?,?)")))
    # 2.1-vinculacion de la sentencia $sentencia->bind_param("ssss", $nombre,$iden,$correo,$tele)
    # 2.2-ejecucion de la sentencia  $sentencia->execute();
    if (!($sentencia = $conexion->prepare("INSERT INTO `datos_user`(`nombre`, `identificacion`, `correo`, `telefono`) VALUES (?,?,?,?)"))) {
         echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
    }      
    if (!$sentencia->bind_param("ssss", $nombre,$iden,$correo,$tele)) {
          echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
    }
    $sentencia->execute();
    mysqli_close($conexion);
    header("location: /ejercicio/index.php");
?>