<?php
require(VIEWS."Dashboard/headers.php");
?>

<style>
    
   .dashy
{width: 100%;
       padding-left: 161px; 
    
    
    
} 
    
    
</style>





<section class="dashy w3-display-container">
    
    <div class="w3-container w3-padding-16">
        <h3>Card Payments</h3>
        <div class="w3-row">
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button tablink w3-red" onclick="openTab(event,'transactions')"><i class="fa fa-bar-chart" style="font-size:36px"></i> Transactions</button>
                <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'settins')"><i class="fa fa-gear" style="font-size:36px;"></i> Payment Gateway Settings</button>
            </div>
            <div id="transactions" class="w3-container w3-border tabs w3-padding-32">
                <hr />
                <h4>Transactions</h4>
                <table class="w3-table w3-striped w3-boder">
                    <thead class="w3-teal">
                        <tr>
                            <th>Date</th>
                            <th>Gateway Order ID</th>
                            <th>Card Holder Name</th>
                            <th>Card Number</th>
                            <th>RRN</th>
                            <th>Transaction ID</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php if(!empty($transactions)){
                    foreach ($transactions as $transaction){
                    ?>
                        <tr>
                            <td><?php echo $transaction['Date']?></td>
                            <td><?php echo $transaction['OrderID']?></td>
                            <td><?php echo $transaction['CardHolderName']?></td>
                            <td><?php echo $transaction['CardPan']?></td>
                            <td><?php echo $transaction['rrn']?></td>
                            <td><?php echo $transaction['Transaction_Id']?></td>
                            <td><?php echo $transaction['Total']?></td>
                            <td><?php echo $transaction['status']?></td>
                        </tr>
                <?php
                    }
                }
                ?>
                    </tbody>
                </table>
            </div>
            
            <div id="settins" class="w3-container w3-border tabs w3-padding-32" style="display:none">
                <h4>Payment Gateway Simplified Settings</h4>
                <form method="post" enctype="multipart/form-data" id="payment">
                    <div class=w3-row>
                        <div class="w3-quarter">
                            <div class="w3-container w3-card-4">
                                <h4>Select Gateway Mode</h4>
                                
                                <?php if(!empty($settings['mode']) && $settings['mode']=="Live"){?>
                                <p>
                                    <input class="w3-radio" type="radio" name="status" value="Live" checked>
                                    <label>Live</label>
                                </p>
                                <p>
                                    <input class="w3-radio" type="radio" name="status" value="Sandbox">
                                    <label>Sandbox</label>
                                </p>
                                <?php }elseif(!empty($settings['mode']) && $settings['mode']=="Sandbox"){?>
                               <p>
                                    <input class="w3-radio" type="radio" name="status" value="Live">
                                    <label>Live</label>
                                </p>
                                <p>
                                    <input class="w3-radio" type="radio" name="status" value="Sandbox" checked>
                                    <label>Sandbox</label>
                                </p>
                                <?php }else{?>
                               <p>
                                    <input class="w3-radio" type="radio" name="status" value="Live">
                                    <label>Live</label>
                                </p>
                                <p>
                                    <input class="w3-radio" type="radio" name="status" value="Sandbox">
                                    <label>Sandbox</label>
                                </p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="w3-threequarter">
                            <div class="w3-container w3-content">
                                <h3 id="gatewayMode">Live Gateway</h3>
                                <input name="gateway_id" class="w3-input" type="hidden" value="<?php if(!empty($settings['id'])){echo $settings['id'];} ?>"/>
                                    <div class="w3-card w3-padding w3-content">
                                        <div class="w3-padding-16">
                                            <label>Merchant ID</label>
                                            <input name="merchant_id" class="w3-input w3-round-large" type="text" value="<?php if(!empty($settings['merchant_id'])){echo $settings['merchant_id'];} ?>"/>
                                        </div>
                                        <div class="w3-padding-16">
                                            <label>Merchant Key</label>
                                            <input name="merchant_key" class="w3-input w3-round-large" type="password" value="<?php if(!empty($settings['merchand_password'])){echo $settings['merchand_password'];} ?>"/>
                                        </div>
                                        <hr/>
                                        <div class="w3-padding-16">
                                            <label>Merchant Sandbox ID</label>
                                            <input name="merchant_sand_id" class="w3-input w3-round-large" type="text" value="<?php if(!empty($settings['merchant_sandbox_id'])){echo $settings['merchant_sandbox_id'];} ?>"/>
                                        </div>
                                        <div class="w3-padding-16">
                                            <label>Merchant Sandbox Password</label>
                                            <input name="merchant_sand_key" class="w3-input w3-round-large" type="password" value="<?php if(!empty($settings['merchant_sandbox_password'])){echo $settings['merchant_sandbox_password'];} ?>"/>
                                        </div>
                                        <div class="w3-padding-16">
                                            <button class="w3-button w3-green" id="submit">
                                                <li class="fa fa-check" style="font-size:16px;"></li> Save
                                            </button>
                                            <p class="w3-text-green" id="message"></p>
                                        </div>                    
                                    </div>
                            </div>                               
                        </div>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</section>


<script> 
    $(document).ready(function () { 
        $('#payment').submit(function (e) { 
            e.preventDefault(); 
            var formData = $(this).serialize(); 
            $.ajax({ 
                url: 'index.php?route=FirstAtlanticCommerce/save', 
                type: 'POST', 
                data: formData, 
                success: function (response) { 
                    
                    let message = response.message;
                    alert(message);
                    $('#message').html(message);
                    
                }, 
                error: function (jqXHR, textStatus, errorThrown) { 
                    alert(errorThrown); 
                } 
            }); 
        }); 
    });
</script>
<script>
    function openTab(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("tabs");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " w3-red";
    }
</script>