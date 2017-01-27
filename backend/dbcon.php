<?php
/*
  == This page gice the permission to the website to access the database!
*/
  $dsn     =  'mysql:host=Localhost;dbname=exchangeoffice'; // database name and host
  $name    =  'root';
  $pass    =  '';
  $options =  array('PDO:MYSQL_ATTR_INIT_COMMAND' => 'set NAMES utf8'); // To support Arabic language!

  // I will let the server try to connect to the Database with PDO.
  try
  {
    $db = NEW PDO($dsn , $name , $pass , $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  // If the server can't connect,
  // I will let his print the following message to let me know that [There is an exception ].
  catch (Exception $e)
  {
    echo "Can't connect with database!!!  >> ". $e->getmessage();
  }

?>
