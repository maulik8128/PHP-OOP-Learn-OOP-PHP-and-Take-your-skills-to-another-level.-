<?php
class Maulik {

    private $name = 10;

    // function __construct() {

    //     echo "constructor called </br>";

    //     $this->show();
    //     $this->ram();
    //     $this->meet();

    // }

     private function show() {

        echo "show object called  ";
        echo $this->name = 12222;
        echo "<br> ";

    }

    function ram() {

        echo "ram object called ";
        echo $this->name=666;
        echo "<br> ";

    }
    function meet() {

        echo "meet object called";
        echo $this->name=55;
        echo "<br> ";

    }

}

//$user = new Maulik();

// $user->name=1020;
// $user->meet();

// $user->show();

class edwin extends Maulik {

   
    function hello(){
      echo "hello object called";
      echo $this->name;
      echo "<br> ";

    }



}

$obj= new edwin();


$obj->hello();
 $obj->name = 100000000;
 //$obj->show();
 $obj->meet();
 $obj->ram();

?>