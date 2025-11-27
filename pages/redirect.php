<?php
require('../classes/ticketraiserclass.php');
// add teacher functions start
if (isset($_POST['addteacherbtn'])) {
    $ticketobj->add_teachers();
}
// add teacher functions end

if(isset($_POST['create_ticket_btn'])) {
    $ticketobj->create_ticket();
}
if(isset($_POST['Registerbtn'])) {
    $ticketobj->register_user();
}

?>