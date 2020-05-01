<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
$message = "";
//$photos = Photo::find_all();
if(empty($_GET['id'])){

    redirect('photos.php');
}else{
    //inlezen in het formulier
    $photo = Photo::find_by_id($_GET['id']);
    //dit zal het updaten zijn van het formulier
    if(isset($_POST['update'])){

        if($photo){

            $photo->title = trim($_POST['title']);
            $photo->description = trim($_POST['description']);
            $photo->alt = trim($_POST['alt']);
           /* $photo->type = trim($_POST['type']);
            $photo->size = trim($_POST['size']);*/
            $photo->save();
            redirect('photos.php');
        }
    }
}


?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Edit/Wijzig photo</h1>
        <hr>
        <form action="edit_photo.php?id=<?php echo $photo->id; ?>" method="post">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control"
                        value="<?php echo $photo->title; ?>">
                    </div>
                    <div class="form-group">
                        <a class="thumbnail" href="#">
                            <img src="<?php echo $photo->picture_path(); ?>" alt="">
</a>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="10">
                            <?php echo $photo->description; ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Alternate Text</label>
                        <input type="text" name="alt" class="form-control"
                               value="<?php echo $photo->alt; ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <p>
                        <i class="fas fa-calendar-alt"></i>Uploaded on: 1 April 2020
                    </p>
                    <p>
                        Photo Id: <span><?php echo $photo->id; ?></span>
                    </p>
                    <p>
                        Filename: <span><?= $photo->filename; ?></span>
                    </p>
                    <p>
                        File Size: <span><?php echo $photo->size; ?></span>
                    </p>
                </div>
                <div class="d-flex justify-content-around">
                    <a class="btn btn-danger btn-lg rounded-0" href="delete_photo.php?id=<?php echo $photo->id;
                    ?>">Delete</a>
                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg rounded-0">
                </div>
            </div>
        </form>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>
