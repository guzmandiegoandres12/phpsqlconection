<?php
    include "conectar.php";
    $nombre=$_GET["iduser"];
#envio de informacion a BD con declaraciion preparada
# 1-preparacion de  la sentencia prepare ("DELETE FROM `datos_user` WHERE `nombre`='?';"))
# 2.1-vinculacion de la sentencia $sentencia->bind_param('s',$nombre)
# 2.2-ejecucion de la sentencia  $sentencia->execute();
    if (!($sentencia = $conexion->prepare("DELETE FROM `datos_user` WHERE `id_user`=?"))) {
        echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
   } 
   if (!$sentencia->bind_param("s", $nombre)) {
    echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
}
    $sentencia->execute();
    mysqli_close($conexion);
    header("location: /ejercicio/index.php");
?>