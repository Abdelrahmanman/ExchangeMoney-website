<?php
/*
  == This page For sending the question comming from the clients To the Datebase!
*/

  session_start();
  // There is no user can question without registeration.
  // So, if the client tries to send a question without log-in, he will redirect To The login page.
  ! isset($_SESSION['user']) ? header('Location: ../login.php') : '';
  // Databse connection included!
  include('dbcon.php');

  // Check if the client enters this page from a post request!
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    // Post request for his/her question.
    $question = $_POST['question'];

    // This statement for inserting the question of the user into the office database!
    $stmt = $db->prepare('INSERT INTO questions(question , userid) VALUES (:zquestion , :zuserid)');
    $stmt->execute(array ('zquestion' => $question , 'zuserid' => $_SESSION['user']));

    // Check if the insertion is executed correcly or not?
    if($stmt->rowCount() > 0)
    {
      // Correctly executed >> redirect to the page that will assure that The question is sended!
      header('Location: ../yourquestion.php');
    }
  }
?>
