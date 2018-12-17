<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=for, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>MANEJO DE DATOS</h1>
    <form action="agrega.php" method="POST">
        <h3>REGISTRO DE DATOS</h3>
        <p>NOMBRE:<input type="text" name="nombre"></p>
        <p>IDENFIFICACION:<input type="text" name="iden"></p> 
        <p> CORREO:<input type="text" name="correo"></p> 
        <p>TELEFONO: <input type="text" name="tele"></p>
        <input type="submit" value="registar_datos">
    </form>

    <H3>DATOS REGISTRADOS</H3>
    <table> 
    <?php 
    include "conectar.php";
    $coounsult_add="SELECT * FROM `datos_user`";
    $consult=mysqli_query($conexion,$coounsult_add);
    while($rows=$consult->fetch_array()){ 
        echo "<tr>";
        echo "<td>";
        echo $rows[0]."     "; 
        echo "</td>";
        echo "<td>";
        echo $rows[1]."     ";
        echo "</td>";
        echo "<td>";
        echo $rows[2]."     ";
        echo "</td>";
        echo "<td>";
        echo $rows[3]."     ";
        echo "</td>";
        echo "<td>";
        echo $rows[3]."     ";
        echo "</td>";
        echo "<td>";
        echo "<a href='elinina.php?iduser=".$rows[0]."'>eliminar</a>";
        echo "</td>";
        echo "<td>";
        echo "<a href='modifica.php?iduser=".$rows[0]."'>modificar</a>";
        echo "</td>";
        echo "</tr>";
    }
    mysqli_close($conexion);
    ?>
    <table> 

</body>

</html>