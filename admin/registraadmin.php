<?php
define('RAIZ',$_SERVER['DOCUMENT_ROOT']); 
include(RAIZ.'/ejercicio/includes/includ.php'); 
$procte = new protectG();
$nombre = $procte->sanit($_POST['nombre']);
$pwd = password_hash($_POST['pasdwod'], PASSWORD_DEFAULT);
$calssconexion = new classconect($sevidor, $base, $usuario, $contra);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    if (!($sentencia = $calssconexion->getvert()->prepare("CALL CREATE_USER_ADMIN(?,?)"))) {
        echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    $sentencia->bindParam(1, $nombre ,PDO::PARAM_STR, 4000);
    $sentencia->bindParam(2, $pwd, PDO::PARAM_STR, 4000);
    $sentencia->execute();
    $calssconexion->closeconect();
    $sentencia=null;
    header('location: ../index.php');

}

?>
