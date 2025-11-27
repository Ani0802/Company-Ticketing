<?php
$pageTitle = "Ticket Detail";

include('./../includes/style.php');
include('./../includes/sidebar.php');
include('./../includes/header.php');
include('./../includes/check_login_handle.php');
if(isset($_GET['id']))
{
  $ticket_id = $ticketobj->decrypt_id($_GET['id']);
  // echo($publication_id);
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

        <div class="text-center">
            <button class="btn btn-success editBtn" data-modal-target="editModal" data-modal-toggle="editModal">
                Update
            </button>
        </div>


    </main>
    <?php
    }else{
    ?>
    <main>
        <h2 class="heading"><?=$get_ticket['ticketTitle']?></h2>
        <p>Create Date :- <?=$get_ticket['CreatedDate']?> <br>Status :- <?=$get_ticket['ticketStatus']?></p>
        <p><?=$get_ticket['ticketDescription']?></p>
        <hr class="linebr">

        <div class="mt-3 p-3 w-full">
            <textarea rows="3" class="border p-2 rounded w-full" placeholder="Write something..."
                style=width:100%></textarea>
        </div>

        <div class="flex justify-between mx-3">
            <div><button
                    class="btn btn-success px-4 py-1 bg-gray-800 text-white rounded font-light hover:bg-gray-700">Submit</button>
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-success editBtn" data-modal-target="editModal" data-modal-toggle="editModal">
                Update
            </button>
        </div>


    </main>
    <?php
    }
    ?>
    <!-- begin htmlcommentbox.com -->

    <!-- end htmlcommentbox.com -->
</div>

<!-- Flowbite Tailwind Modal -->
<div id="editModal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 overflow-x-hidden overflow-y-auto">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Ticket
                </h3>
                <button type="button"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="editModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form class="p-4" action="../pages/redirect.php" method="post">
                <input type="hidden" name="ticket_id" value="<?php echo $ticket_id; ?>">

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Status
                    </label>
                    <select name="ticket_status"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option default>No Selection</option>
                        <option value="Open">Open</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Resolved">Resolved</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>

                <button type="submit" name="update_ticket_status" value="Update"
                    class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update
                </button>

            </form>
        </div>
    </div>
</div>


<?php
include('./../includes/footer.php');
?>