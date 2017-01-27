<?php
/*
  == This is page for the users that need to have an account in our website [signup page]
*/
  session_start();
  // What if the session has an info that there're a user logined, so Why he will signup.
  // Logined means that he already has an account _*_*
  isset($_SESSION['user']) ? header('Location: ../index.php') : '';

  // database connection included
  include('dbcon.php');

  // Check if the client enters this page from a Post request!
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    // Post request for his/her ifno.
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $fullname = $_POST['fullname'];
    $pass     = $_POST['password'];

    // insert the comming info to the database!
    $stmt     = $db->prepare('INSERT INTO users (username , email , fullname,  password)
                              VALUES(:zusername, :zemail , :zfullname , :zpass)');
    $stmt->execute(array(
                        'zusername' => $username,
                        'zemail'    => $email,
                        'zfullname' => $fullname,
                        'zpass'     => $pass,
                        ));

    // check if The info inserted correctly?
    if($stmt->rowCount() > 0)
    {
        // redirect to congratulation page [ you have an account now! ]
        header("Location: ../congrate.php");
    }
    // If the insertion has an error?
    else
    {
      // print the comming message to retry again
      echo "error in your data! ^*^";
    }
  }
  else
  {
    echo 'none';
  }

?>
