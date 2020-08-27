<?php

class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    
    public static function verify_user($username, $password) {

        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $the_result_array = static::find_by_query("SELECT * FROM users WHERE username='{$username}' AND  password='{$password}' LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

   
    

}// END Class USER

?>