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
                    case 'add_product';
                        include "includes/add_product.php";
                        break;
                    case 'view_product';
                        include "includes/view_product.php";
                        break;
                    case 'view_products';
                        include "includes/view_products.php";
                        break;
                    case 'edit_product';
                        include "includes/edit_product.php";
                        break;
                    case 'download_all_products';
                        include "includes/download_all_products.php";
                        break;
                    default:
                        include "includes/view_all_products.php";
                        break;
                }
                ?>
            </div>
        </div>
    </main>

    <?php include "includes/admin_footer.php"; ?>