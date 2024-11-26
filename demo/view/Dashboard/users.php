<?php 
require("headers.php");

$access = [
        1=>"Owner",
        2=>"Admin",
        3=>"Resellers",
        ];

?>

<div class="dashy w3-container w3-padding-32">
    <h1>Users</h1>
    <hr/>
    <a href="<?php echo BASE_URL_SSL.'?route=dashboard/Addusers'?>" class="w3-button w3-black">Add New User</a>
    <hr/>
    <div class="w3-container w3-content">
        <P></P>
    </div>
    <table class="w3-table w3-striped w3-white">
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Username</td>
            <td>Email</td>
            <td>Privilage</td>
        </tr>
 
<?php
if(!empty($data)){
    foreach ($data as $value){
?>        
        <tr>
            <td><?php echo $value['fname'] ?></td>
            <td><?php echo $value['lname'] ?></td>
            <td><?php echo $value['username'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $access[$value['access']] ?></td>
            <?php if($value['access'] > 1 ){?>
                <td><a class="w3-button w3-red" href="<?php echo BASE_URL_SSL.'?route=dashboard/userDelete&id='.$value['id']?>">Delete</a></td>
            <?php }?>
        </tr> 
<?php }}?>   
    </table>
</div>


 

<?php include("footers.php"); ?>