<?php
session_start();

if(isset($_SESSION['is_logged'])){
    header("Location: logged.php");
}else{
    
}

?>
<html>
<head>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="index_style.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHbdNNjxVAJ6gjlqGR7BZRzY17HJYZ2iI"
  type="text/javascript"></script>
</head>
<body>
    <div id="top_background" class="module parallax parallax-1">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="title">Basketball Pickup</h1>
                <p class="slogan">Be Fit. Stay Social.</p>
                <button class="learn_more" onclick="learn_more()">Learn More</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row info">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h1>What?</h1>
                <p>Our website is designed to make baksetball pickup games quicker and easier to find and join.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h1>Why?</h1>
                <p>Have you ever showed up to the park only to find that there was no one to play basketball with? By using basketballpickup, such moments never have to happen again.</p>
            </div>        
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h1>How?</h1>
                <p>It's quite simple to find and join games. All thats neeeded is to type in your address, select a court near you, and join! Only able to play from 4 to 5pm? Thats no problem. You can specify what times you'll be there and when you wont!</p>
            </div>                  
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 find">
            <div class="container find_menu">
                <h2>Find a game near you:</h2>
                <input type="text" placeholder="Address" id="address" class="find_item" />
                <button class="find_button" id="find">Find</button>
                <div id="map-canvas" style="height: 500px;"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row review">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 review_title">
                <h1>Reviews</h1>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 review_item">
                <h2>My new favorite site</h2>
                <p>I always had a hard time finding pickup games. Now thanks to this amazing website, I can finaly get back in shape and meet new people at the same time!</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 review_item">
                <h2>Best website I've ever used</h2>
                <p>The design is well made, with a beautiful layout with state of the art dynamic capabilities.</p>
            </div>  
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 review_item">
                <h2>Awesome Site</h2>
                <p>It's so easy to use. I LOVE how I can use this on my phone or tablet, so I'm never without a game.</p>
            </div>   
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 review_item">
                <h2>Creative idea</h2>
                <p>This site is one of those things that you don't realize you need until you use it. Most definitely my #1 bookmark!</p>
            </div>              
        </div>
    </div>
        <div class="row account">
            <div id="account_background" class="module parallax2 parallax-2">
                <div class="container">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h1>Login</h1>
                        <form action="login.php" method="post">
                            <input type="text" required name="username" class="box" placeholder="Username"/>
                            <br>
                            <input type="password" required name="password" class="box" placeholder="Password"/>
                            <br>
                            <input class="box account_button" required type="submit" name="login_button" value="Login" />
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h1>Signup</h1>
                        <form method="post" action="login.php">
                            <input type="text" required name="username" class="box" placeholder="Username"/>
                            <br>
                            <input type="password" required name="password" class="box" placeholder="Password"/>
                            <br>
                            <input type="text" required name="full_name" class="box" placeholder="Full Name"/>
                            <br>
                            <input type="text" required name="email" class="box"placeholder="Email"/>
                            <br>
                            <button name="register" class="box account_button">Signup</button>
                        </form>                
                    </div>
                </div>
            </div>           
        </div>
    <div class="row sponsor">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                <h2>Sponsor program coming soon!</h2>
                <p>With the sponsor program a buisness or company can target local and non local customers by sponsoring a court. When you sponsor a court you will get to put your own company banner up on the page of that court. Say you want more than just one court. That's no problem. You can sponsor as many courts as you want. Be sure to check back for updates regarding this and many other amazing new features.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer">
            <div class="container">
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