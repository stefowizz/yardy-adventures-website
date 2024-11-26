<?php require(VIEWS."Dashboard/headers.php");?>

<div class="w3-container w3-padding-32">
    <h1>Update Service</h1>
    <hr />
    <form id="upload" enctype="multipart/form-data">
        <input type='hidden' name='id' value='<?php if(!empty($id)){echo $id;}?>' />
        <label>Event Name</label>
        <p><input class="w3-padding" type="text" value="<?php if(!empty($data)){echo $data['name'];}?>" name="name" placeholder="Service name" style="width:100%" required/> </p>
        
        <label>Event Description</label>
        <p><Textarea id="editor" class="w3-padding" type="text" name="description" style="width:100%; height:auto;"><?php if(!empty($data)){echo $data['description'];}?></Textarea></p>
        
        <label>Event Price</label>
        <p><input class="w3-padding" type="text" value="<?php if(!empty($data)){echo $data['price'];}?>" name="price" placeholder="10.50" style="width:100%" required/> </p>
        <hr/>
        <label>Image</label>
        <p><input class="w3-padding" type="file" name="fileToUpload" id="fileToUpload" />
        </p>
        <p><?php if(!empty($data)){echo "<img src='".$data['image_url']."' width='500px' height='500px'/>";}?></p>
        <p><button class="w3-button w3-green" type="submit">Update</button></p>
        
        
    </form>
</div>
    <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>

  <script> 
        $(document).ready(function () { 
            $('#upload').submit(function (e) { 
                e.preventDefault(); 
                //var formData = $(this).serialize(); 
                $.ajax({ 
                    url: 'index.php?route=dashboard/updateContent', 
                    datatype: 'JSON',
                    type: 'POST', 
                    //data: formData, 
                    data: new FormData(this), 
                    contentType: false,
                    cache: false,
                    processData:false,
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

<?php include(VIEWS."Dashboard/footers.php"); ?>