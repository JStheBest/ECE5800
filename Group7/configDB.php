<?php
    //this is my database I created try it on your own database
    //Access denied for user 'root'@'localhost' (using password: YES) 
    /*
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '12345678');
   define('DB_DATABASE', 'database');
*/

   $serverme = "localhost";
   $dBUsername = "root";
   $dBPassword = "";
   $dBName = "loginsystem";
   $db = mysqli_connect($serverme,$dBUsername,$dBPassword,$dBName);
    if (!$conn)
    {
        die ("Connection failed: ".mysqli_connect_error());
    }
    echo "Connected successfully";
?>