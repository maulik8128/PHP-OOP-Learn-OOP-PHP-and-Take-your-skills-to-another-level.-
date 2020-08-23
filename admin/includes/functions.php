<?php 

function classAutoLoader($class){

 $class = strtolower($class);

 $the_path= "includes/{$class}.php";


 if(is_file($the_path)&& !class_exists($class)){

   
 }else{

   die("This file name {$class}.php was not found man...");
 }

}

spl_autoload_register('classAutoloader');

function redirect($location){

  header("Location:{$location}");
  
}






?>