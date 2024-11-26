<?php 

//$username2= htmlspecialchars($uname);

require("headers.php");
//require  ("acessconfig.php");
 //require ("sidebar.php");



?>

<style>
    
    .dashy
{width: 100%;
       padding-left: 161px; 
    
    
    
</style>


<div class="dashy w3-container w3-padding">
    <div class="panel w3-brown w3-padding">
        <h1>Add New User</h1>    
    </div>
    
    <hr />
    <form id="register" class="w3-padding-32">
        <label>First Name</label>
        <p><input class="w3-input " type="text" name="Inputfname" required/></p>
        <label>Last Name</label>
        <p><input class="w3-input" type="text" name="Inputlname" required/></p>
        <label>Username</label>
        <p><input class="w3-input" type="text" name="InputUsername" required/></p>
        <label>Email</label>
        <p><input type="text" name="InputEmail" class="w3-input" required/></p>
        <lebel>Password</lebel>
        <p><input class="w3-input" type="password" name="InputPassword" required /></p>
        <p><input class="w3-input" type="password" name="InputConfirmPassword" placeholder="Confirm Password" required /></p>
        <label>Privililage</label>
        <p><select class="w3-select" name="Inputaccess">
            <option>Select Access Level</option>
            <option value="Admin">Administrator</option>
            <option value="Users">Influencer</option>
        </select></p>
        <p><input type="submit" value="Confirm" class="w3-button w3-orange" /></p>
</div>
<script> 
    $(document).ready(function () { 
        $('#register').submit(function (e) { 
            e.preventDefault(); 
            var formData = $(this).serialize(); 
            
            $.ajax({ 
                url: 'index.php?route=auth/processRegister', 
                type: 'POST', 
                data: formData, 
                success: function (response) { 
                    let message = response.message;
                    let redirect = response.redirect;
                    alert(message);
                    location.assign(redirect);
                }, 
                error: function (jqXHR, textStatus, errorThrown) { 
                    alert(errorThrown); 
                } 
            }); 
        }); 
    }); 
</script>
<?php include("footers.php"); ?>