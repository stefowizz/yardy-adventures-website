<?
require("headers.php");
?>

<div class="w3-container w3-padding-32">
    <h1>Content</h1>
    <hr/>
    <a href="<? echo BASE_URL_SSL.'?route=dashboard/addContents'?>" class="w3-button w3-black">Add Content</a>
    <hr/>
    <div class="w3-container w3-content">
        <P></P>
    </div>
    <table class="w3-table w3-striped w3-white">
        <tr>
            <td>Page</td>
            <td>Content</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
 
<?
if(!empty($data)){
    foreach ($data as $value){
?>        
        <tr>
            <td><? echo htmlspecialchars_decode(stripslashes($value['page'])) ?></td>
            <td><? echo htmlspecialchars_decode(stripslashes($value['content'])) ?></td>
            <td><? echo "<img src='".$value['image']."' width='500' height='300' />"; ?></td>
            <td><p><a class="w3-button w3-green" href="<? echo BASE_URL_SSL.'?route=dashboard/contentUpdates&id='.$value['id']?>">Edit</a></p>
                <p><a class="w3-button w3-red" href="<? echo BASE_URL_SSL.'?route=dashboard/contentDelete&id='.$value['id']?>">Delete</a></p>
            </td>
        </tr> 
<?}}?>   
    </table>
</div>


 

<? include("footers.php"); ?>