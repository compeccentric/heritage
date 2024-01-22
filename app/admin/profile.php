<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>

<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $get_profile = mysqli_query($connection,  $query);
    while ($row = mysqli_fetch_assoc($get_profile)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        // $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        // $user_date = $row['user_date'];
    }
}

if (isset($_POST['update_profile'])) {
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    // $user_image = $_FILES['image']['name'];
    // $user_image_temp = $_FILES['image']['tmp_name'];
    $user_role = $_POST['user_role'];
    // $user_date = $_POST['user_date'];

    // move_uploaded_file($user_image_temp,  "../images/$user_image");
    // if (empty($user_image)) {
    //     $query = "SELECT * FROM users WHERE user_id = $user_id ";
    //     $select_image = mysqli_query($connection,  $query);
    //     while ($row = mysqli_fetch_array($select_image)) {
    //         $user_image = $row['user_image'];
    //     }
    // }

    $query = "UPDATE users SET ";
    $query .= "username = '{$username}',  ";
    $query .= "user_password = '{$user_password}',  ";
    $query .= "user_firstname = '{$user_firstname}',  ";
    $query .= "user_lastname = '{$user_lastname}',  ";
    $query .= "user_email = '{$user_email}',  ";
    // $query .= "user_image = '{$user_image}',  ";
    $query .= "user_role =  '{$user_role}' ";
    // $query .= "user_date = '{$user_date}' ";
    $query .= "WHERE username = '{$username}' ";
    $update_profile = mysqli_query($connection,  $query);
    //confirmQuery($update_post);
    header('Location: profile.php');
}

?>

<div id="layoutSidenav_content">
    <main>
        <div style="padding-top:20px;" class="container-fluid px-4">
            <!-- Page Heading -->
            <h1 class="text-center">Profile</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <div div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
                </div>
                <div div class="mb-3">
                    <label for="user_password" class="form-label">Password</label>
                    <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password">
                </div>
                <div div class="mb-3">
                    <label for="user_firstname" class="form-label">First Name</label>
                    <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
                </div>
                <div div class="mb-3">
                    <label for="user_lastname" class="form-label">Last Name</label>
                    <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
                </div>
                <div div class="mb-3">
                    <label for="user_email" class="form-label">Email</label>
                    <input value="<?php echo $user_email; ?>" type="text" class="form-control" name="user_email">
                </div>
                <div div class="mb-3">
                    <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
                </div>
            </form>

        </div>

    </main>

    <?php include "includes/admin_footer.php"; ?>