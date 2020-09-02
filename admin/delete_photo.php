<?php include "includes/init.php";?>
<?php if (!$session->is_signed_in()) {redirect("login.php");}?>
<?php

if (empty($_GET['_id'])) {

    redirect(ADMIN_ROOT."photos.php");

}

$photo = Photo::find_by_id($_GET['id']);

if ($photo) {

    $photo->delete_photo();
    $session->message("The {$photo->filename} has been deleted");
    redirect(ADMIN_ROOT."photos.php");

} else {

    redirect(ADMIN_ROOT."photos.php");

}

?>