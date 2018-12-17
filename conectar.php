<?php
$sevidor="localhost";
$usuario="root";
$contra="";
$base="datos";
$conexion=new mysqli($sevidor,$usuario,$contra,$base);

if($conexion){
}else{
    echo "fallo en conexion";
}
?>