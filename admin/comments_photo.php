<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}

if(empty($_GET['id'])){
    redirect("photos.php");
}

$comments = Comment::find_the_comments($_GET['id']);
?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Posted comments for this photo</h1>
        <hr>
        <a href="add_user.php" class="btn btn-success rounded-0 mb-3">
            <i class="fas fa-comment"></i>
            Add Comment
        </a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">author</th>
                <th scope="col">body</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($comments as $comment): ?>
                <tr>
                    <th scope="row"><?php echo $comment->id;?></th>
                    <!--<td><img src="<?php /*echo $user->image_path_and_placeholder(); */?>" alt="" height="40"
                             width="40"></td>-->
                    <td><?php echo $comment->author;?></td>
                    <td><?php echo $comment->body;?></td>
                    <td><a class="btn btn-danger rounded-0" href="delete_comment.php?id=<?php echo $comment->id;
                        ?>"><i class="far fa-trash-alt"></i></a></td>

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
