<?php
include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}
if(empty($_GET['id'])){
    redirect('posts.php');
}
$post = Post::find_by_id($_GET['id']);
if($post){
    $post->delete();
    redirect('posts.php');
}else{
    redirect('posts.php');
}
include("includes/sidebar.php");
include("includes/content-top.php");?>
<h1>Welkom op de delete pagina van posts</h1>
<?php
include("includes/footer.php");
?>








