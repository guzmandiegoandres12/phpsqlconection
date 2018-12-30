
<?php
include "includ.php";;
$procte = new protectG();
$nombre = $procte->sanit($_POST["nombre"]);
$iden = $procte->sanit($_POST['iden']);
$correo = $procte->sanit($_POST["correo"]);
$tele = $procte->sanit($_POST['tele']);
$isuser = $procte->sanit($_POST['idusuario']);
    #envio de informacion a BD con declaraciion preparada
    # 1-preparacion de  la sentencia prepare ("INSERT INTO `datos_user`(`nombre`, `identificacion`, `correo`, `telefono`) VALUES (?,?,?,?)")))
    # 2.1-vinculacion de la sentencia $sentencia->bind_param("ssss", $nombre,$iden,$correo,$tele)
    # 2.2-ejecucion de la sentencia  $sentencia->execute();
$calssconexion = new classconect($sevidor, $base, $usuario, $contra);

if (!($sentencia = $calssconexion->getvert()->prepare("UPDATE `datos_user` SET `nombre`=?,`identificacion`=?,`correo`=?,`telefono`=? WHERE `id_user`= ?;"))) {
    echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
}
$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $iden);
$sentencia->bindParam(3, $correo);
$sentencia->bindParam(4, $tele);
$sentencia->bindParam(5, $isuser);
$sentencia->execute();
header("location: /ejercicio/index.php");
?>