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

    redirect('posts.php');
}else{
    //inlezen in het formulier
    $post = Post::find_by_id($_GET['id']);
    //dit zal het updaten zijn van het formulier
    if(isset($_POST['update'])){

        if($post){

            $post->title = trim($_POST['title']);
            $post->description = trim($_POST['description']);
            $post->short_description = trim($_POST['short_description']);
            $post->category_id = trim($_POST['category_id']);
            $post->save();
            redirect('posts.php');
        }
    }
}
$categories = Category::find_all();

?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Edit/Wijzig Post</h1>
        <hr>
        <form action="edit_post.php?id=<?php echo $post->id; ?>" method="post">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">title</label>
                        <input type="text" name="title" value="<?= $post->title; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">description</label>
                        <input type="text" name="description" value="<?= $post->description; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">short_description</label>
                        <input type="text" name="short_description" value="<?= $post->short_description; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Category name</label>

                        <select name="category_id" id="category_id">
                            <?php foreach ($categories as $category):?>
                                <option value="<?php echo $category->id ?>"><?php echo $category->name?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="d-flex justify-content-around">
                        <a class="btn btn-danger btn-lg rounded-0" href="delete_post.php?id=<?php echo $post->id;
                        ?>">Delete</a>
                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg rounded-0">
                    </div>
                </div>


            </div>
        </form>
    </div>
</div>
<!--End Page Content-->

<?php
include("includes/footer.php");
?>
