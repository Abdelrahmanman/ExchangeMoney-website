<?php
/*
  == This page will insert the user comment or his feedback into the office database!
*/
  session_start();
  // There is no user can comment or sending feedback without registeration.
  // So, if the client tries to send a feedback without log-in, he will redirect To The login page.
  ! isset($_SESSION['user']) ? header('Location: ../login.php') : '';
  // Databse connection included!
  include('dbcon.php');

  // check if the client enters this page from a post request!
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    // post request for his/her the userid and his feedback[comment].
    $userid  = $_POST['userid'];
    $comment = $_POST['comment'];

    // This statement for inserting the feedback of the user into the office database!
    $stmt = $db->prepare('INSERT INTO comments (comment , comdate , userid) VALUES (:zcomment , now() , :zuserid)');
    $stmt->execute(array ('zcomment' => $comment , ':zuserid' => $userid ));

    // Check if the insertion is executed correcly or not?
    if($stmt->rowCount() > 0)
    {
      // Correctly executed >> redirect to the main page to complete his visit of our website!
      header('Location: ../index.php');
    }
  }

?>
