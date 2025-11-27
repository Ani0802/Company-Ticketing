<?php
require('./../classes/ticketclass.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_btn']))
{
    $ticketobj->login_handle();
}
?>