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
                    case 'add_special';
                        include "includes/add_special.php";
                        break;
                    case 'edit_special';
                        include "includes/edit_special.php";
                        break;
                    case 'view_special';
                        include "includes/view_special.php";
                        break;
                    default:
                        include "includes/view_all_specials.php";
                        break;
                }
                ?>
            </div>
        </div>
    </main>

    <?php include "includes/admin_footer.php"; ?>