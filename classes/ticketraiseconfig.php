<?php
class config
{
    private $host, $user, $pass, $dbName;
    public $connect;
    function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->dbName = "ticketraiseportal";
        $this->connect = mysqli_connect($this->host, $this->user, $this->pass, $this->dbName);
    }
}

// class config
// {
//     private $host, $user, $pass, $dbName;
//     public $connect;
//     function __construct()
//     {
//         $this->host = "82.180.142.153";
//         $this->user = "u389505582_LostandFuser";
//         $this->pass = "LandFApp@123";
//         $this->dbName = "u389505582_lostandfapp";
//         $this->connect = mysqli_connect($this->host, $this->user, $this->pass, $this->dbName);
//     }
// }
?>