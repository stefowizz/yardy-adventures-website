<?php
if ($access === 1) {
    echo '<div class="dashy w3-row-padding w3-margin-bottom">
            <div class="w3-third">
                <div class="w3-container w3-red w3-padding-16">
                    <div class="w3-left"><i class="fa fa-file w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3>content here</h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Files</h4>
                </div>
            </div>
            <div class="w3-third">
                <div class="w3-container w3-blue w3-padding-16">
                    <div class="w3-left"><i class="fa fa-cloud-upload w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3>content here</h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Resources</h4>
                </div>
            </div>
            <div class="w3-third">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3>content here</h3> <!-- Add content here or remove -->
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Users</h4>
                </div>
            </div>
        </div>';
} else {
    include 'dashboard2.php';
   echo "<h1>nope</h1>";
}
?>
