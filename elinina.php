<?php
include "includ.php";
$procte = new protectG();
$myis=$procte->sanit($_GET["iduser"]);
#envio de informacion a BD con declaraciion preparada
# 1-preparacion de  la sentencia prepare ("DELETE FROM `datos_user` WHERE `nombre`='?';"))
# 2.1-vinculacion de la sentencia $sentencia->bind_param('s',$nombre)
# 2.2-ejecucion de la sentencia  $sentencia->execute();
$calssconexion = new classconect($sevidor, $base, $usuario, $contra);
$sentencia = $calssconexion->getvert()->prepare("DELETE FROM `datos_user` WHERE `id_user`=?;");
$sentencia->bindParam(1, $myis);
$sentencia->execute();
header("location: /ejercicio/index.php");
?>