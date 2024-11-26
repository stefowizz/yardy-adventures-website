<?php require(VIEWS."Dashboard/headers.php"); ?>

<style>
    
    .dashy
{width: 100%;
       padding-left: 161px; 
    
    
    
}
    
</style>

<div class="dashy w3-container w3-padding-32">
    <h1>Services</h1>
    <hr/>
    <a href="<?php echo BASE_URL_SSL.'?route=dashboard/addContents'?>" class="w3-button w3-black">Add Service</a>
    <hr/>
    <div class="w3-container w3-content">
        <P></P>
    </div>
    <table class="w3-table w3-striped w3-white">
        <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Prices</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
 
<?php
if(!empty($data)){
    foreach ($data as $value){
?>        
        <tr>
            <td><?php echo htmlspecialchars_decode(stripslashes($value['name'])) ?></td>
            <td><?php echo htmlspecialchars_decode(stripslashes($value['description'])) ?></td>
            <td><?php echo "$".htmlspecialchars_decode(stripslashes(number_format($value['price'],2))) ?></td>
            <td><?php echo "<img src='".$value['image_url']."' width='400' height='300' />"; ?></td>
            <td><p><a class="w3-button w3-green" href="<?php echo BASE_URL_SSL.'?route=dashboard/contentUpdates&id='.$value['id']?>">Edit</a></p>
                <p><a class="w3-button w3-red" href="<?php echo BASE_URL_SSL.'?route=dashboard/contentDelete&id='.$value['id']?>">Delete</a></p>
            </td>
        </tr> 
<?php }}?>   
    </table>
</div>


 
<?php require(VIEWS."Dashboard/footers.php"); ?>
