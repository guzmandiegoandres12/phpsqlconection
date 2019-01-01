
<?php
if(!empty($_COOKIE["reloginID"])){
}else{
   header('location: ../index.php');
}

define('RAIZ',$_SERVER['DOCUMENT_ROOT']); 
include(RAIZ.'/ejercicio/includes/includ.php'); 
$procte = new protectG();
$nombre = $procte->sanit($_POST["nombre"]);
$iden = $procte->sanit($_POST['iden']);
$correo = $procte->sanit($_POST["correo"]);
$tele = $procte->sanit($_POST['tele']);
$isuser = $procte->sanit($_POST['idusuario']);
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
header("location: /ejercicio/users/editausers.php");
?>