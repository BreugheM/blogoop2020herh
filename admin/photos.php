<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
$message = "";
$photos = Photo::find_all();

?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Ophalen van alle foto's</h1>
        <hr>
        <table class="table">
            <thead>
            <tr>

                <th scope="col">id</th>
                <th scope="col">photo</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">filename</th>
                <th scope="col">type</th>
                <th scope="col">size</th>
                <th scope="col">alt</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($photos as $photo):?>

                <tr>
                <th scope="row"><?php echo $photo->id;?></th>
                    <td><!--<img src="http://placehold.it/62x62" height="62" width="62" alt="">-->
                        <img src="<?php echo $photo->picture_path(); ?>" height="62" width="62" alt="">
                    </td>
                    <td><?php echo $photo->title;?></td>

                    <td><?php echo $photo->description;?></td>
                    <td><?php echo $photo->filename;?></td>
                    <td><?php echo $photo->type;?></td>
                    <td><?php echo $photo->size;?></td>
                    <td><?php echo $photo->alt;?></td>
                    <td><a class="btn btn-danger rounded-0" href="delete_photo.php?id=<?php echo $photo->id;
                        ?>"><i class="far fa-trash-alt"></i></a></td>
                    <td><a class="btn btn-danger rounded-0" href="edit_photo.php?id=<?php echo $photo->id;
                        ?>"><i class="far fa-edit"></i></a></td>
                    <td><a class="btn btn-danger rounded-0" href="../photo.php?id=<?php echo $photo->id;
                        ?>"><i class="fas fa-eye"></i></a></td>
                    <td><a class="btn btn-danger rounded-0" href="comments_photo.php?id=<?php echo $photo->id;
                        ?>"><i class="fas fa-comment"></i></a></td>
            </tr>
            <?php endforeach; ?>



            </tbody>
        </table>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>
