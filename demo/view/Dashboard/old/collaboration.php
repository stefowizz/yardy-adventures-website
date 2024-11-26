<?require("headers.php");

?>

<div class="w3-container w3-padding-32">
    <h1>Collaborative Sessions</h1>
    <hr/>
    <a href="<? echo BASE_URL_SSL.'?route=dashboard/newSession'?>" class="w3-button w3-black">Schedule Session</a>
    <hr/>
    <div class="w3-container w3-content">
       
    
    <table class="w3-table-all w3-white">
        <tr>
            <td>Name</td>
            <td>Date</td>
            <td>Session Link</td>

        </tr>
 
<?
if(!empty($data) || $data !== null || isset($data)){
    foreach ($data as $value){
?>        
        <tr>
            <td><? echo $value['name'] ?></td>
            <td><? echo $value['date'] ?></td>
            <td><? echo $value['link'] ?></td>
            <td><? echo "<a href='".$value['link']."' class='w3-button w3-green' target='_blank'>Open Session Link</a>" ?></td>
            <td><? echo "<a href='?route=dashboard/deleteSessions&id=".$value['id']."' class='w3-button w3-red'>Remove Session</a>" ?></td>
        </tr> 
<?}}?>   
    </table>
    
</div>
</div>


 

<? include("footers.php"); ?>