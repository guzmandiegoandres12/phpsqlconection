<?php
    include "conectar.php";
    $idmmod=$_GET["iduser"];
    if ($sentencia = $conexion->prepare("SELECT * FROM `datos_user` WHERE `id_user`=?")) {
        $sentencia->bind_param("i",$idmmod);
        $sentencia->execute();
    
        /* vincular variables a la sentencia preparada */
        $sentencia->bind_result($col1, $col2,$col3, $col4,$col5);
         /* obtener valores */
         while ($sentencia->fetch()) {
            printf("%s %s\n", $col1, $col2);
        }
        $sentencia->close();
        mysqli_close($conexion);
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
    <p>id de usuario:<input type="text" name="idusuario" value="<?php echo $col1;?>" readonly="readonly"></p>
        <p>NOMBRE:<input type="text" name="nombre" value="<?php echo $col2;?>"></p>
        <p>IDENFIFICACION:<input type="text" name="iden" value="<?php echo $col3;?>"></p> 
        <p> CORREO:<input type="text" name="correo" value="<?php echo $col4?>"></p> 
        <p>TELEFONO: <input type="text" name="tele"value="<?php echo $col5?>"></p>
        <input type="submit" value="registar_datos">
    </form>
    <table> 
    <table> 

</body>

</html>