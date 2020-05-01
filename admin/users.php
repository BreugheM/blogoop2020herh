<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
$users = User::find_all();
?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Ophalen van alle users</h1>
        <hr>
        <a href="add_user.php" class="btn btn-success rounded-0 mb-3">
            <i class="fas fa-user-plus"></i>
            Add User
        </a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">photo</th>
                <th scope="col">username</th>
                <th scope="col">password</th>
                <th scope="col">firstname</th>
                <th scope="col">lastname</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                <th scope="row"><?php echo $user->id;?></th>
                    <td><img src="<?php echo $user->image_path_and_placeholder(); ?>" alt="" height="40"
                             width="40"></td>
                <td><?php echo $user->username;?></td>
                <td><?php echo $user->password;?></td>
                <td><?php echo $user->first_name;?></td><td><?php echo $user->last_name;?></td>
                    <td><a class="btn btn-danger rounded-0" href="delete_user.php?id=<?php echo $user->id;
                        ?>"><i class="far fa-trash-alt"></i></a></td>
                    <td><a class="btn btn-danger rounded-0" href="edit_user.php?id=<?php echo $user->id;
                        ?>"><i class="far fa-edit"></i></a></td>
            </tr>
            <?php endforeach; ?>

            <?php
               /*$user = new User();
                $user->username = "nieuwegebruiker";
                $user->password = md5(123456);
                $user->first_name = "d";
                $user->last_name = "e";
                $user->save();*/

            /*$userupdate->username = "ditisdelaatsteupdate";
            $userupdate->save();
            /*$userdelete->delete();*/

            ?>

            </tbody>
        </table>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>
