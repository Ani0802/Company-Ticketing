<?php
require('../classes/ticketraiserclass.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginbtn']))
{
    $ticketobj->login_handle();
}
?>