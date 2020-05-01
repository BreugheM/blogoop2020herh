<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
$message = "";
if(isset($_POST['submit'])){
    //hier komen mijn velden uit het formulier
    $photo = new Photo();
    $photo->title = trim($_POST['title']);
    $photo->description = trim($_POST['description']);
    $photo->alt = trim($_POST['alt']);
    $photo->set_file($_FILES['file']);

    if($photo->save()){
        $message = "Foto succesvol opgeladen!";
    }else{
        $message = join("<br>", $photo->errors);
    }
}

?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Opladen van een foto</h1>
        <hr>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea class="form-control" name="description" id="description" cols="30"
                                  rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="alt">Alternate text</label>
                        <input type="text" name="alt" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Opladen" class="btn btn-primary">
                </div>
            </div>




        </form>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>
