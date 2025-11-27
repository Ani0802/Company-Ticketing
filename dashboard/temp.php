<?php

$pageTitle = "page_titie";

include('./../includes/style.php');
include('./../includes/sidebar.php');
include('./../includes/header.php');
include("./../includes/check_login_handle.php");
?>
<div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
    <div class="page-content">
        <div id="content_layout">
            <!-- BEGIN: Breadcrumb -->
            <div class="mb-5">
                <ul class="m-0 p-0 list-none">
                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                        <a href="../">
                            <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                            <iconify-icon icon="heroicons-outline:chevron-right"
                                class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                        </a>
                    </li>
                    <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                        <?php echo $pageTitle;?>
                        <iconify-icon icon="heroicons-outline:chevron-right"
                            class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                    </li>
                </ul>
            </div>
            <!-- END: BreadCrumb -->
        </div>
    </div>
</div>



<?php
include('./../includes/footer.php');
?>