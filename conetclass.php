<?Php
class classconect
{


    private $servidor;
    private $usuario;
    private $contraseñana;
    private $base;
    private  $vatconect;

    function __construct($sevi, $db, $user, $pwd)
    {
        $this->conficconect($sevi, $db, $user, $pwd);
        $this->creaConect();
    }
    function creaConect()
    {

        try {
            $s = $this->getServ();
            $s2 = $this->getDB();
            $cade = "mysql:host=$s;dbname=$s2";
            $this->vatconect= new PDO($cade, $this->getUser(), $this->getPwd());
           
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }
    function conficconect($sevi, $db, $user, $pwd)
    {
        $this->setServ($sevi);
        $this->setUser($user);
        $this->setPwd($pwd);
        $this->setDB($db);

    }
    function setServ($sevi)
    {
        $this->servidor = $sevi;
    }
    function setUser($user)
    {
        $this->usuario = $user;
    }
    function setPwd($pwd)
    {
        $this->contraseñana = $pwd;
    }
    function setDB($db)
    {
        $this->base = $db;
    }
    function getServ()
    {
        return $this->servidor;
    }
    function getUser()
    {
        return $this->usuario;
    }
    function getPwd()
    {
        return $this->contraseñana;
    }
    function getDB()
    {
        return $this->base;
    }
    function getvert(){
        return $this->vatconect;
        
            
    }

    function closeconect(){
        $this->vatconect=null;
    }
}

?>
