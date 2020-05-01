<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
$roles = Role::find_all();

?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Ophalen van alle roles</h1>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">role</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach($roles as $role): ?>
                <tr>
                <th scope="row"><?php echo $role->id;?></th>
                <td><?php echo $role->role;?></td>

            </tr>
            <?php endforeach; ?>

            <?php
               $user = new User();
              $user->username = "nieuwegebruiker";
            $user->password = md5(123456);
            $user->first_name = "d";
            $user->last_name = "e";
            $user->save();

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
