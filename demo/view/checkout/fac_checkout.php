<?php
require(VIEWS."home_header.php");

?>
    <style>
    
    .btn-primary {
    color: #fff;
    background-color: #376254;
    border-color: #0d6efd;
}
    


 .footer-area {
    background-color: #EBF3EF!important;
    margin-top: auto!important;
    position: relative !important;
    overflow: hidden !important;
}




    
    
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">

  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <div style="padding:50px;"></div>
    <br />
    <h2>Almost There!</h2>
    <p class="lead">Your Adventure is scheduled and waiting for you to take you final step! <br />We appreciate your trust in our service. If you have any questions or need assistance, our support team is here for you 24/7.</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div class="d-flex align-items-center">
              <div>
                   <h6 class="my-0"><?php if(!empty($service['name'])){echo $service['name'];}?></h6>            
                   <p><small class="text-muted"><?php if(!empty($service['date'])){echo "Date: ". $service['date'];}?></small><br /></p>
                   <small class="text-muted"><?php if(!empty($service['date'])){echo "Time: ". $service['time'];}?></small>
              </div>
           
          
          </div>
          <img src="<?php if(!empty($service['image_url'])){echo $service['image_url'];}?>" style="width:50%; height:auto" alt="<?php echo $service['name'];?>"/>
        </li>
        <!--<li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li> -->
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (JMD)</span>
          <strong style="font-size:2.5em;"><?php if(!empty($service['price'])){echo "$".$service['price'];}?></strong>
        </li>
      </ul>
    <!-- Promo Codes -->
      
    <!-- 
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
       -->
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form id="checkout" class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control checkoutform" name="firstName" id="firstName" placeholder="John" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control checkoutform" name="lastName" id="lastName" placeholder="Snow" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="phone">Phone</label>
            <input type="text" class="form-control checkoutform" name="phone" id="phone" placeholder="+1-876-192-3847" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your Telephone Number is required.
            </div>
        </div>
        <div class="mb-3">
          <label for="mobile">Mobile <span class="text-muted">(WhatsApp Preferred)</span></label>
            <input type="text" name="mobile" class="form-control checkoutform" id="mobile" placeholder="+1-876-192-3847" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your Telephone Number is required.
            </div>
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control checkoutform" name="email" id="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for billing updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control checkoutform" name="address" id="address" placeholder="124 Main St East, Winterphell" required>
          <div class="invalid-feedback">
            Please enter your billing address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" name="address2" class="form-control checkoutform" id="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select name="country" class="custom-select d-block w-100 form-control checkoutform" id="country" required>
                <option value="Afghanistan" data-code="AF">Afghanistan</option>
                <option value="Aland Islands" data-code="AX">Aland Islands</option>
                <option value="Albania" data-code="AL">Albania</option>
                <option value="Algeria" data-code="DZ">Algeria</option>
                <option value="AmericanSamoa" data-code="AS">AmericanSamoa</option>
                <option value="Andorra" data-code="AD">Andorra</option>
                <option value="Angola" data-code="AO">Angola</option>
                <option value="Anguilla" data-code="AI">Anguilla</option>
                <option value="Antarctica" data-code="AQ">Antarctica</option>
                <option value="Antigua and Barbuda" data-code="AG">Antigua and Barbuda</option>
                <option value="Argentina" data-code="AR">Argentina</option>
                <option value="Armenia" data-code="AM">Armenia</option>
                <option value="Aruba" data-code="AW">Aruba</option>
                <option value="Australia" data-code="AU">Australia</option>
                <option value="Austria" data-code="AT">Austria</option>
                <option value="Azerbaijan" data-code="AZ">Azerbaijan</option>
                <option value="Bahamas" data-code="BS">Bahamas</option>
                <option value="Bahrain" data-code="BH">Bahrain</option>
                <option value="Bangladesh" data-code="BD">Bangladesh</option>
                <option value="Barbados" data-code="BB">Barbados</option>
                <option value="Belarus" data-code="BY">Belarus</option>
                <option value="Belgium" data-code="BE">Belgium</option>
                <option value="Belize" data-code="BZ">Belize</option>
                <option value="Benin" data-code="BJ">Benin</option>
                <option value="Bermuda" data-code="BM">Bermuda</option>
                <option value="Bhutan" data-code="BT">Bhutan</option>
                <option value="Plurinational State of Bolivia" data-code="BO">Plurinational State of Bolivia</option>
                <option value="Bosnia and Herzegovina" data-code="BA">Bosnia and Herzegovina</option>
                <option value="Botswana" data-code="BW">Botswana</option>
                <option value="Brazil" data-code="BR">Brazil</option>
                <option value="British Indian Ocean Territory" data-code="IO">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam" data-code="BN">Brunei Darussalam</option>
                <option value="Bulgaria" data-code="BG">Bulgaria</option>
                <option value="Burkina Faso" data-code="BF">Burkina Faso</option>
                <option value="Burundi" data-code="BI">Burundi</option>
                <option value="Cambodia" data-code="KH">Cambodia</option>
                <option value="Cameroon" data-code="CM">Cameroon</option>
                <option value="Canada" data-code="CA">Canada</option>
                <option value="Cape Verde" data-code="CV">Cape Verde</option>
                <option value="Cayman Islands" data-code="KY">Cayman Islands</option>
                <option value="Central African Republic" data-code="CF">Central African Republic</option>
                <option value="Chad" data-code="TD">Chad</option>
                <option value="Chile" data-code="CL">Chile</option>
                <option value="China" data-code="CN">China</option>
                <option value="Christmas Island" data-code="CX">Christmas Island</option>
                <option value="Cocos (Keeling) Islands" data-code="CC">Cocos (Keeling) Islands</option>
                <option value="Colombia" data-code="CO">Colombia</option>
                <option value="Comoros" data-code="KM">Comoros</option>
                <option value="Congo" data-code="CG">Congo</option>
                <option value="The Democratic Republic of the Congo" data-code="CD">The Democratic Republic of the Congo</option>
                <option value="Cook Islands" data-code="CK">Cook Islands</option>
                <option value="Costa Rica" data-code="CR">Costa Rica</option>
                <option value="Cote d&#039;Ivoire" data-code="CI">Cote d&#039;Ivoire</option>
                <option value="Croatia" data-code="HR">Croatia</option>
                <option value="Cuba" data-code="CU">Cuba</option>
                <option value="Cyprus" data-code="CY">Cyprus</option>
                <option value="Czech Republic" data-code="CZ">Czech Republic</option>
                <option value="Denmark" data-code="DK">Denmark</option>
                <option value="Djibouti" data-code="DJ">Djibouti</option>
                <option value="Dominica" data-code="DM">Dominica</option>
                <option value="Dominican Republic" data-code="DO">Dominican Republic</option>
                <option value="Ecuador" data-code="EC">Ecuador</option>
                <option value="Egypt" data-code="EG">Egypt</option>
                <option value="El Salvador" data-code="SV">El Salvador</option>
                <option value="Equatorial Guinea" data-code="GQ">Equatorial Guinea</option>
                <option value="Eritrea" data-code="ER">Eritrea</option>
                <option value="Estonia" data-code="EE">Estonia</option>
                <option value="Ethiopia" data-code="ET">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)" data-code="FK">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands" data-code="FO">Faroe Islands</option>
                <option value="Fiji" data-code="FJ">Fiji</option>
                <option value="Finland" data-code="FI">Finland</option>
                <option value="France" data-code="FR">France</option>
                <option value="French Guiana" data-code="GF">French Guiana</option>
                <option value="French Polynesia" data-code="PF">French Polynesia</option>
                <option value="Gabon" data-code="GA">Gabon</option>
                <option value="Gambia" data-code="GM">Gambia</option>
                <option value="Georgia" data-code="GE">Georgia</option>
                <option value="Germany" data-code="DE">Germany</option>
                <option value="Ghana" data-code="GH">Ghana</option>
                <option value="Gibraltar" data-code="GI">Gibraltar</option>
                <option value="Greece" data-code="GR">Greece</option>
                <option value="Greenland" data-code="GL">Greenland</option>
                <option value="Grenada" data-code="GD">Grenada</option>
                <option value="Guadeloupe" data-code="GP">Guadeloupe</option>
                <option value="Guam" data-code="GU">Guam</option>
                <option value="Guatemala" data-code="GT">Guatemala</option>
                <option value="Guernsey" data-code="GG">Guernsey</option>
                <option value="Guinea" data-code="GN">Guinea</option>
                <option value="Guinea-Bissau" data-code="GW">Guinea-Bissau</option>
                <option value="Guyana" data-code="GY">Guyana</option>
                <option value="Haiti" data-code="HT">Haiti</option>
                <option value="Holy See (Vatican City State)" data-code="VA">Holy See (Vatican City State)</option>
                <option value="Honduras" data-code="HN">Honduras</option>
                <option value="Hong Kong" data-code="HK">Hong Kong</option>
                <option value="Hungary" data-code="HU">Hungary</option>
                <option value="Iceland" data-code="IS">Iceland</option>
                <option value="India" data-code="IN">India</option>
                <option value="Indonesia" data-code="ID">Indonesia</option>
                <option value="Iran, Islamic Republic of Persian Gulf" data-code="IR">Iran, Islamic Republic of Persian Gulf</option>
                <option value="Iraq" data-code="IQ">Iraq</option>
                <option value="Ireland" data-code="IE">Ireland</option>
                <option value="Isle of Man" data-code="IM">Isle of Man</option>
                <option value="Israel" data-code="IL">Israel</option>
                <option value="Italy" data-code="IT">Italy</option>
                <option value="Jamaica" data-code="JM">Jamaica</option>
                <option value="Japan" data-code="JP">Japan</option>
                <option value="Jersey" data-code="JE">Jersey</option>
                <option value="Jordan" data-code="JO">Jordan</option>
                <option value="Kazakhstan" data-code="KZ">Kazakhstan</option>
                <option value="Kenya" data-code="KE">Kenya</option>
                <option value="Kiribati" data-code="KI">Kiribati</option>
                <option value="Democratic People&#039;s Republic of Korea" data-code="KP">Democratic People&#039;s Republic of Korea</option>
                <option value="Republic of South Korea" data-code="KR">Republic of South Korea</option>
                <option value="Kuwait" data-code="KW">Kuwait</option>
                <option value="Kyrgyzstan" data-code="KG">Kyrgyzstan</option>
                <option value="Laos" data-code="LA">Laos</option>
                <option value="Latvia" data-code="LV">Latvia</option>
                <option value="Lebanon" data-code="LB">Lebanon</option>
                <option value="Lesotho" data-code="LS">Lesotho</option>
                <option value="Liberia" data-code="LR">Liberia</option>
                <option value="Libyan Arab Jamahiriya" data-code="LY">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein" data-code="LI">Liechtenstein</option>
                <option value="Lithuania" data-code="LT">Lithuania</option>
                <option value="Luxembourg" data-code="LU">Luxembourg</option>
                <option value="Macao" data-code="MO">Macao</option>
                <option value="Macedonia" data-code="MK">Macedonia</option>
                <option value="Madagascar" data-code="MG">Madagascar</option>
                <option value="Malawi" data-code="MW">Malawi</option>
                <option value="Malaysia" data-code="MY">Malaysia</option>
                <option value="Maldives" data-code="MV">Maldives</option>
                <option value="Mali" data-code="ML">Mali</option>
                <option value="Malta" data-code="MT">Malta</option>
                <option value="Marshall Islands" data-code="MH">Marshall Islands</option>
                <option value="Martinique" data-code="MQ">Martinique</option>
                <option value="Mauritania" data-code="MR">Mauritania</option>
                <option value="Mauritius" data-code="MU">Mauritius</option>
                <option value="Mayotte" data-code="YT">Mayotte</option>
                <option value="Mexico" data-code="MX">Mexico</option>
                <option value="Federated States of Micronesia" data-code="FM">Federated States of Micronesia</option>
                <option value="Moldova" data-code="MD">Moldova</option>
                <option value="Monaco" data-code="MC">Monaco</option>
                <option value="Mongolia" data-code="MN">Mongolia</option>
                <option value="Montenegro" data-code="ME">Montenegro</option>
                <option value="Montserrat" data-code="MS">Montserrat</option>
                <option value="Morocco" data-code="MA">Morocco</option>
                <option value="Mozambique" data-code="MZ">Mozambique</option>
                <option value="Myanmar" data-code="MM">Myanmar</option>
                <option value="Namibia" data-code="NA">Namibia</option>
                <option value="Nauru" data-code="NR">Nauru</option>
                <option value="Nepal" data-code="NP">Nepal</option>
                <option value="Netherlands" data-code="NL">Netherlands</option>
                <option value="Netherlands Antilles" data-code="AN">Netherlands Antilles</option>
                <option value="New Caledonia" data-code="NC">New Caledonia</option>
                <option value="New Zealand" data-code="NZ">New Zealand</option>
                <option value="Nicaragua" data-code="NI">Nicaragua</option>
                <option value="Niger" data-code="NE">Niger</option>
                <option value="Nigeria" data-code="NG">Nigeria</option>
                <option value="Niue" data-code="NU">Niue</option>
                <option value="Norfolk Island" data-code="NF">Norfolk Island</option>
                <option value="Northern Mariana Islands" data-code="MP">Northern Mariana Islands</option>
                <option value="Norway" data-code="NO">Norway</option>
                <option value="Oman" data-code="OM">Oman</option>
                <option value="Pakistan" data-code="PK">Pakistan</option>
                <option value="Palau" data-code="PW">Palau</option>
                <option value="Palestinian Territory" data-code="PS">Palestinian Territory</option>
                <option value="Panama" data-code="PA">Panama</option>
                <option value="Papua New Guinea" data-code="PG">Papua New Guinea</option>
                <option value="Paraguay" data-code="PY">Paraguay</option>
                <option value="Peru" data-code="PE">Peru</option>
                <option value="Philippines" data-code="PH">Philippines</option>
                <option value="Pitcairn" data-code="PN">Pitcairn</option>
                <option value="Poland" data-code="PL">Poland</option>
                <option value="Portugal" data-code="PT">Portugal</option>
                <option value="Puerto Rico" data-code="PR">Puerto Rico</option>
                <option value="Qatar" data-code="QA">Qatar</option>
                <option value="Romania" data-code="RO">Romania</option>
                <option value="Russia" data-code="RU">Russia</option>
                <option value="Rwanda" data-code="RW">Rwanda</option>
                <option value="Reunion" data-code="RE">Reunion</option>
                <option value="Saint Barthelemy" data-code="BL">Saint Barthelemy</option>
                <option value="Saint Helena" data-code="SH">Saint Helena</option>
                <option value="Saint Kitts and Nevis" data-code="KN">Saint Kitts and Nevis</option>
                <option value="Saint Lucia" data-code="LC">Saint Lucia</option>
                <option value="Saint Martin" data-code="MF">Saint Martin</option>
                <option value="Saint Pierre and Miquelon" data-code="PM">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and the Grenadines" data-code="VC">Saint Vincent and the Grenadines</option>
                <option value="Samoa" data-code="WS">Samoa</option>
                <option value="San Marino" data-code="SM">San Marino</option>
                <option value="Sao Tome and Principe" data-code="ST">Sao Tome and Principe</option>
                <option value="Saudi Arabia" data-code="SA">Saudi Arabia</option>
                <option value="Senegal" data-code="SN">Senegal</option>
                <option value="Serbia" data-code="RS">Serbia</option>
                <option value="Seychelles" data-code="SC">Seychelles</option>
                <option value="Sierra Leone" data-code="SL">Sierra Leone</option>
                <option value="Singapore" data-code="SG">Singapore</option>
                <option value="Slovakia" data-code="SK">Slovakia</option>
                <option value="Slovenia" data-code="SI">Slovenia</option>
                <option value="Solomon Islands" data-code="SB">Solomon Islands</option>
                <option value="Somalia" data-code="SO">Somalia</option>
                <option value="South Africa" data-code="ZA">South Africa</option>
                <option value="South Sudan" data-code="SS">South Sudan</option>
                <option value="South Georgia and the South Sandwich Islands" data-code="GS">South Georgia and the South Sandwich Islands</option>
                <option value="Spain" data-code="ES">Spain</option>
                <option value="Sri Lanka" data-code="LK">Sri Lanka</option>
                <option value="Sudan" data-code="SD">Sudan</option>
                <option value="Suricountry" data-code="SR">Suricountry</option>
                <option value="Svalbard and Jan Mayen" data-code="SJ">Svalbard and Jan Mayen</option>
                <option value="Swaziland" data-code="SZ">Swaziland</option>
                <option value="Sweden" data-code="SE">Sweden</option>
                <option value="Switzerland" data-code="CH">Switzerland</option>
                <option value="Syrian Arab Republic" data-code="SY">Syrian Arab Republic</option>
                <option value="Taiwan" data-code="TW">Taiwan</option>
                <option value="Tajikistan" data-code="TJ">Tajikistan</option>
                <option value="Tanzania" data-code="TZ">Tanzania</option>
                <option value="Thailand" data-code="TH">Thailand</option>
                <option value="Timor-Leste" data-code="TL">Timor-Leste</option>
                <option value="Togo" data-code="TG">Togo</option>
                <option value="Tokelau" data-code="TK">Tokelau</option>
                <option value="Tonga" data-code="TO">Tonga</option>
                <option value="Trinidad and Tobago" data-code="TT">Trinidad and Tobago</option>
                <option value="Tunisia" data-code="TN">Tunisia</option>
                <option value="Turkey" data-code="TR">Turkey</option>
                <option value="Turkmenistan" data-code="TM">Turkmenistan</option>
                <option value="Turks and Caicos Islands" data-code="TC">Turks and Caicos Islands</option>
                <option value="Tuvalu" data-code="TV">Tuvalu</option>
                <option value="Uganda" data-code="UG">Uganda</option>
                <option value="Ukraine" data-code="UA">Ukraine</option>
                <option value="United Arab Emirates" data-code="AE">United Arab Emirates</option>
                <option value="United Kingdom" data-code="GB">United Kingdom</option>
                <option value="United States" data-code="US">United States</option>
                <option value="Uruguay" data-code="UY">Uruguay</option>
                <option value="Uzbekistan" data-code="UZ">Uzbekistan</option>
                <option value="Vanuatu" data-code="VU">Vanuatu</option>
                <option value="Venezuela" data-code="VE">Venezuela</option>
                <option value="Vietnam" data-code="VN">Vietnam</option>
                <option value="British Virgin Islands" data-code="VG">British Virgin Islands</option>
                <option value="U.S. Virgin Islands" data-code="VI">U.S. Virgin Islands</option>
                <option value="Wallis and Futuna" data-code="WF">Wallis and Futuna</option>
                <option value="Yemen" data-code="YE">Yemen</option>
                <option value="Zambia" data-code="ZM">Zambia</option>
                <option value="Zimbabwe" data-code="ZW">Zimbabwe</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="city">State</label>
            <input type="text" name="state" class="form-control checkoutform" id="state" placeholder="kingslanding" required>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control checkoutform" id="city" placeholder="Winterfell" required>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" name="zip" class="form-control checkoutform" id="zip" placeholder="00000" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>

        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
            <p>We only accept</p>
            <p>
                <img src="<?php echo LOAD_ASSETS.'img/card-images/mastercard-logo-png-transparent.png'?>" class="img-fluid" style="width:80px;height:50px" alt="mastercard" title="We Accept Mastercards" />
                <img src="<?php echo LOAD_ASSETS.'img/card-images/Visa-Logo-2014.png'?>" class="img-fluid" style="width:80px;height:50px" alt="visa card" title="We Accept Visa Cards" />
            </p>
        </div>
        <hr class="mb-4">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" name="card-name" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" name="card-number" class="form-control" id="cc-number" placeholder=""  required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration Month</label>
            <select class="form-control border-info" id="expmonth" name="expmonth" style="cursor:pointer;">
                <option disabled selected hidden>Month</option>
                <option value="01" style="color: black;">Jan</option>
                <option value="02" style="color: black;">Feb</option>
                <option value="03" style="color: black;">Mar</option>
                <option value="04" style="color: black;">Apr</option>
                <option value="05" style="color: black;">May</option>
                <option value="06" style="color: black;">Jun</option>
                <option value="07" style="color: black;">Jul</option>
                <option value="08" style="color: black;">Aug</option>
                <option value="09" style="color: black;">Sep</option>
                <option value="10" style="color: black;">Oct</option>
                <option value="11" style="color: black;">Nov</option>
                <option value="12" style="color: black;">Dec</option>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration Year</label>
            <select class="form-control border-info" id="expyear" name="expyear" style="cursor:pointer;">
                <option disabled selected hidden>Year</option>
                <?php for ($i = date("y"); $i < date("y") + 10; $i ++){
                    echo "<option value = '$i'>20$i </option>";
                }
                ?>
            </select>            
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="password" name="cvv" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <input type="hidden" name="id" value="<?php if(!empty($service['id'])){echo $service['id'];}?>" />
        <input type="hidden" name="total" value="<?php if(!empty($service['price'])){echo $service['price'];}?>" />
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Checkout</button>
      </form>
    </div>
  </div>



