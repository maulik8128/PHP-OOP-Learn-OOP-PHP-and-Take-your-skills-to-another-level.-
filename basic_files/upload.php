<?php
if (isset($_POST['submit'])) {

    // echo "<pre>";

    // print_r($_FILES['file_upload']);

    // echo "<pre>";
    $upload_errors = array(

        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "uploaded file size exceed max file size",
        UPLOAD_ERR_FORM_SIZE => "uploaded file exceeds max file size directive",
        UPLOAD_ERR_PARTIAL => "only partially uploiaded",
        UPLOAD_ERR_NO_FILE => "no file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "missing a temp folder",
        UPLOAD_ERR_CANT_WRITE => "failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "a php extension stopped the file upload",

    );
    $temp_name = $_FILES['file_upload']['tmp_name'];
    $the_file = $_FILES['file_upload']['name'];
    $directory = "uploads";

    if (move_uploaded_file($temp_name, $directory . "/" . $the_file)) {

        $the_message = "FILE UPLOADED SUCCESSFULLY";

    } else {

        $the_error = $_FILES['file_upload']['error'];

        $the_message = $upload_errors[$the_error];

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="upload.php" class="" enctype="multipart/form-data" method="post">

        <h2 class="">

            <?php
if (!empty($upload_errors)) {

    echo "$the_message";
}

?>


        </h2>

        <input type="file" name="file_upload" class=""><br>
        <input type="submit" name="submit" class="btn btn-primary">



    </form>





</body>

</html>