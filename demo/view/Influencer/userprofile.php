<!DOCTYPE html>
<html>
<head>
<title><?php echo $header?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>





    
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
</head>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  <div class="w3-bar w3-border w3-black">
  <a href="<?php echo BASE_URL_SSL?>" class="w3-bar-item w3-button">Home - Main Website</a>
  <a href="<?php echo BASE_URL_SSL?>?route=auth/logout" class="w3-bar-item w3-button" style="float:right">Log out</a>
</div>
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
            <div class="w3-content w3-padding-32" style="width:60%">
                <img src="<?php echo LOAD_ASSETS?>img/user-image/default.jpeg" style="width:100%" alt="Avatar" class="w3-image">
            </div>
          <div class="w3-display-bottommiddle w3-container w3-text-black w3-padding">
            <h2><?php  print($CurrentUser['fname']." ".$CurrentUser['lname'])?></h2>
          </div>
        </div>
        <div class="w3-container">
        <form id="affiliate" class="w3-form">
            <input name="id" type="hidden" value="<?php if(!empty($affiliate['id'])){echo $affiliate['id'];}?>" />
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Affliliate</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Jamaica</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php  print($CurrentUser['email'])?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php  print($CurrentUser['phone'])?></p>
          <hr>
          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Affiliate Information</b></p>
          <p>Affliate Code</p>
          <div class="w3-light-grey w3-round-xlarge w3-small ">
            <input value="<?php if(!empty($code)){echo $code;}?>" type="type" id="code" name="code" class="w3-input w3-bordered" disabled/>
          </div>
           <p>Unique Link</p>
          <div class="w3-light-grey w3-round-xlarge w3-small" id="clickCopy">
            <input value="<?php if(!empty($unique_link)){echo $unique_link;}?>" type="type" id="link" name="link" class="w3-input w3-bordered" disabled/>
          </div>         
          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Banking Details</b></p>
          <?php if(!empty($affiliate['bank_details'])){
              $bank_details = json_decode($affiliate['bank_details']);
          }
          ?>
          <p>Account Number</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <input type="number" id="account" name="account" value="<?php if(!empty($bank_details->account)){echo $bank_details->account;}?>"  class="w3-input w3-bordered" />
          </div>
          <p>Name on Account</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
              <input type="text" id="name" name="name" value="<?php if(!empty($bank_details->name)){echo $bank_details->name;}?>" class="w3-input w3-bordered" />
          </div>
          <p>Account Type</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <select class="w3-select" name="type">
                <?php if(!empty($bank_details->type) && $bank_details->type == "Saving"){?>
                <option value="Checking">Checking</option>
                <option value="Saving" selected>Saving</option>
                <?php }else{?>
                <option value="Checking" selected>Checking</option>
                <option value="Saving">Saving</option>                
                <?php }?>
            </select>
          </div>
          <p>Branch/Location</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <input type="text" id="branch" name="branch" value="<?php if(!empty($bank_details->branch)){echo $bank_details->branch;}?>" class="w3-input w3-bordered" />
          </div>
          <br>
          
          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Address</b></p>
          <?php if(!empty($CurrentUser['address'])){
              $address = json_decode($CurrentUser['address']);
          }
          ?>
          <p>Street</p>
          <div class="w3-light-grey w3-round-xlarge">
            <input type="text" id="street" name="street" value="<?php if(!empty($address->street)){echo $address->street;}?>" class="w3-input w3-bordered" />
          </div>
          <p>City</p>
          <div class="w3-light-grey w3-round-xlarge">
            <input type="text" id="street" name="city" class="w3-input w3-bordered" value="<?php if(!empty($address->city)){echo $address->city;}?>"/>
          </div>
          <p>Parish/State</p>
          <div class="w3-light-grey w3-round-xlarge">
            <input type="text" id="state" name="state" class="w3-input w3-bordered" value="<?php if(!empty($address->state)){echo $address->state;}?>"/>
          </div>
          <br>
          <div class="w3-padding-16">
            <button class="w3-button w3-green" type="submit">Update Information</button>
          </div>
        </div>
        </form>
      </div><br>
    
    <!-- End Left Column -->
    </div>
