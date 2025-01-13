<?php
require VIEWS."new_header.php";

if(!$userData["address"] or $userData["address"] === ""){
  $userData["address"] = "{}";  
}


if($affiliateData){
    if(!$affiliateData["affiliate_code"] or $affiliateData["affiliate_code"] === ""){
        $affilateData["code"] = $code; 
    }
}

$addressData = json_decode($userData["address"]);


if(!isset($addressData->street1)){
    $addressData->street1 = "";
}
if(!isset($addressData->street2)){
    $addressData->street2 = "";
}
if(!isset($addressData->country)){
    $addressData->country = "JM";
}
if(!isset($addressData->region)){
    $addressData->region = "";
}
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.min.js" integrity="sha256-AlTido85uXPlSyyaZNsjJXeCs07eSv3r43kyCVc8ChI=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/css/intlTelInput.css"><script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/js/intlTelInput.min.js"></script>

<!--GeoData-->
<script src="<?php echo $base_url?>/assets/geodata/js/geodatasource-cr.min.js"></script>
<link rel="gettext" type="application/x-po" href="<?php echo $base_url?>/assets/geodata/en/LC_MESSAGES/en.po" />
<script type="text/javascript" src="<?php echo $base_url?>/assets/geodata/js/Gettext.js"></script>

<link rel="stylesheet" href="<?php echo $base_url?>/assets/geodata/css/geodatasource-countryflag.css">



