<?php require("headers.php"); ?>
<div class="w3-container w3-padding-32">
    <h1>Messages</h1>
    <hr/>
    <p>Find out what your users think about your platform</p>
    <hr />
<?php
if(!empty($data)){
    foreach ($data as $value){
?>
        <div class="w3-panel w3-pale-green w3-border w3-padding">
            <h2><?php echo $value['subject']?></h2>
            <h3><?php echo $value['name']." - ".$value['email']?></h3>
            <p><?php echo $value['message']?></p>
            <p><a class="w3-button w3-red" href="<? echo BASE_URL_SSL.'?route=dashboard/deleteMessage&id='.$value['id']?>">Delete</a></p>
        </div>
<?php }}else{?>   
        <div class="w3-panel w3-green w3-border w3-padding">
            <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
            <h2><?php echo 'All Messages <i class="fa fa-envelope"></i> up here'?></h2>
            <h3><?php echo "Jon Snow - snow@winteris.com.in"?></h3>
            <p><?php echo "They said I know nothing, but I know, WINTER IS COMING!"?></p>
        </div>  
  <?php }?>
</div>

<?php include("footers.php"); ?>