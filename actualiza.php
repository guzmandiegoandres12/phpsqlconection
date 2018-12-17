
<?php
    include "conectar.php";
    $nombre=$_POST["nombre"];
    $iden=$_POST['iden'];
    $correo=$_POST["correo"];
    $tele=$_POST['tele'];
    $isuser=$_POST['idusuario'];
    #envio de informacion a BD con declaraciion preparada
    # 1-preparacion de  la sentencia prepare ("INSERT INTO `datos_user`(`nombre`, `identificacion`, `correo`, `telefono`) VALUES (?,?,?,?)")))
    # 2.1-vinculacion de la sentencia $sentencia->bind_param("ssss", $nombre,$iden,$correo,$tele)
    # 2.2-ejecucion de la sentencia  $sentencia->execute();
    if (!($sentencia = $conexion->prepare("UPDATE `datos_user` SET `nombre`=?,`identificacion`=?,`correo`=?,`telefono`=? WHERE `id_user`= ?;"))) {
         echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
    }      
    if (!$sentencia->bind_param("ssssi", $nombre,$iden,$correo,$tele,$isuser)) {
          echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
    }
    $sentencia->execute();
    mysqli_close($conexion);
    header("location: /ejercicio/index.php");
?>