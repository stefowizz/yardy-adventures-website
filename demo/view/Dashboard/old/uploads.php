<?require("headers.php");?>
<div class="w3-container w3-padding-32">
    <h1>Document Upload</h1>
    <hr />
    <form id="upload" enctype="multipart/form-data">
        <label>Name</label>
        <p><input class="w3-padding" type="text" name="name" placeholder="document name" style="width:50%" required/> </p>
        
        <label>Category</label>
        <p><select class="w3-padding" name="category" style="width:50%">
            <option>Select Category</option>
            <option value="Guest Services">Guest Services</option>
            <option value="Reception & Reservation Services">Reception & Reservation Services </option>
            <option value="Booking Services Coordination">Booking Services Coordination</option>
            <option value="Front Office Services">Front Office Services</option>
            
        </select></p>
        
        <label>Document Type</label>
        <p><select class="w3-padding" name="type" style="width:50%">
            <option>Select Type</option>
            <option value="handout">Handout</option>
            <option value="courseware">CourseWare</option>
            <option value="video">Instructional video</option>
        </select>
        </p>
        
        <label>Upload File</label>
        <p><input class="w3-padding" type="file" name="fileToUpload" id="fileToUpload" />
        </p>
        
        <p><button class="w3-button w3-orange" type="submit">Upload Document</button></p>
        
    </form>
</div>
  <script> 
        $(document).ready(function () { 
            $('#upload').submit(function (e) { 
                e.preventDefault(); 
                
                $.ajax({ 
                    url: 'index.php?route=dashboard/processUpload', 
                    datatype: 'JSON',
                    type: 'POST', 
                    
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