<?php include "includes/header.php";?>



<?php 

$photos= Photo::find_all();
?>











<div class="row">

    <!-- Blog Entries Column -->

    <div class="col-md-12">

<?php foreach ($photos as $photo) : ?>

<div class="thumbnail row">

<div class="col-xs-6 col-md-3">




</div>




</div>



<?php endforeach; ?>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <!-- <div class="col-md-4">


        <?php //include "includes/sidebar.php";?>


    </div> -->
    <!-- /.row -->
 </div>
    <?php include "includes/footer.php";?>