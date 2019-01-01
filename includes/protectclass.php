
<?php 
//clase para sanizacion de  datos de entrada de usuario
class protectG
{
    function sanit($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>