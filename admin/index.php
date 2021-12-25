<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php
            include("config.php");
            session_start();
            if(isset($_SESSION['user_name'])){
                header("Location: http://{$hostname}/PHP/Project/news/Blog_Site/admin/users.php?user=1");
                die();
            }

            if(isset($_POST['login'])){
                $username = mysqli_real_escape_string($connection,$_POST['username']);
                $password = mysqli_real_escape_string($connection,md5($_POST['password']));
                $user_exits_query = "SELECT username FROM users WHERE username = '{$username}'";
                
                
                if(mysqli_num_rows(mysqli_query($connection,$user_exits_query))>0){

                    $user_exits_query = "SELECT id,username,role FROM users WHERE username = '{$username}' AND password = '{$password}'"; 
                    $result = mysqli_query($connection, $user_exits_query) or die("Query failed");

                    if(mysqli_num_rows($result)>0){
                        while($rows = mysqli_fetch_assoc($result)){
                            $_SESSION['user_id'] = $rows['id'];
                            $_SESSION['user_name'] = $rows['username'];
                            $_SESSION['user_role'] = $rows['role'];
                            header("Location: http://{$hostname}/PHP/Project/news/Blog_Site/admin/users.php?user=1");
                        }
                    }else{
                        echo "<div class='alert alert-danger'>Login Failed</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger'>No user found</div>";
                }
            }

        ?>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
