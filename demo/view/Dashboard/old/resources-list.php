<?require("headers.php");
?>

<div class="w3-container w3-padding-32">
    <h1>Resources</h1>
    <hr/>
    <a href="<? echo BASE_URL_SSL.'?route=dashboard/uploads'?>" class="w3-button w3-black">Add Resource</a>
    <hr/>
    <div class="w3-container w3-content">
        <P></P>
    </div>
    <table class="w3-table w3-striped w3-white">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Type</th>
            </tr>
 
<?
    if(!empty($data)){
    foreach ($data as $value){
?>        
        <tr>
            <td><? echo $value['name'] ?></td>
            <td><? echo $value['category'] ?></td>
            <td><? echo $value['type'] ?></td>
            <td><a class="w3-button w3-red" href="<? echo BASE_URL_SSL.'?route=dashboard/fileDelete&id='.$value['id']?>">Delete</a></td>
            
        </tr> 
<?}
}
?>   
    </table>
</div>


 

<? include("footers.php"); ?>