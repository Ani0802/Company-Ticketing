<?php 
$pageTitle = "Dashboard";
include ('./../includes/style.php');
include ('./../includes/sidebar.php');
include ('./../includes/header.php');
include("./../includes/check_login_handle.php");

$tickets = $ticketobj->get_all_tickets();
$team_members = $ticketobj->get_all_team_members();
$status_counts = $ticketobj->get_ticket_status_counts();

?>

<div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
    <div class="page-content">
        <div id="content_layout">

            <div>
                <div class="flex justify-between flex-wrap items-center mb-6">
                    <h4
                        class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">
                        Dashboard</h4>
                </div>
                <div class="grid grid-cols-12 gap-5 mb-5">
                    <div class="2xl:col-span-9 lg:col-span-12 col-span-12">
                        <div class="p-4 card">
                            <div class="grid md:grid-cols-3 col-span-1 gap-4">

                                <!-- BEGIN: Group Chart2 -->
                                <div class="py-[18px] px-4 rounded-[6px] bg-[#E5F9FF] dark:bg-slate-900	 ">
                                    <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                        <div class="flex-none">
                                            <div id="wline1"></div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                                Open Ticket
                                            </div>
                                            <div class="text-slate-900 dark:text-white text-lg font-medium">
                                                <?php
                                                if(isset($status_counts['Open'])){
                                                ?>
                                                <?= $status_counts['Open']; ?>
                                                <?php
                                                } else {
                                                    ?>
                                                    0
                                                <?php   
                                                }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-[18px] px-4 rounded-[6px] bg-[#FFEDE5] dark:bg-slate-900	 ">
                                    <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                        <div class="flex-none">
                                            <div id="wline2"></div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                                Ticket's In Progress
                                            </div>
                                            <div class="text-slate-900 dark:text-white text-lg font-medium">
                                                <?php
                                                if(isset($status_counts['In Progress'])){
                                                ?>
                                                <?= $status_counts['In Progress']; ?>
                                                <?php
                                                } else {
                                                    ?>
                                                    0
                                                <?php   
                                                }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-[18px] px-4 rounded-[6px] bg-[#EAE5FF] dark:bg-slate-900	 ">
                                    <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                        <div class="flex-none">
                                            <div id="wline3"></div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                                Ticket Closed
                                            </div>
                                            <div class="text-slate-900 dark:text-white text-lg font-medium">
                                                 <?php
                                                if(isset($status_counts['Closed'])){
                                                ?>
                                                <?= $status_counts['Closed']; ?>
                                                <?php
                                                } else {
                                                    ?>
                                                    0
                                                <?php   
                                                }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- END: Group Chart2 -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <header class="card-header noborder px-6 py-4">
                        <h4 class="card-title text-slate-900 dark:text-white">Tickets</h4>
                    </header>
                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto -mx-6 dashcode-data-table">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden">
                                    <table
                                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700"
                                        id="data-table">
                                        <thead class="border-t border-slate-100 dark:border-slate-800">
                                            <tr>
                                                <th scope="col" class="table-th">Sr.NO</th>
                                                <th scope="col" class="table-th">Subject</th>
                                                <th scope="col" class="table-th">Description</th>
                                                <th scope="col" class="table-th">Date</th>
                                                <th scope="col" class="table-th">Status</th>
                                                <th scope="col" class="table-th">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                            <?php
                                            foreach($tickets as $ticket){
                                            ?>
                                            <tr>
                                                <td class="table-td"><?=$ticket['ticketID']?></td>
                                                <td class="table-td"><?=$ticket['ticketTitle']?></td>
                                                <td class="table-td" style="max-width: 300px;">
                                                    <?=$ticket['ticketDescription']?></td>
                                                <td class="table-td"><?=$ticket['CreatedDate']?></td>
                                                <td class="table-td"><?=$ticket['ticketStatus']?></td>
                                                <td class="table-td">
                                                    <div class="relative">
                                                        <div class="dropdown relative">
                                                            <button class="text-xl text-center block w-full"
                                                                name="list_faculty_btn" type="button"
                                                                id="tableDropdownMenuButton" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <iconify-icon icon="heroicons-outline:dots-vertical">
                                                                </iconify-icon>
                                                            </button>
                                                            <ul
                                                                class="dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                <li>
                                                                    <a href="#" data-modal-target="editModal"
                                                                        data-modal-toggle="editModal"
                                                                        data-id="<?= $ticket['ticketID']?>"
                                                                        class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white editBtn">
                                                                        Assign Ticket
                                                                    </a>


                                                                </li>
                                                                <li>
                                                                    <a href="../pages/adminTicket-detail.php?id=<?= $ticketobj->encrypt_id($ticket['ticketID']) ?>"
                                                                        class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                                        View
                                                                    </a>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end table -->

            <!-- Edit Modal -->
            <!-- Flowbite Tailwind Modal -->
            <div id="editModal" tabindex="-1" aria-hidden="true"
                class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 overflow-x-hidden overflow-y-auto">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                        <!-- Modal Header -->
                        <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Edit Details
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
                            <!-- Hidden Input to store Ticket ID -->
                            <input type="hidden" name="ticket_id" id="hiddenTicketId">

                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Ticket ID: <span id="modalTicketId" class="font-semibold"></span>
                            </p>


                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Team Member
                                </label>
                                <select name="team_member"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <option default>No Selection</option>
                                    <?php
                                    foreach($team_members as $member) {
                                    ?>
                                    <option value='<?=$member['team_id'] ?>'><?=$member['team_name'] ?></option>
                                    <?php
                                    }?>
                                </select>
                            </div>

                            <button type="submit" name="Assign_team_btn" value="Submit"
                                class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Assign
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <script>
            document.querySelectorAll('.editBtn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const ticketId = this.dataset.id;

                    // Show ticket ID in modal text
                    document.getElementById('modalTicketId').textContent = ticketId;

                    // Store ticket ID in hidden input
                    document.getElementById('hiddenTicketId').value = ticketId;
                });
            });
            </script>



            <?php 
include ('./../includes/footer.php');
?>