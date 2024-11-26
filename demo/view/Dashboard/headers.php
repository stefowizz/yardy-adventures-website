<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard<?= !empty($header) ? " - " . $header : ""; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta itemprop="image" content="https://yardyadventures.com/demo/assets/images/general/default.png">
    
    <link rel="shortcut icon" href="https://yardyadventures.com/demo/assets/images/general/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="https://yardyadventures.com/demo/assets/images/general/logo.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    
    <style>
        html, body, h1, h2, h3, h4, h5 {
            font-family: "Raleway", sans-serif;
        }

        /* Adjust main content when sidebar is visible */
        .w3-main {
            margin-left: 300px; /* Push content to the right to accommodate the sidebar */
        }

        /* For small screens */
        @media only screen and (max-width: 600px) {
            .w3-main {
                margin-left: 0; /* Remove margin for small screens so that the sidebar doesn't affect the content */
            }
            .w3-sidebar {
                width: 100%; /* Expand sidebar to full width */
            }
            
        }
        
         .sidey{
                width: 158px !important;
            }
    </style>
</head>
<body class="w3-light-grey">
    
    
    
    

<!-- Top container -->
<div class="w3-bar w3-top w3-teal w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">
    <i class="fa fa-bars"></i> Menu
  </button>
  <span class="w3-bar-item w3-right w3-yellow">
    <a href="<?= BASE_URL_SSL ?>"><b>Home</b></a>
  </span>
  <span class="w3-bar-item w3-right w3-hide-small w3-yellow">Yardy Adventure</span>
</div>

<!-- Sidebar/menu -->

<?php
$username2= htmlspecialchars($_SESSION['username']);

require 'acessconfig.php';

if ($access === 1) {
    echo '<nav class="sidey w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar">
        <br>
        <div class="w3-container w3-row">
            <div class="w3-col s12 w3-bar">
                <span>Welcome, <strong>' . htmlspecialchars($_SESSION['username']) . '</strong></span><br>
                <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=dashboard/feedback') . '" class="w3-bar-item w3-button">
                    <i class="fa fa-envelope"></i>
                </a>
                <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=dashboard/users') . '" class="w3-bar-item w3-button">
                    <i class="fa fa-user"></i>
                </a>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">
                <i class="fa fa-remove fa-fw"></i> Close Menu
            </a>
            <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=dashboard/') . '" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-table fa-fw"></i> Overview
            </a>
            <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=dashboard/users') . '" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-users fa-fw"></i> Users
            </a>
            <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=dashboard/services') . '" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-bullseye fa-fw"></i> Services
            </a>
            <hr/>
            <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=dashboard/order') . '" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-line-chart fa-fw"></i> Orders
            </a>
            <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=dashboard/paymentGateway') . '" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-money fa-fw"></i> Card Payments
            </a>
            <hr/>
            <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=dashboard/feedback') . '" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-envelope fa-fw"></i> Feedback
            </a>
            <hr/>
            <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=auth/logout') . '" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-eject fa-fw"></i> Logout
            </a><br><br>
        </div></div>
    </nav>';
} else {
    echo '<nav class="sidey w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar">
        <br>
        <div class="w3-container w3-row">
            <div class="w3-col s12 w3-bar">
                <span>Welcome, <strong>' . htmlspecialchars($_SESSION['fname']) . '</strong></span><br>
                
            </div>
       
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">
                <i class="fa fa-remove fa-fw"></i> Close Menu
            </a>
            <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=dashboard/') . '" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-table fa-fw"></i> Dasboard
            </a>
           
            <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=dashboard/share2') . '" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-table fa-fw"></i>Qr Code
            </a>
           
            <a href="' . htmlspecialchars(BASE_URL_SSL . '?route=auth/logout') . '" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-eject fa-fw"></i> Logout</a>
           
           
        </div>
    </nav>';
}
?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <!-- Your content goes here -->

<!-- Sidebar Toggle JavaScript -->
<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>


