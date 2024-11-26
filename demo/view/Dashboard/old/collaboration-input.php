<?require("headers.php");?>
<div class="w3-container w3-padding">
    <div class="panel w3-brown w3-padding">
        <h1>Schedule New Session</h1>    
    </div>
    
    <hr />
    <form id="session" class="w3-padding-32">
        <label>Name</label>
        <p><input class="w3-input " type="text" name="Inputname" placeholder="Food Preparation" required/></p>
        <label>Date</label>
        <p><input class="w3-input" type="date" name="Inputdate" required/></p>
        <label>Details</label>
        <p><Textarea id="editor" class="w3-padding" type="text" name="Inputdetails" style="width:100%; height:auto;"></Textarea></p>
        <label>Link</label>
        <p><input class="w3-input" type="text" name="Inputlink" placeholder="https://www.github.com/resources" required/></p>
        <p><input type="submit" value="Confirm" class="w3-button w3-orange" /></p>
</div>
<script> 
    $(document).ready(function () { 
        $('#session').submit(function (e) { 
            e.preventDefault(); 
            var formData = $(this).serialize(); 
            
            $.ajax({ 
                url: 'index.php?route=dashboard/processCollabSessions', 
                type: 'POST', 
                data: formData, 
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
<? include("footers.php"); ?>