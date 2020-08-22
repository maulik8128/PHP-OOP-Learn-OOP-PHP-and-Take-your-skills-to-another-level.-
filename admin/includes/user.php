<?php 


class User{
 

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


   public static function find_all_users(){
     global $database;

     return self::find_this_query("SELECT * FROM users");


    }
    public static function find_users_by_id($user_id){
        global $database;
   
        $result_set = self::find_this_query("SELECT * FROM users WHERE id=$user_id LIMIT 1");  //LIMIT 1
        $found_user=mysqli_fetch_array($result_set);
        return $found_user;
   
   
       }
       public static function find_this_query($sql){
        global $database;
   
        $result_set = $database->query($sql);
        return $result_set;
      
       }

public static function instantiation($found_user){

    $the_object = new self;

    $the_object->id        =$found_user['id'];
    $the_object->username  =$found_user['username'];
    $the_object->password  =$found_user['password'];
    $the_object->first_name=$found_user['first_name'];
    $the_object->last_name =$found_user['last_name'];

  return $the_object;


}



}











?>