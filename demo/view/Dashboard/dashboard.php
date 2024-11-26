<?php
require(VIEWS . "Dashboard/headers.php");
$username2= htmlspecialchars($uname);


require  ("acessconfig.php");
 require ("sidebar.php");

?>

<style>
    
    
.w3-sidebar{
    
        width: 131px !important;
    
}    
    
    /* Ensure smooth transition of main content when the sidebar opens or closes */
.w3-main {
    transition: margin-left 0.3s ease;
    padding: 20px;
}

/* Default state for larger screens (sidebar takes 300px) */
@media (min-width: 601px) {
    .w3-main {
        margin-left: 300px; /* Push content to the right by the width of the sidebar */
    }
}

/* Full-width content on small screens (when the sidebar is hidden or collapses) */
@media (max-width: 600px) {
    .w3-main {
        margin-left: 0; /* No margin for small screens */
        padding: 10px;
    }
    .w3-sidebar {
        width: 100%; /* Sidebar takes full width on small screens */
    }
    #mySidebar {
        display: none; /* Hide sidebar by default on small screens */
    }
}

/* Adjust header for small screens */
header.w3-container {
    padding-top: 20px;
    padding-left: 10px;
}

/* Add some styling for your dashboard boxes (optional) */
.w3-row-padding .w3-third {
    margin-bottom: 20px;
}

.w3-container h4, .w3-container h3 {
    font-size: 1.5rem;
}

/* Optional: For better visuals */
.w3-container.w3-red, .w3-container.w3-blue, .w3-container.w3-orange {
    border-radius: 5px;
}

.dashy
{width: 100%;
       padding-left: 161px; 
    
    
    
}
    
</style>



<!-- !PAGE CONTENT! -->

<!-- Header -->
<header class="w3-container" style="padding-top:22px">
   <!-- <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>-->
</header>
<hr />

<center>
    <h1>CLICK QR CODE TO DOWNLOAD AND SHARE IT</h1>
</center>
<center>
    <a href="https://yardyadventures.com/demo/assets/images/frontend/blog/yardy.jpg" download>
        <img class="qr" src="https://yardyadventures.com/demo/assets/images/frontend/blog/yardy.jpg" alt="qr" />
    </a>
</center>

</body>
        
<!---//$link =  $_SESSION['fname'];
//$encodedLink = $link; // URL encode the link
//echo '<center>Share link';
//echo '</br><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $encodedLink . '" alt="QR Code"/></center>';--->




<?php include("footers.php"); ?>
