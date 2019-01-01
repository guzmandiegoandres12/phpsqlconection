<?php

if (!empty($_COOKIE["reloginID"])) {
    echo $_COOKIE["reloginID"];
} else {
    header('location: ../index.php');
}

define('RAIZ', $_SERVER['DOCUMENT_ROOT']);
include(RAIZ . '/ejercicio/includes/includ.php');
$procte = new protectG();
$nombre = $procte->sanit($_POST["nombre"]);
$iden = $procte->sanit($_POST['iden']);
$correo = $procte->sanit($_POST["correo"]);
$tele = $procte->sanit($_POST['tele']);
    #envio de informacion a BD con declaraciion preparada
    # 1-preparacion de  la sentencia prepare ("INSERT INTO `datos_user`(`nombre`, `identificacion`, `correo`, `telefono`) VALUES (?,?,?,?)")))
    # 2.1-vinculacion de la sentencia $sentencia->bind_param("ssss", $nombre,$iden,$correo,$tele)
    # 2.2-ejecucion de la sentencia  $sentencia->execute();
$calssconexion = new classconect($sevidor, $base, $usuario, $contra);
if (!($sentencia = $calssconexion->getvert()->prepare("INSERT INTO `datos_user`(`nombre`, `identificacion`, `correo`, `telefono`) VALUES (?,?,?,?)"))) {
    echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
}
$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $iden);
$sentencia->bindParam(3, $correo);
$sentencia->bindParam(4, $tele);
$sentencia->execute();
mysqli_close($conexion);
header("location: /ejercicio/users/editausers.php");
?>