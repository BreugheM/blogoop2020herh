<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
if(!$session->is_signed_in()){
    redirect("login.php");
}
$message = "";
$categories = Category::find_all();

?>
<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Ophalen van alle categories</h1>
        <a href="add_category.php" class="btn btn-success rounded-0 mb-3">
            <i class="fas fa-user-plus"></i>
            Add Category
        </a>
        <hr>
        <table class="table">
            <thead>
            <tr>

                <th scope="col">id</th>
                <th scope="col">name</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach($categories as $category):?>

                <tr>
                <th scope="row"><?php echo $category->id;?></th>


                    <td><?php echo $category->name;?></td>

                    <td><a class="btn btn-danger rounded-0" href="delete_category.php?id=<?php echo $category->id;
                        ?>"><i class="far fa-trash-alt"></i></a></td>
                    <td><a class="btn btn-danger rounded-0" href="edit_category.php?id=<?php echo $category->id;
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
