<?require("headers.php");?>

<div class="w3-container w3-padding-32">
    <h1>Add Content</h1>
    <hr />
    <form id="upload" enctype="multipart/form-data">
        <label>Page</label>
        <p><input class="w3-padding" type="text" name="name" placeholder="document name" style="width:100%" required/> </p>
        
        <label>Content</label>
        <p><Textarea id="editor" class="w3-padding" type="text" name="content" style="width:100%; height:auto;"></Textarea></p>
        <hr/>
        <label>ContentImage</label>
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

<? include("footers.php"); ?>