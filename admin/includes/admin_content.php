
            <div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Admin
            <small>Subheading</small>
        </h1>
            <?php 
            
        

        //     $result_set = User::find_all_users();
        
        //    while($row=mysqli_fetch_array($result_set)){
          
        //         echo $row['username'] . "<br>";
          
         
        //    }

        //   $maulik = Photo::find_by_id(1);
        //   print_r($maulik);
        //    $user=Photo::instantiation($maulik);
        //    print_r($user);
        //     echo $user->photo_id;
        //    echo "<br>";
        //    echo $user->title;
        //    echo "<br>";
        //    echo $user->description;
        //    echo "<br>";
        //    echo $user->type;
        //    echo "<br>";
        //    echo $user->size;

        //    $photos =Photo::find_all();
        //    foreach($photos as $photo){

        //       echo $photo->title . "<br>";
        //       echo $photo->description . "<br>";
        //       echo $photo->filename . "<br>";
        //       echo $photo->type . "<br>";
        //       echo $photo->size . "<br>";
        //    }

        // public static function verify_user($username,$password){

        //     global $database;
        
        //     $username = $database->escape_string($username);
        //     $password = $database->escape_string($password);
        
        //     $the_result_array = self::find_this_query("SELECT * FROM users WHERE username='{$username}' AND  password='{$password}' LIMIT 1");
        
        //     return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
        //   }

            // $user = new User();

            // $user->username ="edwin";
            // $user->password ="superman";
            // $user->first_name = "edwin";
            // $user->last_name = "diez";

            // $user->save();

  echo INCLUDES_PATH;

            //   $user= User::find_users_by_id();
             
            //   $user->username = "sham";
            //   $user->last_name = "patel";
            //   $user->create();

            $photo=new Photo();
            $photo->title ="fenil";
            $photo->size ="100022";
            $photo->create();


  
            ?>

        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->