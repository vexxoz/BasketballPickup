<?php
session_start();

if(isset($_SESSION['is_logged'])){
    header("Location: logged.php");
}else{
    
}

$servername = "localhost";
$server_username = "connect";
$server_password = "=Uph=?1V2t+2himFBW";
$display = "";
if(isset($_GET['Court_id'])){
    $Court_id = $_GET['Court_id'];
    
    
    $con=mysqli_connect($servername, $server_username, $server_password,"BASKETBALLPICKUP");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = "SELECT * FROM PLAYER_LIST WHERE Court_id='$Court_id'";
    $checklogin = mysqli_query($con, $query);
    $result = $con->query($query);
    while($row = $result->fetch_assoc()) {
        $new = '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 player_item"><div class="border"><span class="player_name">' . $row['Name'] . '</span><p class="time">' . $row['Time'] . '</p><p class="day">' . $row['Date'] . '</p></div></div>';
        $display = $display . $new;
    }
    mysqli_close($con);
    
    
    $con=mysqli_connect($servername, $server_username, $server_password,"BASKETBALLPICKUP");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = "SELECT * FROM LIST_OF_COURTS WHERE Court_id='$Court_id'";
    $checklogin = mysqli_query($con, $query);
    $result = $con->query($query);
    while($row = $result->fetch_assoc()) {
        $court_name = $row['Name'];
        $court_address = $row['Address'];  
        $court_type = $row['Type'];
    }    
    mysqli_close($con);
}

?>

<html>
<head>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="court_style.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">    
</head>
<body>
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
        <div class="row court_info">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <p class="court_title">Name:<br/> <?php echo $court_name; ?></p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <p class="court_title">Address:<br/> <?php echo $court_address; ?></p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <p class="court_title">Type:<br/> <?php echo $court_type; ?></p>
            </div>            
        </div>
        <div class="row middle">
            <?php echo $display; ?>
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