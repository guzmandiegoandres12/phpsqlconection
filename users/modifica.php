<?php

if(!empty($_COOKIE["reloginID"])){
echo$_COOKIE["reloginID"];
}else{
   header('location: ../index.php');
}

//segmento para modifocacion  der datos 
define('RAIZ', $_SERVER['DOCUMENT_ROOT']);
include(RAIZ . '/ejercicio/includes/includ.php');
$procte = new protectG();
$idmmod = $procte->sanit($_GET["iduser"]);
$col1;
$col2;
$col3;
$col4;
$col5;
$calssconexion = new classconect($sevidor, $base, $usuario, $contra);

$sentencia = $calssconexion->getvert()->prepare("SELECT * FROM `datos_user` WHERE `id_user`=?");
$sentencia->bindParam(1, $idmmod);
$sentencia->execute();

while ($row = $sentencia->fetch()) {
    $col1=$row[0];
    $col2=$row[1];
    $col3=$row[2];
    $col4=$row[3];
    $col5=$row[4];

}
$calssconexion->closeconect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=for, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>ACTUALIZACION DE DATOS</h1>
    <form action="actualiza.php" method="POST">
    <p>id de usuario:<input type="text" name="idusuario" value="<?php echo $col1; ?>" readonly="readonly"></p>
        <p>NOMBRE:<input type="text" name="nombre" value="<?php echo $col2; ?>"></p>
        <p>IDENFIFICACION:<input type="text" name="iden" value="<?php echo $col3; ?>"></p> 
        <p> CORREO:<input type="text" name="correo" value="<?php echo $col4 ?>"></p> 
        <p>TELEFONO: <input type="text" name="tele"value="<?php echo $col5 ?>"></p>
        <input type="submit" value="registar_datos">
    </form>
    <table> 
    <table> 

</body>

</html>