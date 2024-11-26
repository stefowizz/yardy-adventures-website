<?require("headers.php");
?>

<div class="w3-container w3-padding-32">
    <h1>Collaboration Courseware</h1>
    <hr/>
    <a href="<? echo BASE_URL_SSL.'?route=dashboard/newCourseware'?>" class="w3-button w3-black">Add Courseware</a>
    <hr/>
    <div class="w3-container w3-content">
        <P></P>
    </div>
    <table class="w3-table w3-striped w3-white">
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Resource Link</th>
            </tr>
 
<?
    if(!empty($data)){
    foreach ($data as $value){
?>        
        <tr>
            <td><? echo $value['name'] ?></td>
            <td><? echo $value['type'] ?></td>
            <td><? echo $value['link'] ?></td>
            <td><a class="w3-button w3-red" href="<? echo BASE_URL_SSL.'?route=dashboard/courseDelete&id='.$value['id']?>">Delete</a></td>
            
        </tr> 
<?}
}
?>   
    </table>
</div>


 

<? include("footers.php"); ?>