<?php
class ticketconfig
{
    private $host, $user, $pass, $dbName;
    public $connect;

    function __construct()
    {
        // $this->host = "43.225.52.37";
        $this->host = "Localhost";
        $this->user = "root";
        $this->pass = "";
        $this->dbName = "ticketraiseportal";
        $this->connect = mysqli_connect($this->host, $this->user, $this->pass, $this->dbName);
    }

    function __destruct()
    {
        if ($this->connect) {
            mysqli_close($this->connect);
        }
    }
}
?>
