    <?php
    include("delete_user.php");
    if (!is_admin($_SESSION['username'])) {

        header("Location: index.php");
    }

    if (isset($_GET['delete'])) {
        $user_id = $_GET['delete'];

        $query = "DELETE FROM users WHERE user_id = {$user_id}";
        $delete_query = mysqli_query($connection,  $query);

        // $query = "SELECT comment_post_id FROM comments WHERE comment_id = {$the_comment_id}";
        // $post_id = mysqli_query($connection,  $query);   

        // $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE post_id = $post_id";
        // $update_comment_count = mysqli_query($connection, $query);

        header("Location: users.php");
    }
    ?>
    <h1 class="text-center">All Users</h1>
    <hr class="border border-primary border-3 opacity-75">
    <form action="" method="post">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>


                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM users";
                $select_users = mysqli_query($connection,  $query);

                while ($row = mysqli_fetch_assoc($select_users)) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_role = $row['user_role'];
        ;



                    echo "<tr>";
                    echo "<td>$user_id</td>";
                    echo "<td>$username</td>";
                    echo "<td>$user_firstname</td>";
                    echo "<td>$user_lastname</td>";
                    echo "<td>$user_email</td>";
                    // $query = "SELECT * from roles";
                    // $get_title = mysqli_query($connection,  $query);
                    // while ($row = mysqli_fetch_assoc($get_title)) {
                    //     $role_id = $row['role_id'];
                    //     $role_title = $row['role_title'];
                    // }
                    echo "<td>$user_role</td>";
         

                    echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
                    echo "<td><a rel='{$user_id}' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </form>

    <script>
        $(document).ready(function() {

            $(".delete_link").on('click', function() {
                var id = $(this).attr("rel");
                var delete_url = "products.php?delete=" + id + " ";
                $(".modal_delete_link").attr("href", delete_url);
                $("#deleteUserModal").modal('show');
            })
        })
    </script>