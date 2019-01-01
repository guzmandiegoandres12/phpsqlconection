<?php
 if(!empty($_COOKIE["reloginID"])){
 echo$_COOKIE["reloginID"];
}else{
    header('location: ../index.php');
 }
 
 

define('RAIZ', $_SERVER['DOCUMENT_ROOT']);
include(RAIZ . '/ejercicio/includes/includ.php');
$procte = new protectG();
$nombre = $procte->sanit($_POST['nombre']);
$pwdver = $procte->sanit($_POST['pasdwod']);
$calssconexion = new classconect($sevidor, $base, $usuario, $contra);
$id = 0;
$pwd;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 


// llamar al procedimiento almacenado


    if (!($sentencia = $calssconexion->getvert()->prepare("CALL VERY_USER_ADM(?)"))) {
        echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    if (!($sentencia->bindParam(1, $nombre, PDO::PARAM_STR | PDO::PARAM_INPUT_OUTPUT, 4000))) {
        echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    $sentencia->execute();

    while ($rows = $sentencia->fetch()) {
        $id = $rows[0];
        $pwd = $rows[1];
    }
 
    if ($id == 0) {
        header("location: ../index.php?Error=1");
   

    } else {
        if (password_verify($_POST['pasdwod'], $pwd)) {
         
            setcookie('reloginID', $nombre, time()+60*60^4*7, '/');
        
         header('location: ../users/editausers.php');
        } else {

            header('location: ../index.php?Error=1');
        }
    }
}
