<style media="screen">
    .wrapper a img{
      width: 25%;
      margin-top: 17px;
    }
</style>
<?php
/*
  == This page For sending the Login information To database to compare it with the exsiting info.
  == It will check if there is a user with the infomation that comes from the login form in database or not!
  == To decide neither redirect to the main page as an exsiting user or to print " This info isn't right please try again".
*/
session_start();


// If the user have an info in the session that he is logined so there is no need to login again!
isset($_SESSION['user']) ? header('Location: ../index.php') : '';
// Database connectio included.
include('dbcon.php');

// Check if the client enters this page from a Post request!
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  // Post request for his/her ifno.
  $username = $_POST['username'];
  $pass     = $_POST['password']; // password

  // Now let's check if this info belongs to the users database!
  $stmt     = $db->prepare('SELECT userid , username , password From users WHERE username = ? AND password = ?');
  $stmt->execute(array($username, $pass));
  $row      = $stmt->fetch();

  // If this info founded in databse, let's say So this user id logined!
  if($stmt->rowCount() > 0)
  {
    // Store the user id and name to depend on them to assure that,
    // This user doesn't need to login again through this brwoser!
    $_SESSION['user'] = $row[userid];
    $_SESSION['username'] = $row[username];

    // Redirect To the main page!
    header('Location: ../index.php');
  }
  // If the user info doesn't belong to the databse, So we can't redirect him to the main page!
  // He've to Try again!
  else
  {
    header('Location: ../login.php');
  }
}
else{
  echo 'none';
}

?>