<!-- The Modal -->
<div id="paypageModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-body">
      <iframe srcdoc="" id="payload" class="container-fluid" style="height:500px;"></iframe>
    </div>

  </div>

</div>
<div id="paypageerrorModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-body">
        <div class="text-center alert alert-danger alert-dismissible fade show">
            <h3><strong>Transaction Error</strong></h3>
            <p id="error"></p>
        </div>
    </div>
  </div>

</div>
<div id="snackbar">Saved</div>
<script> 
    $(document).ready(function () { 
        $('#checkout').submit(function (e) { 
            e.preventDefault(); 
            var formData = $(this).serialize(); 
            
            $.ajax({ 
                url: 'index.php?route=FirstAtlanticCommerce/confirm', 
                type: 'POST', 
                data: formData, 
                success: function (response) { 
                    
                    let htmlform = response.form3ds;
                    let error = response.error;
                    if(htmlform){
                        $("#payload").attr("srcdoc", htmlform);
                        $("#paypageModal").css("display","block");
                    }
                    if(error){
                        alert(error);
                        $("#error").html(error);
                        $("#paypageerrorModal").css("display","block");
                    }
                }, 
                error: function (jqXHR, textStatus, errorThrown) { 
                    alert(errorThrown); 
                } 
            }); 
        }); 
        $('#paypageModal').click(function (){
            $('#paypageModal').css("display","none");
        });
        $('#paypageerrorModal').click(function (){
            $('#paypageerrorModal').css("display","none");
        });
    }); 
</script>
<script>
    $(document).ready(function () { 
        $(".checkoutform").change(function(e){
            e.preventDefault(); 
            var formData = $(this).serialize(); 
            $.ajax({ 
                url: 'index.php?route=Checkout/update_order', 
                type: 'POST', 
                data: formData, 
                success: function (response) { 
                  var x = document.getElementById("snackbar");  
                  x.className = "show"; 
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }, 
                error: function (jqXHR, textStatus, errorThrown) { 
                    alert(errorThrown); 
                } 
            });            
        }); 
    });
</script>
<?php
require(VIEWS."home_footer.php");
?>