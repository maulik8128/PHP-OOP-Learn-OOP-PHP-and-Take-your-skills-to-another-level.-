<?php require_once "init.php";?>
<?php

if ($session->in_signed_in()) {

    redirect("index.php");
}

if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    ///method to check database user

    if ($use_found) {

        $session->login($user_found);
        redirect("index.php");
    } else {

        $this_message = "your password or username are incorrect";
    }

} else {

    $username = "";
    $password = "";

}

?>
