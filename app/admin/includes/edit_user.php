<?php

if (!is_admin($_SESSION['username'])) {

    header("Location: index.php");
}

if (isset($_GET['u_id'])) {
    $the_user_id = $_GET['u_id'];



    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_users = mysqli_query($connection,  $query);


    while ($row = mysqli_fetch_assoc($select_users)) {
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

    if (isset($_POST['update_user'])) {
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
        // if(empty($user_image)){
        //     $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        //     $select_image = mysqli_query($connection, $query);
        //     while($row = mysqli_fetch_array($select_image)){
        //         $user_image = $row['user_image'];
        //     }
        // }


        if (!empty($user_password)) {
            $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
            $get_user_query = mysqli_query($connection,  $query_password);
            confirmQuery($get_user_query);
            $row = mysqli_fetch_array($get_user_query);
            $db_user_password = $row['user_password'];
        }

        if ($db_user_password != $user_password) {

            $user_password = password_hash($user_password,  PASSWORD_BCRYPT,  array('cost' => 12));
        }

        $query = "UPDATE users SET ";
        $query .= "username = '{$username}',  ";
        $query .= "user_password = '{$user_password}',  ";
        $query .= "user_firstname = '{$user_firstname}',  ";
        $query .= "user_lastname = '{$user_lastname}',  ";
        $query .= "user_email = '{$user_email}',  ";
        // $query .= "user_image = '{$user_image}',  ";
        $query .= "user_role =  '{$user_role}' ";
        // $query .= "user_date = '{$user_date}' ";
        $query .= "WHERE user_id = '{$the_user_id}' ";
        $update_user = mysqli_query($connection,  $query);
        confirmQuery($update_user);
        echo "<p class='bg-success'>User Updated: " . " " . "<a href='users.php'>Edit More Users</a></p>";
    }
} else {
    header("Location: index.php");
}
?>
<h1 class="text-center">Edit User</h1>
<hr class="border border-primary border-3 opacity-75">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group my-3">
        <label for="username">Username</label>
        <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
    </div>
    <div class="form-group my-3">
        <label for="username">Password</label>
        <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group my-3">
        <label for="user_firstname">First Name</label>
        <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group my-3">
        <label for="user_lastname">Last Name</label>
        <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group my-3">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_email; ?>" type="text" class="form-control" name="user_email">
    </div>
    <div class="form-group my-3">
        <label for="user_role" class="form-label">User Role</label><br>
        <select class="form-select" name="user_role" id="user_role">
            <?php
            $query = "SELECT * FROM roles";
            $select_roles = mysqli_query($connection,  $query);
            confirmQuery($select_roles);
            while ($row = mysqli_fetch_assoc($select_roles)) {
                // $brand_id = $row['brand_id'];
                $role_title = $row['role_title'];
                if ($role_title == $user_role) {
                    echo "<option value='$role_title' selected>{$role_title}</option>";
                } else {
                    echo "<option value='$role_title'>{$role_title}</option>";
                }
            }
            ?>
        </select>
    </div>


    <div class="form-group my-3">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
    </div>
</form>