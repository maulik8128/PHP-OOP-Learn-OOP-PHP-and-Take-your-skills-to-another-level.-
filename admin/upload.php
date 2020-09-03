<?php include "includes/header.php";?>
<?php if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php 
$massage="";
if(isset($_FILES['file'])){

$photo = new Photo();
$photo->title=$_POST['title'];
$photo->user_id=$_SESSION['user_id'];
$photo->set_file($_FILES['file']);

if($photo->save()){

    $massage = "Photo uploaded Successfully";
}else{

    $massage = join("<br>",$photo->errors);

}


}





?>



<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <?php include "includes/top_nav.php"?>





    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include "includes/side_nav.php"?>
    <!-- /.navbar-collapse -->

</nav>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Uploads
                    <small></small>
                </h1>

                <div class="row">
                <div class="col-md-6">

                <?php echo $massage; ?>
                    <form action="upload.php" method="post" enctype="multipart/form-data" >

                        <div class="form-group">

                            <input type="text" name="title" class="form-control">

                        </div>

                        <div class="form-group">

                            <input type="file" name="file" >

                        </div>

                        <input type="submit" class="btn btn-primary" name="submit">

                    </form>

                </div>

                </div>
                <div class="row">
                
                <div class="col-lg-12">
                
                <form action="upload.php" class ="dropzone">
                
                
                <div class="fallback">
                              <input name="file" type="file" multiple >
                       </div>
                
                </form>
                         
                </div>
                
                </div>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes/footer.php";?>