<?php
include('./../includes/header.php');
if(isset($_GET['id']))
{
  $ticket_id = $ticketobj->decrypt_id($_GET['id']);
}
$ticket_details = $ticketobj->get_ticket_details($ticket_id);
$get_ticket = $ticketobj->get_Open_ticket($ticket_id);
?>
<div class="ticketdetail">
    <?php
    if(isset($ticket_details)){
    ?>
    <main>
        <h2 class="heading"><?=$ticket_details['ticketTitle']?></h2>
        <p>Create Date :- <?=$ticket_details['CreatedDate']?> <br>Status :- <?=$ticket_details['ticketStatus']?></p>
        <p><?=$ticket_details['ticketDescription']?></p>
        <hr class="linebr">

        <h2 class="heading">Comments</h2>
        <h3><?=$ticket_details['team_name']?></h3>
        <p>Create Date :- <?=$ticket_details['created_date']?></p>
        <p><?=$ticket_details['comment']?></p>
        
        <hr class="linebr">

    </main>
    <?php
    }else{
    ?>
    <main>
        <h2 class="heading"><?=$get_ticket['ticketTitle']?></h2>
        <p>Create Date :- <?=$get_ticket['CreatedDate']?> <br>Status :- <?=$get_ticket['ticketStatus']?></p>
        <p><?=$get_ticket['ticketDescription']?></p>
        <hr class="linebr">
    </main>
    <?php
    }
    ?>
    <!-- begin htmlcommentbox.com -->

    <!-- end htmlcommentbox.com -->
</div>


<?php
include('./../includes/footer.php');
?>