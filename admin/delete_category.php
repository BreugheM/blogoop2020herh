<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}
if(empty($_GET['id'])){
    redirect('categories.php');
}
$category = Category::find_by_id($_GET['id']);
if($category){
    $category->delete();
    redirect('categories.php');
}else{
    redirect('categories.php');
}
include("includes/sidebar.php");
include("includes/content-top.php");?>
<h1>Welkom op de delete pagina van categories</h1>
<?php
include("includes/footer.php");
?>








