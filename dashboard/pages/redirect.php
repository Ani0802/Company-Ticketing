<?php
require('../classes/ticketclass.php');

if(isset($_POST['Assign_team_btn'])) {
    $ticketobj->assign_member();
}
if(isset($_POST['update_ticket_status'])) {
    $ticketobj->update_ticket_status();
}
?>