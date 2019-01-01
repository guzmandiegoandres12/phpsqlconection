
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=for, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body><!--admin/-->
    <h1>INGRESO ADMINISTRADOR</h1>
    <form action="admin/ingresa.php" method="POST">
        <p>NOMBRE:<input type="text" name="nombre"></p>
        <p>CONTRASEÑA:<input type="password" name="pasdwod"></p> 
       
        <input type="submit" value="ingresar">
        
    </form>
<?Php 
define('RAIZ', $_SERVER['DOCUMENT_ROOT']);
include(RAIZ . '/ejercicio/includes/includ.php');
$procte = new protectG();
if (!empty($_GET['Error'])) {
    echo "usuario o contraseña incorrecta";
}

?>

</body>

</html>