<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
$user = new User(); //lege instantie van de class USER
if(isset($_POST['add_user'])){
    $user->username  = trim($_POST['username']);
    $user->first_name  = trim($_POST['first_name']);
    $user->last_name  = trim($_POST['last_name']);
    $user->password  = trim($_POST['password']);
    $user->set_file($_FILES['user_image']);
    $user->save_user_and_image();
    redirect('users.php');
}
?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Add User</h1>
        <hr>
        <form action="add_user.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">User image</label>
                        <input type="file" name="user_image" class="form-control">
                    </div>
                 </div>
                <input type="submit" name="add_user" value="Add User" class="btn btn-success btn-lg rounded-0">

            </div>
        </form>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>
