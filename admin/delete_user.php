<?php include "includes/init.php";?>
<?php if (!$session->is_signed_in()) {redirect("login.php");}?>
<?php

if (empty($_GET['_id'])) {

    redirect(ADMIN_ROOT."users.php");

}

$user = User::find_by_id($_GET['id']);

if ($user) {

    $user->delete_photo();
    $session->message("The user has been deleted");
    redirect(ADMIN_ROOT."users.php");

} else {

    redirect(ADMIN_ROOT."users.php");

}

?>