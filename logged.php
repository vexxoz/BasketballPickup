<?php
session_start();

if(isset($_SESSION['is_logged'])){
    
}else{
    header("Location: index.php");
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

if(isset($_POST['join'])){
    $name = $_SESSION['full_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $time2 = $_POST['time2'];
    if($_GET['Court_id'] == ""){
        header("Location: f");   
    }
    $time = $time . "-" . $time2;
    $con=mysqli_connect($servername, $server_username, $server_password,"BASKETBALLPICKUP");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = "INSERT INTO PLAYER_LIST (Name, Date, Time, Court_id) VALUES ('$name', '$date', '$time', '$Court_id')";
    $checklogin = mysqli_query($con, $query);
    $result = $con->query($query);
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
    <link rel="stylesheet" href="logged_style.css">    
    <link rel="stylesheet" href="jquery.timepicker.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHbdNNjxVAJ6gjlqGR7BZRzY17HJYZ2iI" type="text/javascript"></script>    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>    
    <script src="jquery.timepicker.js"></script>    
</head>
<body>
    <div class="top">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 logo">
                <span class="title">Basketballpickup.com</span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 logout">
                <span onclick="logout()">Logout</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row review">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 review_title">
                <h1>Your Favorite Court</h1>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 review_item">
                <h2>Coming Soon</h2>
                <p>Soon you will be able to choose a favorite court and see updated player list without having to search for it on the map</p>
            </div>             
        </div>
        <div class="row">
            <div id="map-canvas" style="height: 500px;"></div>
        </div>
        <div class="row center">
            <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Join the Lineup</h2>
            <form method="post" action="logged.php">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <input type="text" required name="time" id="time" class="find_item" placeholder="From Time"/>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <input type="text" required name="time2" id="time2" class="find_item" placeholder="To Time"/>
                </div>                
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <input type="text" required name="date" id="date" class="find_item" placeholder="Date"/>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <button name="join" class="find_item find_button">Join</button>
                </div>
            </form>
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
<script src="logged.js"></script>    
</html>