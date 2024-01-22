<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>

<div id="layoutSidenav_content">
    <main>
        <div style="padding-top:20px;" class="container-fluid px-4">
            <div class="col-lg-12">
                <!-- <h1 class="page-header">
                                                Welcome to admin
                                                <small>Author</small>
                                            </h1> -->
                <?php
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = '';
                }
                switch ($source) {
                    case 'add_customer';
                        include "includes/add_customer.php";
                        break;
                    case 'view_customer';
                        include "includes/view_customer.php";
                        break;
                    case 'edit_customer';
                        include "includes/edit_customer.php";
                        break;
                    case 'download_all_customers';
                        include "includes/download_all_customers.php";
                    default:
                        include "includes/view_all_customers.php";
                        break;
                }   
                ?>
            </div>
        </div>
    </main>

    <?php include "includes/admin_footer.php"; ?>