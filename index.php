<?php include "includes/header.php";?>



<?php 

$page= !empty($_GET['page'])?$_GET['page']




$photos= Photo::find_all();
?>




<div class="row">

    <!-- Blog Entries Column -->

    <div class="col-md-12">
        <div class="thumbnail row">
            <?php foreach ($photos as $photo) : ?>

                

            <div class="col-xs-6 col-md-3">

                <a class="thumbnail" href="photo.php?id=<?php echo$photo->id;?>">

                    <img class ="img-responsive home_page_photo" src="admin/<?php echo $photo->picture_path();?>" alt=""  >


                </a>


            </div>


            <?php endforeach; ?>

        </div>

    </div>

</div>

<?php include "includes/footer.php";?>