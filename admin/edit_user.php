<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
/**kijken of er een id in de url aanwezig is*/
if(empty($_GET['id'])){
    redirect('users.php');
}
/**ophalen van de aangeklikte user*/
$user = User::find_by_id($_GET['id']);

/*wegschrijven data in DB*/
if(isset($_POST['update_user'])){
    if($user){
        $user->role_id = trim($_POST['role']);
        $user->username  = trim($_POST['username']);
        $user->first_name  = trim($_POST['first_name']);
        $user->last_name  = trim($_POST['last_name']);
        $user->password  = trim($_POST['password']);
        if(empty($_FILES['user_image'])){
            $user->save();
        }else{
            $user->set_file($_FILES['user_image']);
            $user->save_user_and_image();
        }
        redirect('users.php');
    }
}
?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Edit/Wijzigen User</h1>
        <hr>
        <form action="edit_user.php?id=<?php echo $user->id;  ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control"
                        value="<?php echo $user->username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" name="first_name" class="form-control"
                               value="<?php echo $user->first_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" class="form-control" 
                               value="<?php echo $user->last_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control"
                               value="<?php echo $user->password; ?>">
                    </div>
                    <div class="form-group">
                        <img class="img-fluid"  width="40" height="40"
                             src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                        <label for="">User image</label>
                        <input type="file" name="user_image" class="form-control">
                    </div>
                 </div>
                <div class="d-flex">
                    <input type="submit" name="update_user" value="Update User"
                           class="btn btn-warning btn-lg rounded-0">
                    <a href="delete_user.php?id=<?php echo $user->id; ?>"  class="btn btn-danger btn-lg rounded-0">Delete
                        User</a>
                </div>

            </div>
        </form>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>
