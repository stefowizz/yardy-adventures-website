<?php require("headers.php"); ?>

<div class="dashy w3-container w3-padding-32">
    <h1>Orders</h1>
    <hr/>
    <div class="w3-container w3-content">
        <P></P>
    </div>
    <table class="w3-table w3-striped w3-white">
        <tr class="w3-teal">
            <td>Service</td>
            <td>Name</td>
            <td>Schedule</td>
            <td>Address</td>
            <td>Email</td>
            <td>Telephone</td>
            <td>Mobile</td>
            <td>Total</td>
            <td>Reseller</td>
            <td>Date Created</td>
        </tr>
 
<?php
if(!empty($data)){
    foreach ($data as $value){
?>        
        <tr>
            <td><?php if(!empty($value['name'])){echo $value['name'];} ?></td>
            <td><?php if(!empty($value['fname']) && !empty($value['lname'])){echo $value['fname']." ".$value['lname'];} ?></td>
            <td><?php if(!empty($value['date']) && !empty($value['time'])){echo $value['date']." / ".$value['time'];} ?></td>
            <td><?php if(!empty($value['billing_address'])){echo $value['billing_address'];} 
            echo "<br/>";
            if(!empty($value['billing_address_2'])){echo $value['billing_address_2'];} 
            echo "<br/>";
            if(!empty($value['billing_city'])){echo $value['billing_city'];} 
            echo "<br/>";
            if(!empty($value['billing_state'])){echo $value['billing_state'];} 
            echo "<br/>";
            if(!empty($value['billing_zip'])){echo $value['billing_zip'];}
            echo "<br/>";
            if(!empty($value['billing_country'])){echo $value['billing_country'];} 
            echo "<br/>";
            ?>
            </td>
            
            
            <td><?php if(!empty($value['email'])){echo $value['email'];} ?></td>
            <td><?php if(!empty($value['telephone'])){echo $value['telephone'];} ?></td>
            <td><?php if(!empty($value['mobile'])){echo $value['mobile'];} ?></td>
            <td><?php if(!empty($value['price'])){echo $value['price'];} ?></td>
            <td><?php if(!empty($value['affiliate'])){echo $value['affiliate'];} ?></td>
            <td><?php if(!empty($value['dateCreated'])){echo $value['dateCreated'];} ?></td>
        </tr> 
<?php }}?>   
    </table>
</div>


 

<?php include("footers.php"); ?>