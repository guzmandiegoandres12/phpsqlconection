
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=for, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<?php
 if(!empty($_COOKIE["reloginID"])){
 echo$_COOKIE["reloginID"];
}else{
    header('location: ../index.php');
 }
 
 
 ?>
    <h1>MANEJO DE DATOS</h1>
    <form action="agrega.php" method="POST">
        <h3>REGISTRO DE DATOS</h3>
        <p>NOMBRE:<input type="text" name="nombre"></p>
        <p>IDENFIFICACION:<input type="text" name="iden"></p> 
        <p> CORREO:<input type="text" name="correo"></p> 
        <p>TELEFONO: <input type="text" name="tele"></p>
        <input type="submit" value="registar_datos">
    </form>
    <form action="sale.php" method="POST">
        
        <input type="submit" value="salir">
    </form>

    <H3>DATOS REGISTRADOS</H3>
    <table> 
    <?php 
     
    define('RAIZ',$_SERVER['DOCUMENT_ROOT']); 
    include(RAIZ.'/ejercicio/includes/includ.php');  
    $calssconexion = new classconect($sevidor, $base, $usuario, $contra);
    $sentencia = $calssconexion->getvert()->prepare('SELECT * FROM datos_user');;
    if ($sentencia->execute()) {
        while ($rows = $sentencia->fetch()) {
            echo "<tr>";
            echo "<td>";
            echo $rows[0] . "     ";
            echo "</td>";
            echo "<td>";
            echo $rows[1] . "     ";
            echo "</td>";
            echo "<td>";
            echo $rows[2] . "     ";
            echo "</td>";
            echo "<td>";
            echo $rows[3] . "     ";
            echo "</td>";
            echo "<td>";
            echo $rows[4] . "     ";
            echo "</td>";
            echo "<td>";
            echo "<a href='elinina.php?iduser=" . $rows[0] . "'>eliminar</a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='modifica.php?iduser=" . $rows[0] . "'>modificar</a>";
            echo "</td>";
            echo "</tr>";
        }
    }

    ?>
    <table> 

</body>

</html>