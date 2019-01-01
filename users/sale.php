
<?php
setcookie('reloginID', '', time()-600, '/'); 
         header('location: ../index.php');    
?>