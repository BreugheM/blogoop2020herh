<?php
    include("includes/header.php");
    include("includes/navigatie.php");
    $photos = Photo::find_all();
?>
<div class="container-fluid">
    <div class="row my-5">
        <?php foreach($photos as $photo): ?>
            <div class="col-lg-4">
                <div class="card border-success mb-3 ">
                    <div class="card-header bg-transparent"><?= $photo->title; ?></div>
                    <img src="<?="admin".DS. $photo->picture_path(); ?>" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h5 class="card-title "><?= $photo->title; ?></h5>
                        <p class="card-text"><?= $photo->description; ?></p>
                    </div>
                    <div class="card-footer bg-transparent">Footer</div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>
</div>

<?php
    include("includes/footer.php");
?>