<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    * {
        margin: 0;
        padding: 0;
        list-style: none;
        font-family: 'Lato', sans-serif;
        line-height: 1;
    }

    body {
        background-color: #F5F6F8;
    }

    .sidebar-navigation {
        position:fixed;
        z-index:2;
        display: inline-block;
        min-height: 100vh;
        width: 80px;
        background-color: #313443;
        float: left;
    }

    .sidebar-navigation ul {
        text-align: center;
        color: white;
    }

    .sidebar-navigation ul li {
        padding: 28px 0;
        cursor: pointer;
        transition: all ease-out 120ms;
    }

    .sidebar-navigation ul li i {
        display: block;
        font-size: 24px;
        transition: all ease 450ms;
    }

    .sidebar-navigation ul li .tooltip {
        display: inline-block;
        position: fixed;
        background-color: #313443;
        padding: 8px 15px;
        border-radius: 3px;
        margin-top: -26px;
        left: 90px;
        opacity: 0;
        visibility: hidden;
        font-size: 13px;
        letter-spacing: .5px;
    }

    .sidebar-navigation ul li .tooltip:before {
        content: '';
        display: block;
        position: absolute;
        left: -4px;
        top: 10px;
        transform: rotate(45deg);
        width: 10px;
        height: 10px;
        background-color: inherit;
    }

    .sidebar-navigation ul li:hover {
        background-color: #22252E;
    }

    .sidebar-navigation ul li:hover .tooltip {
        visibility: visible;
        opacity: 1;
    }

    .sidebar-navigation ul li.active {
        background-color: #22252E;
    }

    .sidebar-navigation ul li.active i {
        color: #98D7EC;
    }



    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
    }

    header {
        background-color: #4CAF50;
        color: white;
        padding: 1rem;
        text-align: center;
    }

    .container {
        display: grid;
        z-index:1;
        grid-template-columns: 1fr;
        gap: 20px;
        margin: 20px;
    }

    @media (min-width: 768px) {
        .container {
            grid-template-columns: 1fr 1fr;
        }
    }

    section {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    label {
        font-weight: bold;
    }
    label::after{
        content:':';
    }

    input, textarea, select{
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #427A27;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    button:hover {
        background-color: #549b31;
    }
    main{
        position:absolute;
        transform:translateX(80px);
    }

    .profile-image{
        width:100px;
        align-self: center;
    }
    main[hidden]{
        display:none;
    }

    /*Earnings dashboard */

    body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
    }

    .earnings-dashboard {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
    }

    .earnings-dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
    }

        .earnings-dashboard-header h2 {
            font-size: 20px;
            margin: 0;
            color: #555;
        }

        .earnings-dashboard-header .date-range {
            font-size: 14px;
            color: #888;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .stat {
            flex: 1;
            min-width: 200px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-title {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #007BFF;
        }

        .stat-value.earnings {
            color: #28a745;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }

</style>
<nav class="sidebar-navigation">
    <ul>
        <li id="menu-profile" class="active">
            <img src="<?php echo $base_url?>/assets/svg/user.svg" alt="Profile">
            <span class="tooltip">Profile</span>
        </li>

        <?php if($affiliateData){?>
        <li id="menu-seller">
            <img src="<?php echo $base_url?>/assets/svg/seller.svg" alt="Profile">
            <span class="tooltip">Independent Seller</span>
        </li>
        <?php } ?>

        <li>
            <i class="fa-regular fa-circle-user"></i>
            <span class="tooltip">Services</span>
        </li>
        <li>
            <i class="fa fa-print"></i>
            <span class="tooltip">Users</span>
        </li>
        <li>
            <i class="fa fa-sliders"></i>
            <span class="tooltip">Orders</span>
        </li>
    </ul>
</nav>

<main id="profile" class="container">
    <!-- Profile Section -->
    <section>
        <h2>Profile Information</h2>
        <form disabled id="profile-form" class="profile-info">
            <img class="profile-image" src="<?php  echo $base_url?>/public/img/user-image/default.jpeg">
            <label for="name">Name</label>
            <div style="display:flex">
                <input disabled type="text" id="fname" name="fname" placeholder="First" value="<?php echo htmlspecialchars($userData['fname'], ENT_QUOTES, 'utf-8')?>" required>
                <input  disabled type="text" id="lname" name="lname" placeholder="Last" value="<?php echo htmlspecialchars($userData['lname'], ENT_QUOTES, 'utf-8')?>" required>
            </div>

            <label for="email">Email</label>
            <input disabled type="email" id="email" name="email" placeholder="Email" value="<?php echo  htmlspecialchars($userData['email'], ENT_QUOTES, 'utf-8')?>" required>

            <label for="phone">Phone</label>
            <input disabled type="tel" id="phone" name="phone" placeholder="Phone number" value="<?php echo  htmlspecialchars($userData['phone'], ENT_QUOTES, 'utf-8')?>" required>

            <label for="bio">Bio</label>
            <textarea disabled id="bio" name="bio" placeholder="Tell us about yourself"></textarea>

            <!-- <button type="submit">Update Profile</button> -->
        </form>
        
    </section>
    <section>
        <h2> Address </h2>
        <form id="address-form" class="profile-info">
            <label>Line 1</label>
            <input type="text" id="address1" name="street1" autocomplete="address-line1" value="<?php echo  htmlspecialchars($addressData->street1, ENT_QUOTES, 'utf-8')?>" required>

            <label>Line 2</label>
            <input type="text" id="address2" name="street2" autocomplete="address-line2" value="<?php echo  htmlspecialchars($addressData->street2, ENT_QUOTES, 'utf-8')?>">
               
            <label>Country</label> 
            <select class="gds-cr no-gds-countryflag" name="country" country-data-region-id="gds-cr-two" data-language="en" country-data-default-value="<?php echo  htmlspecialchars($addressData->country, ENT_QUOTES, 'utf-8')?>" required></select>

            <label>Region</label>
            <select id="gds-cr-two" name="region"  data-value="<?php echo  htmlspecialchars($addressData->region, ENT_QUOTES, 'utf-8')?>" required></select>
            <button type="submit">Update Address</button>
        </form>
    </section>

    <section>
        <form class="profile-info">
            <h2>Bank Account Details</h2>
            <label>Bank Name</label>
            <input type="text" id="bank-name" name="name">
            <label>Account Type</label>
            <input type="text" id="bank-acc-type" name="type" >
            <label>Account Number</label>
            <input type="text" id="bank-acc-num" name="acc-num">
            <label>Branch Location</label>
            <input type="text" id="bank-address" name="address" >
            <button type="submit">Update Info</button>
        </form>
    </section>
</main>

<?php if($affiliateData){ ?>
<main class="container" id="seller" hidden>
  <section>
  <form class="profile-info">
    <h2>Independent Seller</h2>
    <label>Affiliate Code</label>
    <input type="text" disabled value="CODE">
    <label>Link</label>
    <input type="text" disabled value="https://yardyadventures.com">
    <label>sharable QR Code</label>
    <div id="qr-image"></div>
  </form>
  </section>

  <section class="earnings-dashboard">
    <div>
        <div class="x-earnings-dashboard-header">
            <h2>Earnings Dashboard</h2>
            <span class="date-range">Jan 1, 2023 - Jan 31, 2023</span>
        </div>

        <div class="stats">
            <div class="stat">
                <div class="stat-title">Total Earnings</div>
                <div class="stat-value earnings">$0.00</div>
            </div>
            <div class="stat">
                <div class="stat-title">Total Sales</div>
                <div class="stat-value">0</div>
            </div>
            <div class="stat">
                <div class="stat-title">Commission Rate</div>
                <div class="stat-value">15%</div>
            </div>
        </div>
    </div>
  </section>
</main>
<?php } ?>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.sidebar-navigation ul li').on('click', function() {
        $('li').removeClass('active');
        $(this).addClass('active');

        if($(this).attr("id") === "menu-seller"){
            document.querySelectorAll("main").forEach ( main => {
                main.hidden = true;
            });
            document.querySelector("#seller").hidden = false;
        }

        if($(this).attr("id") === "menu-profile"){
            document.querySelectorAll("main").forEach ( main => {
                main.hidden = true;
            });
            document.querySelector("#profile").hidden = false;
        }

    });

    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
        loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/js/utils.js"),
    });

    $(".gds-cr").select2();
    $("#gds-cr-two").select2();

    const qr = new QRCode(document.getElementById("qr-image"));
    qr.makeCode("https://yardyadventures.com");

    //Profile Form submission code 
    
    $(document).ready(function () { 
        $('#profile-form').on('submit',function (e) { 
            e.preventDefault(); 
            var formData = $(this).serialize(); 
            
            $.ajax({ 
                url: 'index.php?route=dashboard/updateProfileInfo', 
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


    $('#address-form').on('submit',function (e) { 
            e.preventDefault(); 
            var formData = $(this).serialize(); 
            
            $.ajax({ 
                url: 'index.php?route=dashboard/updateProfileAddress', 
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

<?php require "footers.php"?>
