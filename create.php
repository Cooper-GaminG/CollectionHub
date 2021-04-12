<?php

    //var_dump($_POST);

    session_start();
    
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "collectorsedition";
    $message = "";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
    }  

    
      catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }


    ?>


<!DOCTYPE html>

<html lang="en">

    <head>

        <title>CollectionHub</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- <link rel="stylesheet" href="main.css"> -->

        <style>
            <?php include "main.css" ?> 
            /* using php to connect to a css file */
        </style>
      
    </head>
    
    <body>

    <div class="main">
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="index.php">CollectionHub</a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-navigation">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>                        
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Search">
                          </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

        

    <header class="page-header header container-fluid">
            <!-- <div class="overlay"></div>        -->
                        
            <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <h3 >Create your new Collection!</h3><br />  
                <form action="login_succes.php"  method="POST">  
                     <label>Collection Name</label>  
                     <input type="text" name="collectionname" class="form-control" />  
                     <br />  
                     <label>Collection Category</label>  
                     <input type="text" name="collectioncategory" class="form-control" />  
                     <br /> 
                     <input type="submit" name="create" class="btn btn-info" value="Create" />  
                </form>  
           </div>
        </header>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


        
    </body>
    
</html>