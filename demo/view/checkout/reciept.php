<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $heading ?></title>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <style>
            .main-container{
                max-width:60%;
                width:600px;
            }
        </style>

    </head>
    <body>
        <?php if ($is_successful){?>    
            <div class="text-center alert alert-success alert-dismissible fade show">
                <?php echo $data['success_note'] ?>
            </div>
            <div class="container text-center main-container bg-light">
                <p><img style="width:50%; height:auto" src="https://yardyadventures.com/demo/assets/images/general/logo_white.png" alt="Yardy Adventures" Title="Yardy River Adventures and Tour Ltd" /></p>
                <p class="text-center font-weight-bold">Trelawny, Jamaica <br /> T: (876)-781-1741 | E: sales@yardyadventures.com</p>
                <hr />
                <table class="table">
                    
                    <tr><th>Recipt No: </th><td><?php echo $data['id'] ?> </td></tr>
                    <tr><th>Order No: </th><td><?php echo $data['order_no'] ?></td></tr>
                    <tr><th>Date/Time: </th><td><?php echo $data['date'] ?></td></tr>
                    
                    <tr><td><br /></td></tr>
                    
                    <tr><th>AuthCode : </th><td><?php echo $data['code'] ?></td></tr>
                    <tr><th>RRN : </th><td><?php echo $data['rrn'] ?></td></tr>
                    <tr><th>Status: </th><td><?php echo $data['approved'] ?></td></tr>
                    
                    <tr><td><br /></td></tr>
                    
                    <tr><th>Type: </th><td><?php echo $data['trans'] ?></td></tr> 
                    <tr><th>Account: </th><td><?php echo $data['cardType'] ?></td></tr>
                    <tr><th>Card No:</th><td><?php echo $data['cardno'] ?></td></tr>
                    <tr><th>Customer: </th><td><?php echo $data['name'] ?></td></tr>
                    <tr><td><br /></td></tr>
                    <tr><th></th><td></td><th>Total: </th><td><h4>$<?php echo $data['total'] ?></h4></td></tr>
                </table>
                <h5><?php echo $data['message'] ?></h5>
                <hr />
                <p> <b>Customer Copy</b> <br />Please retain this reciept for your records</p>
                
            </div>
            <div class="container text-center">
                <button id="button-confirm" class="btn btn-primary">Click to continue</button>
            </div>            
            

        <?php }else{ ?>
            <div class="text-center alert alert-danger alert-dismissible fade show">
                <h3><strong>Transaction Error</strong></h3>
                <?php echo $data['errornote'] ?>
            </div>
            <div class="container text-center main-container bg-light">
                <table class="table">
                    <tr><th>Order No</th><td><?php echo $data['order_no'] ?></td></tr>
                    <tr><th>RRN</th><td><?php echo $data['rrn'] ?></td></tr>
                    <tr><th>Error Code</th><td><?php echo $data['errorcode'] ?></td></tr>
                    <tr><th>Error Message</th><td><?php echo $data['message'] ?></td></tr>
                </table> 
                <div class="container text-center">
                    <button id="button-confirm" class="btn btn-warning">Click to try again</button>
                </div> 
            </div>

        <?php } ?>

        <script>
        $(document).ready(function(){
            $('#button-confirm').click(function(){ 
                window.top.location.href = "<?php echo $data['redirect'] ?>";
            });
        });
        </script>
    </body>
</html>