<?php
require(VIEWS . "Dashboard/headers.php");


//$value = session('uname');

$value="";

//$email = $value->email;
//$username = $value->username;


$summary = "Experience the thrill of Jamaica with Yardy Adventure Tours! Dive into the lush beauty of the island as you glide down the serene rivers on an exhilarating rafting adventure,
surrounded by vibrant greenery and cascading waterfalls. For a different kind of excitement, 
saddle up for a scenic horseback ride along breathtaking trails that wind through picturesque landscapes and coastal views. Whether you're seeking adrenaline or tranquility,
Yardy Adventure Tours offers the perfect blend of natural splendor and unforgettable fun. <a href=\"http://google.com\">Learn more here</a>";







//$profileUrl = "https://yardyadventures.com/test/influencer/profile/" . $value->username . "/" . $value->id;



?>
<style>

.theframex{
    position: relative;
    top: 14px;
    
}



/* Container for the phone frame */
.phone-frame {
    position: relative;
    width: 657px; /* Wider width for the phone frame */
    height: 700px; /* Adjusted height to maintain aspect ratio */
    margin: 0 auto; /* Center the phone frame */
    border: 16px solid #333;
    border-radius: 36px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
    background: #fff;
}

/* Top part of the phone */
.phone-frame::before {
    content: '';
    position: absolute;
    top: -16px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 6px;
    border-radius: 3px;
    background: #333;
}

/* Main content area */
.phone-content {
    overflow: auto;
    height: calc(100% - 40px); /* Adjust height to fit within the phone frame */
}

/* Profile content styling */
.profile-section {
    text-align: center;
    padding: 20px;
}

.profile-section img {
    width: 120px; /* Slightly larger profile picture */
    height: 120px; /* Maintain aspect ratio */
    border: 3px solid #ddd;
    margin-bottom: 10px;
}

.profile-section h1 {
    font-size: 26px; /* Slightly larger font size */
    margin-bottom: 10px;
}

.profile-section p {
    font-size: 18px; /* Slightly larger font size */
    color: #555;
}

/* Share buttons container */
.share-buttons {
    position: absolute;
    left: -120px; /* Move buttons outside the phone frame */
    top: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.share-buttons button {
    width: 100px;
    padding: 10px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.share-buttons button:hover {
    background-color: #0056b3;
}


    .body-wrapper {
        padding-left: 91px;}

.breadcumb {
    display:none;
    }


/* Responsive design for smaller screens */
@media (max-width: 767px) {
    
    .share-buttons {
      
        flex-direction: column !important;
        gap: 5px;
    }
    
    .body-wrapper {
    padding-left: 10px;
}
    .phone-frame {
        width: 300px;
        height: auto;
    }
    
    .phone-content {
        height: auto;
    }
    
    .profile-section img {
        width: 100px;
        height: 100px;
    }
    
    .profile-section h1 {
        font-size: 22px;
    }
    
    .profile-section p {
        font-size: 16px;
    }
    
    .share-buttons {
        left: 0;
        top: auto;
        bottom: 20px;
        flex-direction: row;
        gap: 5px;
    }
}

</style>

<div class="theframex body-wrapper">
    <div class="table-content">
        <div class="m-0">
            <div class="list-card">
                <form action="">
                    <div class="row search-dash justify-content-end mb-3">
                      
                    </div>
                </form>
                
                </br>
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <table class="custom-table">
                           
;                            </tbody>
                        </table>

                        <div class="body-wrapper">
                            
                          
                            
                            <div class="phone-frame" id="phoneFrame">
                                   <div>
                                
                                  <?php
                  
                            $username =  $_SESSION['username'];
                                 $profileUrl= "https://yardyadventures.com/demo/services";
                             //$email = $CurrentUserEmail;
                            
                            
                        

$encodedLink = $profileUrl; // URL encode the link
echo '<center>Share link';
echo '</br><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $encodedLink . '" alt="QR Code"/></center>';

                            
                            
                           ?>
                            </div>
                            
                                <div class="share-buttons">
                                    <button onclick="shareByPhone()">Phone</button>
                                    <button onclick="shareByEmail()">Email</button>
                                    <button onclick="printPage()">Print</button>
                                    <button onclick="shareByWhatsApp()">WhatsApp</button>
                                    <button onclick="takeScreenshot()">Screenshot</button>
                                </div>
                                <div class="phone-content">
                                    <!-- shareable profile section -->
                                    <div class="profile-section">
                                        <p>Profile section</p>
                                         <!---<p>Your email: <?php echo $CurrentUserEmail; ?></p>--->
                                        <p><?php echo $username;?></p>
                                        <p> <?php echo $summary; ?></p
                                        
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        @if($withdraws->hasPages())
                        <div class="text-end">
                            {{ $withdraws->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
const profileUrl = "{{ $profileUrl }}";
const email = "{{ $email }}";
const username = "{{ $username }}";
const summary = "{{ $summary }}";

function shareByPhone() {
    alert('Phone sharing functionality not implemented.');
    // Implement phone sharing functionality if needed
}

function shareByEmail() {
    const subject = 'Check out this profile';
    const body = `Check out this profile: ${profileUrl}\n\nEmail: ${email}\nUsername: ${username}\nSummary: ${summary}`;
    window.location.href = `mailto:${email}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
}

function printPage() {
    window.print();
}

function shareByWhatsApp() {
    const text = `Check out this profile: ${profileUrl}\n\nEmail: ${email}\nUsername: ${username}\nSummary: ${summary}`;
    window.open(`https://wa.me/?text=${encodeURIComponent(text)}`, '_blank');
}

function takeScreenshot() {
    html2canvas(document.getElementById('phoneFrame')).then(canvas => {
        const link = document.createElement('a');
        link.href = canvas.toDataURL('image/png');
        link.download = 'phone-frame-screenshot.png';
        link.click();
    });
}
</script>
@endpush
