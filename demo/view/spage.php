
<?php
include 'home_header.php';

?>
         <!-- ==================== Breadcumb Start ==================== -->
<section class="breadcumb py-80">
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="content">
                <h2>Supa Page</h2>
                <p>
                    <a href="https://yardyadventures.com/test">Home</a> /
                    <a href="https://yardyadventures.com/demo/supa">Supa Page</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Breadcumb End ==================== -->


   
    
    
<style>
    .breadcumb {display:none;}
  
    
    
    img{ width: 80% !important;
        height: 490px !important;
        
        
    }
    
    
</style>

<style>



.footer-area {
    background-color: #EBF3EF!important;
    margin-top: auto!important;
    position: relative !important;
    overflow: hidden !important;
}

    .breadcrumb {display: none;}
    .ch{color:#216421 !important;}
    
    
    .aword{
            text-align: center;
    }
    
    
    .bk{
       background-color: #ffffff78;;  
       border-radius:77px;
       /* border: 1px solid transparent;*/
    }
    
    
    .carousel-item img {
        width: 100%;
        height: 490px;
        object-fit: cover;
        border-radius: 14px;
    }

    .about-section {
        background-color: #22564e;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

  /*  .attraction-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }*/
    
    .btn-primary {
    color: #fff;
    background-color: #cf8334;
    border-color: #c5cccb;
}
    
    
    .attraction-card img {
        width: 200px;
        height: 200px !important;
       
        border-radius: 8px;
    }
    
    
    

    @media (max-width: 768px) {
        .carousel-item img {
            height: 300px;
        }
        .attraction-card img {
            height: 150px;
        }
        
        
        .card{
        flex-direction: inherit;}
        
    }
</style>
<div style="padding:40px"></div>
<section class="blog py-80">
    <div class="container">
        <div class="row gy-4 justify-content-center mt-2">

            <!-- Carousel Section -->
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/frontend/blog/riverclimb.jpg" class="d-block w-100" alt="First Slide">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="bk"> <h5>Yardy River Adventure Tours</h5></div>
                            <!--<p class="ch">Yardy Tours and Cabaritta Expeditions are ecotourism companies in Williamsfield and Friendship Districts in Westmoreland, Jamaica. We offer a variety of activities including river tubing, horseback riding, and dune buggy riding.</p>-->
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/frontend/blog/riverrafting.jpg" class="d-block w-100" alt="Second Slide">
                        <div class="carousel-caption d-none d-md-block">
                              <div class="bk"> <h5>Yardy River Adventure Tours</h5></div> 
                            <!--<p>Experience the adventure of a lifetime with our river tubing and jungle expeditions.</p>--->
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/frontend/blog/marthariver.jpeg" class="d-block w-100" alt="Third Slide">
                        <div class="carousel-caption d-none d-md-block">
                              <div class="bk"><h5>Yardy River Adventure Tours</h5> </div>
                           <!-- <p>Relax by the river and enjoy the authentic Jamaican cuisine.</p>-->
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- About Section -->
            <div class="col-12 about-section">
                <!--<center><h4>About</h4></center>-->
                <p class="aword">Yardy Tours and Cabaritta Expeditions are ecotourism companies in Williamsfield and Friendship Districts in Westmoreland, Jamaica. We are a company that seeks to establish a low-impact, small-scale eco-friendly alternative to traditional mass tourism. We offer attractions such as river tubing, horseback and dune buggy riding. We also offer patois lessons so that visitors can become a certified Yardy! After enjoying the river, visitors can have a drink at our Rum Bar and learn to cook and then enjoy an authentic Jamaican meal!</p>
               <center> <p><strong>Duration:</strong> 2-3 hours</p>
               <!-- <a href="#" class="btn btn-primary">Learn More</a>---></center>
            </div>

            <!-- Nearby Attractions Section -->
            <div class="col-12">
                <h4>Top ways to experience nearby attractions</h4>
                <div class="row">
                <?php if(!empty($services) && $services != false){?>
                <?php foreach ($services as $service){?>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card attraction-card">
                            <img src="<?php echo $service['image_url']; ?>" alt="<?php echo $service['name'];?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $service['name'];?></h5>
                                <p class="card-text text-body"><?php echo "$ ".number_format($service['price'],2);?></p>
                                <a href="https://yardyadventures.com/demo/?route=home/product&id=<?php echo $service['id'];?>" class="btn btn-primary">BUY NOW</a>
                            </div>
                        </div>
                    </div>
                <?php }}?>                    
                </div>
            </div>

        </div>
    </div>
</section>
  
    
<?php include 'home_footer.php'; ?>
<!-- ==================== Footer End ==================== -->


    <!-- all js link -->
    <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://yardyadventures.com/demo/assets/common/js/jquery-3.7.1.min.js"></script>
<script src="https://yardyadventures.com/demo/assets/common/js/bootstrap.bundle.min.js"></script>

<script src="https://yardyadventures.com/demo/assets/presets/default/js/popper.min.js"></script>
<script src="https://yardyadventures.com/demo/assets/presets/default/js/slick.min.js"></script>
<script src="https://yardyadventures.com/demo/assets/presets/default/js/jquery.magnific-popup.min.js"></script>
<script src="https://yardyadventures.com/demo/assets/presets/default/js/odometer.min.js"></script>
<script src="https://yardyadventures.com/demo/assets/presets/default/js/viewport.jquery.js"></script>
<script src="https://yardyadventures.com/demo/assets/presets/default/js/smoothscroll.min.js"></script>
<script src="https://yardyadventures.com/demo/assets/presets/default/js/lightcase.js"></script>
<script src="https://yardyadventures.com/demo/assets/presets/default/js/datepicker.min.js"></script>
<script src="https://yardyadventures.com/demo/assets/presets/default/js/datepicker.en.js"></script>
<script src="https://yardyadventures.com/demo/assets/presets/default/js/wow.min.js"></script>
<script src="https://yardyadventures.com/demo/assets/admin/js/select2.min.js"></script>
<script src="https://yardyadventures.com/demo/assets/common/js/ckeditor.js"></script>
<script src="https://yardyadventures.com/demo/assets/presets/default/js/main.js"></script>

                <script src="https://yardyadventures.com/demo/assets/common/js/sweetalert2.min.js"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>




<script>
    (function ($) {
        "use strict";

        $(".langSel").on("change", function() {
            window.location.href = "https://yardyadventures.com/demo/change/"+$(this).val() ;
        });

        $('.policy').on('click',function(){
            $.get('https://yardyadventures.com/demo/cookie/accept', function(response){
                $('.cookies-card').addClass('d-none');
            });
        });

        setTimeout(function(){
            $('.cookies-card').removeClass('hide')
        },2000);

    })(jQuery);
</script>

</body>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'},{'ap':'cpsh-oh'},{'server':'p3plzcpnl506098'},{'dcenter':'p3'},{'cp_id':'9984899'},{'cp_cl':'8'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='https://img1.wsimg.com/traffic-assets/js/tccl.min.js'></script></html>
