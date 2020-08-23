<?php

/*
Add space after Users and perhaps consider moving opening bracket to next line
which is a common stylguide approach for PHP classes. If you ultimately
intend for an instantiated object of this class to represent a single user,
then singular User would be a more appropriate name.
*/
class Users{

/*
Put each property declaration on its own line. It makes you code easier to read.
*/
  public $user_id, $user_name, $user_email, $user_fname, $user_lname, $user_role;

/*
This method doesn't display anything. Perhaps better name would be
get_all_users() or similar.  I don't know that this method adds
much value beyond what is in find_all_query below.  I think in this
case these methods could actually be combined so it is clear
what you are doing here (i.e. your SQL is not in a separate place).
Add space before opening function bracket (typical throughout code).
*/
  public static function display_users(){
/*
Should is not just be
$display_users = self::find_all_query(...); ?  Why add another level of 
array nesting?
Don't use SELECT *. It is wasteful of resources and makes your code more fragile
to database schema changes in the future.  Also, if you select only the fields
you want to put into the object, then you can do away with your
has_the_attribute method altogether.
*/
      $display_users[] = self::find_all_query("SELECT * FROM users");
/*
Why ternary here?  This line of code is hard to read. Split onto multiple lines.
This only handles happy path. If you fix the line of code above around setting
$display_users, you don't need to do array_shift().
Also, consider returning empty array here instead of false, for case when no
records are found and let the caller deal with it.
*/
      return (!empty($display_users)) ? array_shift($display_users) : false;
  }

/*
If this is only meant to be called by the display_users method, then make this
protected/private. Again, I don't see great need to split these two methods
apart. What you have done here is provide a way for any place in the code to 
execute arbitrary SQL against the database.  A very bad idea.
*/
  public static function find_all_query($sql){
/*
Don't use globals. Ever. It is a really poor programming practice that PHP made
way too easy to do in its early days and the rest of the world still has to deal
with it.  Just provide the class the dependencies it needs to operate, ideally
through the practice of dependency injection. For example in this case, you
could simply pass your DB connection to this method as a parameter.
You are doing nothing to validate that the parameter passed is what is expected
(i.e. a non-zero length string). You should always validate first and stop method execution for all public methods that accept parameters.
*/
    global $database;
/*
This is happy path only.  What if query fails?
*/
    $result = $database->query($sql);
    $db_result = array();
/*
Here is great example of how your DB class leaks implementation.  Why is that class not returning an array, instead requiring this class method to understand
that the result from query is mysqli_result.  Don't mix OO and procedural.
*/
    while($row = mysqli_fetch_assoc($result)){
      $db_result[] = self::instantiation($row);
    }

    return $db_result;

  }

/*
Why is this public?  You want any place in code to be able to pass an
associative array to create a user object?  Why is this not a constructor?
If you truly want this to be public method, you need to validate $row is a 
non-empty array before working with it.
*/
  public static function instantiation($row){

    $the_users_object = new Users();

    foreach ($row as $attribute => $data) {
/*
Here if you do your SQL select properly, you have no need to check values in
$row every single time, as you KNOW you have the proper fields configured.
*/
      if($the_users_object->has_the_attribute($attribute)){
        $the_users_object->$attribute = $data;
      }
    }
    return $the_users_object;
  }
/*
This function really has no value given other comments.
*/
  private function has_the_attribute($attribute){
     $users_properties = get_object_vars($this);
     return array_key_exists($attribute , $users_properties);
  }


}
?>
database.php

<?php
// require_once("init.php");

/*
Same formatting comment as for user class.
*/
class Database{
/*
Bad indentation here.
If you are trying to make singleton, this should be static.
*/
  private $connection;

/*
If you are trying to make singleton, the constructor must be private.
*/
      function __construct(){
        $this->open_db_connection();
/*
Remove whitespace line
*/

      }

/*
If you are making singleton, this method should be static as there should
be no need to instantiate this class in order to get a connection. Also
if making singleton, this method should check for previous existence of
a connection being stored on the class and simply return it rather than
always creating a new connection.
*/
      public function open_db_connection(){
/*
Bad indentation This is happy path.  You should validate you have valid
mysqli object instantiated before assigned to connection.
*/
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
/*
Don't die from within this code and defintely don't leak your error messages to
end users.  Perhaps log the error here and throw and exception to let calling
code figure out what to do (i.e. provide messaging to user). A database class
should know nothing about end user messaging.
*/
          if($this->connection -> connect_error){
            die('<h1>Database Connection Failed!!!!</h1>.'. $this->connection -> connect_error);
          }

      }

/*
This seems like sort of a trivial method. What value does it really add? How
flexible is this to different query use cases?  Again, see notes above about
error messaging.
*/
      private function checkQuery($query){
        if(!$query){
          die("<h1>Query Failed!!!!</h1> ". $this->connection -> error);
        }
      }

/*
Validate input. What value does this method really add to code using this object?
*/
      public function query($sql){
        $result = mysqli_query($this->connection , $sql);
        $this->checkQuery($result);
        return $result;
/*
Remove extra line
*/

      }

}
// So what is going on?
// Here are some of the things our app is doing!


// What each method is doing ....Let's  use the User class for example 

//  User::find_all()  ... Here is the flow once is called 

// 1.   It goes to the find_all method 

// 2. The find_all() returns the find_by_query() results 

// 3. The find_by_query()  does a couple things 

//        1. it makes the query 

//         2. Fetches the the data from database table using  a while loop and it returns it in $row

//         3. Passes the results ($row) to the Instantiation (instantiation - weird name I know) method

//         4. Returns the object in the $the_object_array variable that it gets from the  instantiation method.

//         5. And that will be the result that find_all() returns when we use User::find_all()



//   What the Instantiation method is doing

//    1. Gets the calling class name.

//    2. Creates an instance of the class

//    3. It loops through the $the_record variable that has all the records

//    4. It checks to see if the properties exist on that object with the other method has_the_property() 

//    5. If the keys from the record which basically are the columns from db table are found or equal the object properties then it assigns    the values to them.

//   6. Finally it returns the object!



// The purpose of this is to basically create our own API to deal with the database query so that in the future we can plug in other API's. Now there still a couple things I want to improve to make this way better, cleaner and more universal. 