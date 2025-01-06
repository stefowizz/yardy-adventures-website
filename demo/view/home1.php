
<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<?php
require "home_header.php"; ?>

<?php
//  $base_url = "/yardy-website/demo/";
//    $base_url = "https://yardyadventures.com/demo";
    $img_url = $base_url . "/assets/images/frontend/home/";
?>
<style>
html {
  font-size: 14px;
}

@media (min-width: 768px) {
  html {
    font-size: 16px;
  }
}

.horse{
    
}

.gallery {
    display: flex;
    padding: 20px; 
    width: 100%;
    justify-content:center;
    gap: 10px;
}

.gallery2 {
    display: flex;
    padding: 20px;
    width: 100%;
    justify-content: center;
    gap: 70px; 
}


.btnpr{
    display:flex; 
    justify-content: space-between;
}


.stillphotos {
    border: 1px solid #c3c3c3;
    justify-content:center;
    padding:40px;
}

f
* {
    box-sizing: border-box;
}

body {
    font-family: Verdana, sans-serif;
}

.mySlides {
    display: none;
    align-content:center; 
}

img {
    vertical-align: middle;
}

/* Slideshow container */
.slideshow-container {
    max-width: 1000px;
    position: relative center;
    justify-content:center;
    
}

/* Caption text */
.text {
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 12px 12px;
    position: absolute;
    top: 0;
    align-content: center;
}

/* The dots/bullets/indicators */
.dot {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}

.active {
    background-color: #717171;
}

/* Fading animation */
.fade {
    animation-name: fade;
    animation-duration: 1.5s;
}

@keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
    .text {
        font-size: 11px
    }
}









.btn:focus, .btn:active:focus, .btn-link.nav-link:focus, .form-control:focus, .form-check-input:focus {
    box-shadow: 0 0 0 0.1rem white, 0 0 0 0.25rem #258cfb;
}

html {
  position: relative;
  min-height: 100%;
}

body {
  margin-bottom: 60px; 
}
</style>



<h1>Services</h1>

<section>

    <div class="slideshow-container"> 

        <h1>explore your wild side!</h1> 

        <div class="mySlides fade">

            <a class="nav-link text-dark" asp-area="" asp-controller="Home" asp-action="Adventure">
                <div class="btnpr">
                    <<?php echo $img_url?>img src="<?php echo $img_url?>Yardy River Tubing.jpeg" width="400px" height="500px"> <br /> 
                    <h1 class="book" style="color:#28B9F5">Book Now</h1>
                </div>
            </a>
            <div>
                <h1 style="color:#427A27">Yardy River Tubing</h1><br />
                <div class="numbertext2">
                    <h3>1 / 5</h3>
                </div>
            </div>
        </div>


        <div class="mySlides fade">

            <a class="nav-link text-dark" asp-area="" asp-controller="Home" asp-action="Adventure">
                <div class="btnpr">
                    <img src="<?php echo $img_url?>Yardy River Walk.jpeg" width="400px" height="500px">
                    <h1 class="book" style="color:#28B9F5">Book Now</h1>
                </div> 
            </a>
            <div>
                <h1 style="color:#427A27">Yardy River Walk</h1><br />
                <div class="numbertext2">
                    <h3>2 / 5</h3>
                </div>
            </div>
        </div>

        <div class="mySlides fade">

            <a class="nav-link text-dark" asp-area="" asp-controller="Home" asp-action="Adventure">
                <div class="btnpr">
                    <img src="<?php echo $img_url?>Yardy Park Life.jpeg" width="400px" height="500px">
                    <h1 class="book" style="color:#28B9F5">Book Now</h1>
                </div>
            </a>
            <div>
                <h1 style="color:#427A27">Yardy Park Life</h1><br />
                <div class="numbertext2">
                    <h3>3 / 5</h3>
                </div>
            </div>
        </div>

        <div class="mySlides fade">

            <a class="nav-link text-dark" asp-area="" asp-controller="Home" asp-action="Adventure">
                <div class="btnpr">
                    <img src="<?php echo $img_url?>Yardy Horseback Riding.jpeg" width="400px" height="500px">
                    <h1 class="book" style="color:#28B9F5">Book Now</h1>
                </div>
            </a>
            <div>
                <h1 style="color:#427A27">Yardy Horseback Riding</h1><br />
                <div class="numbertext2">
                    <h3>4 / 5</h3>
                </div>
            </div>
        </div>


        <div class="mySlides fade">

            <a class="nav-link text-dark" asp-area="" asp-controller="Home" asp-action="Adventure">
                <div class="btnpr">
                    <img src="<?php echo $img_url?>Breezy Hill ATV Dune Buggy.jpeg" width="630px" height="500px">
                    <h1 class="book" style="color:#28B9F5">Book Now</h1>
                </div>
            </a>
            <div>
                <h1 style="color:#427A27">Breezy Hill ATV Dune Buggy</h1><br />
                <div class="numbertext2">
                    <h3>5 / 5</h3>
                </div>
            </div>
        </div>

        <br>
        <h1>Yardy River Adventures </h1>

        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        
    </div> 

     

