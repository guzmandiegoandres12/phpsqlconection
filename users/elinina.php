<?php
if(!empty($_COOKIE["reloginID"])){
echo$_COOKIE["reloginID"];
}else{
   header('location: ../index.php');
}

define('RAIZ',$_SERVER['DOCUMENT_ROOT']); 
include(RAIZ.'/ejercicio/includes/includ.php'); 
$procte = new protectG();
$myis=$procte->sanit($_GET["iduser"]);
$calssconexion = new classconect($sevidor, $base, $usuario, $contra);
$sentencia = $calssconexion->getvert()->prepare("DELETE FROM `datos_user` WHERE `id_user`=?;");
$sentencia->bindParam(1, $myis);
$sentencia->execute();
header("location: /ejercicio/users/editausers.php");
?>