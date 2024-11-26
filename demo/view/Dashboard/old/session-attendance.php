<?require("headers.php");

?>

<div class="w3-container w3-padding-32">
    <h1>Session Attendance</h1>
    <hr/>
    <div class="w3-container">
        <P>See All who will attend or has attended your sessions</P>
    </div>
    <table class="w3-table w3-striped w3-white">
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Session</td>
            <td>Date</td>
        </tr>
 
<?
if(!empty($data)){
    foreach ($data as $value){
?>        
        <tr>
            <td><? echo $value['fname'] ?></td>
            <td><? echo $value['lname'] ?></td>
            <td><? echo $value['email'] ?></td>
            <td><? echo $value['name'] ?></td>
            <td><? echo $value['date'] ?></td>
            
        <!--    <td><a class="w3-button w3-red" href="<? echo BASE_URL_SSL.'?route=dashboard/userDelete&id='.$value['id']?>">Delete</a></td> -->
        </tr> 
<?}
}?>   
    </table>
</div>


 

<? include("footers.php"); ?>