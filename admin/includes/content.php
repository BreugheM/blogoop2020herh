<!--Begin Page Content-->
<div class="row">
    <div class="col-12">
        <h1 class="page-header">Testen Db connectie</h1>
        <hr>
       <h2>Ophalen van een user</h2>
        <?php


       $sql = "SELECT * FROM users WHERE id= 1";
       $result = $database->query($sql);
       $user_found = mysqli_fetch_array($result);
       echo $user_found["username"];



        ?>
    </div>
</div>
<!--End Page Content-->