</section>

<br />
<br />
<br />
<br /> 
<br />
<br />
<br />
<br />
<br />
<br />

<section>

    <p>
        Adventures in harmony with nature, <br> 
        culture and communities.  Choose your <br />
        vibe!
    </p>

    <p>
        
        <ul>
            <li>easy going to intense</li>
            <li>
                explore on your own, as a family <br />
                or with friends
            </li> 
            <li>
                a quick 2-hour, half day or <br /> day-long adventure
            </li> 
            <li>
                discover the natural wonders of <br />
                the park or ascend to the hills for <br />
                breathtaking panoramic views.
            </li> 
 
        </ul>  
    </p> 

</section>  


<section class="stillphotos">

    <div class="gallery"> 
        <div class="photogallery">

            <img src="<?php echo $img_url?>Confluence - Natures Jacuzzi.jpeg" width="400px" height="500px"> <br /> <br />
            <h1>Confluence - Natures Jacuzzi</h1>

        </div>

        <div class="photogallery">

            <img src="<?php echo $img_url?>Food - Curried Ackee.jpeg" width="400px" height="500px"> <br /><br />
            <h1>Food - Curried Ackee</h1> 

        </div>
    </div>

    <div class="gallery2"> 
        <div class="photogallery">

            <img src="<?php echo $img_url?>Roaring River .jpeg" width="400px" height="500px"> <br /><br />
            <h1>Roaring River</h1>

        </div>

        <div class="photogallery">

            <img src="<?php echo $img_url?>Rustic Scenery - Garden Bed  2.jpeg" width="400px" height="500px"> <br /><br />
            <h1>Rustic Scenery - Garden Bed  2</h1>   

        </div>
    </div>

    <div class="gallery">
        
        <div class="photogallery">
            <video height="600px" width="800px" controls>
                <source src="<?php echo $img_url?>Horseback Riding.mp4" />
            </video>
        </div> 

    </div>

</section> 


<section>

    <div style="text-align:center">

        <h3>Jamaica’s Best <br /> Eco-Tourist Attraction</h3>
        <p>
            Rustic, tranquil and unscathed<br />
            landscapes set the stage for boundary<br />
            less experiences in the park and the<br />
            surrounding communities of the once<br />
            booming sugar cane belt, hillside farms<br />
            and modern technology driven farms.
        </p>
        <br />
        <br />
        <p>
            Indulge in the Jamaica’s<br />
            culture, history and out of many one<br />
            infused cuisine on the riverbed’s of our<br />
            limestone purified rushing waters from<br />
            the Roaring River that flows into the<br />
            stiller and relaxing Cabaritta awaits you.
        </p>
        <br />
        <br />
        <p>
            Completely Off The Beaten Track…
        </p>
        <br /><br />
        <p>
            Yardy River Adventures is a Unique<br />
            Lush Rustic Paradise
        </p>



        <p></p> 
    </div>

</section> 
<script>

let slideIndex = 0;
showSlides();

function showSlides() {

    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    for (i = 0; i < slides.length; i++) {

        slides[i].style.display = "none";

    }

    slideIndex++;

    if (slideIndex > slides.length) {

        slideIndex = 1

    }

    for (i = 0; i < dots.length; i++) {

        dots[i].className = dots[i].className.replace(" active", "");

    }

    slides[slideIndex - 1].style.display = "block";

    dots[slideIndex - 1].className += " active";

    setTimeout(showSlides, 3000); // Change image every 3 seconds
} 

</script>


<?php require"home_footer.php";?>
     
