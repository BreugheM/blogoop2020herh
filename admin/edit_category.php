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

    redirect('categories.php');
}else{
    //inlezen in het formulier
    $category = Category::find_by_id($_GET['id']);
    //dit zal het updaten zijn van het formulier
    if(isset($_POST['update'])){

        if($category){

            $category->name = trim($_POST['name']);
            $category->save();
            redirect('categories.php');
        }
    }
}


?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Edit/Wijzig Category</h1>
        <hr>
        <form action="edit_category.php?id=<?php echo $category->id; ?>" method="post">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="name" class="form-control"
                        value="<?php echo $category->name; ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <p>
                        <i class="fas fa-calendar-alt"></i>Uploaded on: 1 April 2020
                    </p>
                    <p>
                        Category Id: <span><?php echo $category->id; ?></span>
                    </p>
                    <p>
                        Name: <span><?= $category->name; ?></span>
                    </p>
                </div>
                <div class="d-flex justify-content-around">
                    <a class="btn btn-danger btn-lg rounded-0" href="delete_category.php?id=<?php echo $category->id;
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
