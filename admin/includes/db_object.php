<?php 

class Db_object {

    protected static $db_table = "users";
    public static function find_all() {
        global $database;

        return static::find_this_query("SELECT * FROM " . static::$db_table . " ");

    }
    public static function find_by_id($user_id) {
        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM" . static::$db_table . "WHERE id=$user_id LIMIT 1"); //LIMIT 1
        // $found_user=mysqli_fetch_array($the_result_array);

        return !empty($the_result_array) ? array_shift($the_result_array) : false; //if statement short method
        // if (!empty($the_result_array)) {
        //     $first_item = array_shift($the_result_array);
        //     return $first_item;
        // } else {
        //     return false;
        // }
      
    }
    public static function find_this_query($sql) {
        global $database;

        $result_set = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result_set)) {

            $the_object_array[] = static::instantiation($row);

        }
        return $the_object_array;

    }


    public static function instantiation($the_record) {


        $calling_class = get_called_class();
        $the_object = new $calling_class;

        // $the_object->id        =$found_user['id'];
        // $the_object->username  =$found_user['username'];
        // $the_object->password  =$found_user['password'];
        // $the_object->first_name=$found_user['first_name'];
        // $the_object->last_name =$found_user['last_name'];

        foreach ($the_record as $the_attribute => $value) {

            if ($the_object->has_the_attribute($the_attribute)) {

                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;

    }

    private function has_the_attribute($the_attribute) {

        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);
    }

    public static function verify_user($username, $password) {

        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $the_result_array = static::find_this_query("SELECT * FROM users WHERE username='{$username}' AND  password='{$password}' LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }







}




























?>