<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>

        <style type="text/css">
            body
            {
                height: 65px;
                background-image: url("images/a.jpg");
                background-repeat: no-repeat;
            }
            .wrapper
            {
                width: 400px;
                height: 400px;
                margin: 100px auto;
                background-color: black;
                opacity: .8;
                color: white;
                padding: 27px 15px;
            }
            .form-control
            {
                width: 300px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div style="text-align: center;">
            <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Change Your Password</h1>
            </div>
            <div style="padding-left: 30px">
            <form action="" method="post">
                <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
                <input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
                <input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
                <button class="btn btn-default" type="submit" name="submit">Update</button>
            </form>
            </div>
        </div>
        <?php
            if(isset($_POST['submit']))
            {
                if(mysqli_query($db, "UPDATE student set password='$_POST[password]' where username='$_POST[username]' AND email='$_POST[email]';"))
                {
                    ?>
                        <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
                            <strong>The Password Updated Successfully</strong>
                        </div>
                    <?php
                }

            }
        ?>
    </body>
</html>