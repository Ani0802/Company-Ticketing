<?php 
//session_start();
if(isset($_SESSION['admin_login_token']))
{
    $ticketobj->isloggedinuser();
}
else
{
    session_destroy();
    echo "<script> window.location.replace('../home/login.php'); </script> ";
    // echo "No token found";
}
?>