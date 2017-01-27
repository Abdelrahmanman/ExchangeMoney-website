<?php
/*
  == This is the most important page, it's the goal of our website!
  == As you know the user will visit our website to exchange his currency to another one!
  == So This is the currency page *****
*/
  session_start();
  /* Of course There is no user can exchange money without registeration.
   So, if the client tries to exchange without log-in, he will redirect To The login page.
  */
  ! isset($_SESSION['user']) ? header('Location: ../login.php') : '';
  // database connection included!
  include('dbcon.php');

  // The user will select his currency , the needed currency and the quantity, his request should
  // Arrice to this page by a post method, so we've to check for that!
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    // His currency , the needed currency and the quantity
    $cur1     = $_POST['cur1'];          // His currency
    $cur2     = $_POST['cur2'];         //  The needed currency
    $quantity = $_POST['quantity'];    //   The amount [ quantity ]

    // I need to fetch the his currency name depend on it's value that comming form the post request [ select box ]!
    // So let's do it!
    // Pricetodollar [the currency values compared with the dollar calue]
    $stmt = $db->prepare('SELECT curname FROM currencies WHERE pricetodollar = ?');
    // Execute [ the $cur2 is the needed currency!,
    // You will know why I need to fetch it depend on this just complete! ]
    $stmt->execute(array($cur2));
    $to = $stmt->fetch();

    /*
      == This is the important part!
      == I need to exchange the user currency to the needed currency, So we need to put a math equation in a result variable!
      == I will take the current currency of the user,
      == Then I will convert it to it's value in dollar, [ because of the dollar is the general [suitable] currency to compare with ].
      == Then I will convert it to the needed currency!
    */
    $result   = $cur1 * $quantity / $cur2;
    // I will store the result in the session to print it to the user!
    $_SESSION['result'] = $result;
    // I will store the needed currency name that I have fetched it in the above [ From line 24 To line 31]
    // To Also print it through the result page that assure to user his process correctly finished!
    $_SESSION['to'] = $to['curname'];

    // Redirect to the comming page that will appear to the user,
    // To let him be sure that his exchange successfully done!
    header('Location: ../result.php');
  }
?>
