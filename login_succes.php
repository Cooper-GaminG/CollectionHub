<?php

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




      catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }



    if(isset($_SESSION["username"]))  
    {  
      echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';  
      echo '<br /><br /><a href="logout.php">Logout</a>';  
    }    
    else  
    {  
      header("location:login.php");  
    }

?>