<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
$posts = Post::find_all();


?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Ophalen van alle Posts</h1>
        <a href="add_post.php" class="btn btn-success rounded-0 mb-3">
            <i class="fas fa-user-plus"></i>
            Add Post
        </a>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">short_description</th>
                <th scope="col">category_name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($posts as $post): ?>
            <?php $category = Category::find_by_id($post->category_id) ?>
                <tr>
                    <th scope="row"><?php echo $post->id;?></th>
                    <td><?php echo $post->title;?></td>
                    <td><?php echo $post->description;?></td>
                    <td><?php echo $post->short_description;?></td>
                    <td><?php echo $category->name;?></td>

                    <td><a class="btn btn-danger rounded-0" href="delete_post.php?id=<?php echo $post->id;
                        ?>"><i class="far fa-trash-alt"></i></a></td>
                    <td><a class="btn btn-danger rounded-0" href="edit_post.php?id=<?php echo $post->id;
                        ?>"><i class="far fa-edit"></i></a></td>

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

