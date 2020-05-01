<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
$category = new Category(); //lege instantie van de class Category
if(isset($_POST['add_category'])){
    $category->name  = trim($_POST['name']);
    $category->save();
    redirect('categories.php');
}
?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Add Category</h1>
        <hr>
        <form action="add_category.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group">
                        <label for="">Category name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                 </div>
                <input type="submit" name="add_category" value="Add Category" class="btn btn-success btn-lg rounded-0">

            </div>
        </form>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>
