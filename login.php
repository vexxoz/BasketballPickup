<?php
session_start();
$servername = "localhost";
$server_username = "connect";
$server_password = "=Uph=?1V2t+2himFBW";

if($_SESSION['attempts'] == "" || $_SESSION['attempts'] == null){
    $_SESSION['attempts'] = 0;
}else{
    
}
if(isset($_POST['login_button'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Create connection
    $con=mysqli_connect($servername, $server_username, $server_password,"BASKETBALLPICKUP");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $username = $con->real_escape_string($username);
    $password = $con->real_escape_string($password);
    $password = hash('whirlpool', $password);
    $query = "SELECT * FROM USERS WHERE username='$username' AND password='$password'";
    $result = $con->query($query);
    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
            if ($row['active_account'] == 1){
                $_SESSION['is_logged'] = "yes";
                $_SESSION['username'] = $username;
                $_SESSION['full_name'] = $row['full_name'];
                header("Location: logged.php");
            }else{
                $error = "Your account has been suspended. It will return soon. We apologize for the inconvenience";   
            }
        }
    }else{
        $error = "Wrong Password or Username. Please Try Again.";
        $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
        if($_SESSION['attempts'] >= 25){
            
        }
    }
    mysqli_close($con);
}

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $date = date("m/d/y g.i:s", time());
    
    $con=mysqli_connect($servername, $server_username, $server_password,"BASKETBALLPICKUP");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $username = $con->real_escape_string($username);
    $password = $con->real_escape_string($password);
    $email = $con->real_escape_string($email);
    $full_name = $con->real_escape_string($full_name);
    
    $query = "SELECT Username FROM USERS WHERE username='$username'";
    $checklogin = mysqli_query($con, $query);
    $result = $con->query($query);
    if ($result->num_rows == 0) {
        mysqli_close($con);
        $password = hash('whirlpool', $password);
        $con=mysqli_connect($servername, $server_username, $server_password,"BASKETBALLPICKUP");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $query = "INSERT INTO USERS (username, password, email, full_name, active_account, last_login) VALUES ('$username', '$password', '$email', '$full_name', '1', '$date')";
        $checklogin = mysqli_query($con, $query);
        $result = $con->query($query);  
        $_SESSION['is_logged'] = "yes";
        $_SESSION['username'] = $username;
        $_SESSION['full_name'] = $row['full_name'];
        header("Location: logged.php");
        mysqli_close($con);
    }else{
        $error = "Please select a new Username, the one you have chosen is already taken.";
    }
}
?>

<html>
<head>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="login_style.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">    
</head>
<body>
    <div class="row red">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="white"><?php echo $error; ?></h4>
            </div>
        </div>
    </div>    
    <div class="top">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 logo">
                <span class="title">Basketballpickup.com</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row back"  onclick="back()">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <span class="glyphicon glyphicon-arrow-left arrow" aria-hidden="true"><span class="text_back">Back</span></span>
            </div>
        </div>
        <div class="row account">
            <div>
                <div class="container">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h1>Login</h1>
                        <form action="login.php" method="post">
                            <input type="text" required name="username" class="find_item" placeholder="Username"/>
                            <br>
                            <input type="password" required name="password" class="find_item" placeholder="Password"/>
                            <br>
                            <input class="find_item find_button" required type="submit" name="login_button" value="Login" />
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h1>Signup</h1>
                        <form method="post" action="login.php">
                            <input type="text" required name="username" class="find_item" placeholder="Username"/>
                            <br>
                            <input type="password" required name="password" class="find_item" placeholder="Password"/>
                            <br>
                            <input type="text" required name="full_name" class="find_item" placeholder="Full Name"/>
                            <br>
                            <input type="text" required name="email" class="find_item"placeholder="Email"/>
                            <br>
                            <button name="register" class="find_item find_button">Signup</button>
                        </form>                
                    </div>
                </div>
            </div>           
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 foot_item">
                    <h3>News:</h3>
                    <p>This site is getting started. There will be some bugs and glitches that will be worked out over the course of the next coming weeks.</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 foot_item">
                    <p>Created By: Blake Caldwell</p>
                    <p>All rights reserved 2015</p>
                </div>                
            </div>
        </div>
    </div>
</body> 
<script src="test.js"></script>  
</html>