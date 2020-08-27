<?php 

class Photo extends Db_object{


    protected static $db_table = "photos";
    protected static $db_table_fields = array('photo_id','title', 'description', 'filename','type','size');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";
    public $custom_errors = array();
    public $upload_errors_array = array(

        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "uploaded file size exceed max file size",
        UPLOAD_ERR_FORM_SIZE => "uploaded file exceeds max file size directive",
        UPLOAD_ERR_PARTIAL => "only partially uploiaded",
        UPLOAD_ERR_NO_FILE => "no file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "missing a temp folder",
        UPLOAD_ERR_CANT_WRITE => "failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "a php extension stopped the file upload",

    );









}

































?>