<?php
  include "connection.php";
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	</title>

	  <link rel="stylesheet" type="text/css" href="style.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<body>
    <?php

    ?>
	    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>
          <?php
            if(isset($_SESSION['login_user']))
            {?>
                <ul class="nav navbar-nav">
                  <li>
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="fine.php">FINES</a></li>

                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <!--<li><a href="message.php"><sapn class="glyphicon glyphicon-envelope"> <span class="badge bg-green">-->
                  <li><a href="">
                    <div style="color: white">
                      <?php
                        echo "<img class='img-circle profile_img' height=30 width = 30 src='images/".$_SESSION['pic']."'>";
                        echo " ".$_SESSION['login_user'];  
                      ?>
                    </div>&nbsp
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">

                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                
                <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
              </ul>
                <?php
            }
          ?>

          

      </div>
    </nav>
    <?php
      if(isset($_SESSION['login_user']))
      {
        $day = 0;
        $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        $x=mysqli_query($db, "Select issue_book.return from issue_book where username='$_SESSION[login_user]' and approve='$exp';");
        while($row=mysqli_fetch_assoc($x))
        {
            $d = strtotime($row['return']);
            $c = strtotime(date("Y-m-d"));

            $diff = $c - $d;
        if ($diff >= 0) 
        {
          $day = $day + floor($diff / (60 * 60 * 24)); //Days
         
         
        }
      
        }
        $_SESSION['fine'] = $day* .10;
      }
    ?>

</body>
</html>