<?php 
$price = 0;
$count = 0;
if(!empty($transactions)){
    foreach($transactions as $transaction){
        $price += $transaction['price'];
        $count = $count + 1;
        }
        
    }
    
    ?>
    <!-- Right Column -->
    <div class="w3-twothird">
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-pie-chart fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Primary earnings</h2>
        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-third">
                <div class="w3-container w3-red w3-padding-16">
                    <div class="w3-left"><i class="fa fa-line-chart w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo "$".number_format(($price * 10)/100,2);?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Earnings</h4>
                </div>
            </div>
            <div class="w3-third">
                <div class="w3-container w3-blue w3-padding-16">
                    <div class="w3-left"><i class="fa fa-money w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo "$".number_format($price,2)?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Total Sales</h4>
                </div>
            </div>
            <div class="w3-third">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo $count?>
                        </h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Transactions Complete</h4>
                </div>
            </div>
        </div>
      </div>

<!--      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-dollar fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>This Month's Earning</h2>
        <div class="w3-container w3-row-padding w3-margin-bottom">
          <table class="w3-table w3-striped">
              <thead class="w3-teal">
                <tr>
                  <th>Month</th>
                  <th>Total Commission</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
<?php if(!empty($transactions)){
    foreach($transactions as $transaction){
        
            
        ?>
                <tr>
                   <td>June</td> 
                   <td>52,000</td>
                   <td>Jan 2, 2021</td>
                </tr>
   <?php }}?>            
              </tbody>
          </table>
          <hr>
        </div>
      </div> -->

      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-dollar fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Transactions</h2>
        <div class="w3-container w3-row-padding w3-margin-bottom">
          <table class="w3-table w3-striped">
              <thead class="w3-teal">
                <tr>
                  <th>Service</th>
                  <th>Customer</th>
                  <th>Cost</th>
                  <th>Date</th>
                  <th>Commission</th>
                </tr>
              </thead>
              <tbody>
<?php if(!empty($transactions)){
            foreach($transactions as $transaction){
                
?>
                <tr>
                   <td><?php echo $transaction['name']?></td> 
                   <td><?php echo $transaction['fname']. " ".$transaction['lname'] ?></td>
                   <td><?php echo "$".number_format($transaction['price'],2)?></td>
                   <td><?php echo $transaction['dateCreated']?></td>
                   <td><?php echo "$".number_format($transaction['price'] * 10 / 100,2)?></td>
                </tr>
<?php }}?>
              </tbody>
          </table>
          <hr>
        </div>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>
<script> 
    $(document).ready(function () { 
        $('#affiliate').on('submit',function (e) { 
            e.preventDefault(); 
            var formData = $(this).serialize(); 
            
            $.ajax({ 
                url: 'index.php?route=dashboard/updateAffiliate', 
                type: 'POST', 
                data: formData, 
                success: function (response) { 
                    let message = response.message;
                    let address = response.address;
                    if(message){alert(message);}
                    if(address){alert(address);}
                    //location.reload();
                }, 
                error: function (jqXHR, textStatus, errorThrown) { 
                    alert(errorThrown); 
                } 
            }); 
        }); 
    }); 
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const textElement = document.getElementById('link');

    textElement.addEventListener('click', function() {
        // Create a temporary textarea element
        const tempTextarea = document.createElement('textarea');
        tempTextarea.value = textElement.innerText;
        document.body.appendChild(tempTextarea);

        // Select the text
        tempTextarea.select();
        tempTextarea.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text
        document.execCommand('copy');

        // Remove the temporary textarea
        document.body.removeChild(tempTextarea);

        // Optional: Notify the user
        alert('Text copied to clipboard!');
    });
});


</script>
</body>
</html>
