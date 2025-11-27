<?php 
	$pageTitle = "Dashboard";
	include("../includes/header.php");
    include("../includes/check_login_handle.php");
    $userID = $_SESSION['user_id'];
    $tickets = $ticketobj->get_all_tickets($userID);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Recently Generated Ticket</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


    <!-- recent orders table start -->
    <section class="cart-section ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default panel-table">
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class="table table-striped table-bordered table-list">
                                <thead>
                                    <tr>
                                        <th class="hidden-xs">Ticket Number</th>
                                        <th>Title</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($tickets as $ticket) {
                                    ?>
                                    <tr>
                                        <td class="hidden-xs"><?=$ticket['ticketID'] ?></td>
                                        <td><?=$ticket['ticketTitle'] ?></td>
                                        <td><?=$ticket['CreatedDate'] ?></td>
                                        <td><?=$ticket['ticketStatus'] ?></td>
                                         <td align="center">
                                            <a href="../pages/ticket-detail.php?id=<?= $ticketobj->encrypt_id($ticket['ticketID']) ?>" class="btn btn-default"><i class="fa-solid fa-eye" style="color: #000000;"></i></i></a>
                                        </td>
                                    </tr>
                            
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- recent order table end -->
</div>
<!-- /.container-fluid -->


<?php
include('./../includes/footer.php');
?>