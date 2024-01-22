<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>
<?php

if(!is_admin($_SESSION['username'])){

    header("Location: index.php");
}

?>
<div id="layoutSidenav_content">
    <main>
        <div style="padding-top:20px;" class="container-fluid px-4">
            <div class="col-lg-12">
                <?php
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = '';
                }
                switch ($source) {
                    case 'add_user';
                        include "includes/add_user.php";
                        break;

                    case 'edit_user';
                        include "includes/edit_user.php";
                        break;

                    default:
                        include "includes/view_all_users.php";
                        break;
                }

                ?>
            </div>
        </div>
    </main>

    <?php include "includes/admin_footer.php"; ?>