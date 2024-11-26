<?php require(VIEWS."Dashboard/headers.php");?>

<style>
    
 
.dashy
{width: 100%;
       padding-left: 161px; 
    
    
    
}
   
    
    
</style>



<div class="dashy w3-container w3-padding-32">
    <h1>Add Service</h1>
    <hr />
    <form id="upload" enctype="multipart/form-data">
        <label>Name</label>
        <p><input classdashy ="w3-padding" type="text" name="name" placeholder="Service name" style="width:100%" required/> </p>
        
        <label>Description</label>
        <p><Textarea id="editor" class="w3-padding" type="text" name="description" style="width:100%; height:auto;"></Textarea></p>
        
        <label>Price</label>
        <p><input class="w3-padding" type="text" name="price" placeholder="10.00" style="width:100%" required/> </p>
        <hr/>
        <label>Service Image</label>
        <p><input class="w3-padding" type="file" name="fileToUpload" id="fileToUpload" />
        </p>
        <p><button class="w3-button w3-orange" type="submit">Submit</button></p>
        
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
                    url: 'index.php?route=dashboard/processContent', 
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