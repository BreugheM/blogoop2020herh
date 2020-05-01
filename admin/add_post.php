<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
$post = new Post(); //lege instantie van de class Category
if(isset($_POST['add_post'])){
    $post->title = trim($_POST['title']);
    $post->description = trim($_POST['description']);
    $post->short_description = trim($_POST['short_description']);
    $post->category_id = trim($_POST['category_id']);
    $post->save();
    redirect('posts.php');
}
$categories = Category::find_all();

?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Add Post</h1>
        <hr>
        <form action="add_post.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group">
                        <label for="">title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">short_description</label>
                        <input type="text" name="short_description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Category name</label>

                        <select name="category_id" id="category_id">
                            <?php foreach ($categories as $category):?>
                            <option value="<?php echo $category->id ?>"><?php echo $category->name?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                 </div>
                <input type="submit" name="add_post" value="Add Post" class="btn btn-success btn-lg rounded-0">

            </div>
        </form>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>
