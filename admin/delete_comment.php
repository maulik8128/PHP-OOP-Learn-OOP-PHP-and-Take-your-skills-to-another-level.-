<?php include "includes/init.php";?>
<?php if (!$session->is_signed_in()) {redirect("login.php");}?>
<?php

if (empty($_GET['_id'])) {

    redirect(ADMIN_ROOT."comments.php");

}

$comment = Comment::find_by_id($_GET['id']);

if ($comment) {

    $comment->delete();
    $session->message("The comment with {$comment->id} has been deleted");
    redirect(ADMIN_ROOT."comments.php");

} else {

    redirect(ADMIN_ROOT."comments.php");

}

?>