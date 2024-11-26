    
        <!-- ==================== Footer Start ==================== -->
<footer class="footer-area pt-120">
    <div class="container">
        <div class="row justify-content-center g-5">
            <div class="col-xl-3 col-sm-6">
                <div class="footer-item">
                    <div class="footer-item__logo">
                        <a href="https://yardyadventures.com/test"> <img src="https://yardyadventures.com/demo/assets/images/general/logo_white.png" alt="InfluencerFly"></a>
                    </div>
                    <p class="footer-item__desc">
                                               Join us at Yardy Adventures to soak in the lush scenery and enjoy a variety of exciting activities tailored just for you.
                                            </p>
                   <!-- <ul class="social-list mt-3">
                                                <li class="social-list__item"><a href="https://www.twitter.com/" class="social-list__link"><i class="fa-brands fa-square-x-twitter"></i></a> </li>
                                                <li class="social-list__item"><a href="https://www.instagram.com/" class="social-list__link"><i class="fab fa-instagram"></i></a> </li>
                                                <li class="social-list__item"><a href="https://www.facebook.com/" class="social-list__link"><i class="fab fa-facebook-f"></i></a> </li>
                                            </ul>-->
                </div>
            </div>
            <div class="col-xl-2 col-sm-6">
                <div class="footer-item">
                    <h5 class="footer-item__title">Important Links</h5>
                    <ul class="footer-menu">
                                                    
                                                    <li class="footer-menu__item"><a href="https://yardyadventures.com/demo/services" class="footer-menu__link">Services </a></li>
                                                    <li class="footer-menu__item"><a href="https://yardyadventures.com/demo/adventures" class="footer-menu__link">Adventures </a></li>
                                                    <li class="footer-menu__item"><a href="https://yardyadventures.com/demo/reseller" class="footer-menu__link">Independent Sellers </a></li>
                                                    <li class="footer-menu__item"><a href="https://yardyadventures.com/demo/contact" class="footer-menu__link">Contact </a></li>
                                                    
                                            </ul>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6">
                <div class="footer-item">
                    <h5 class="footer-item__title">Company Links</h5>
                    <ul class="footer-menu">
                                                               <li class="footer-menu__item"><a href="https://yardyadventures.com/demo/terms" class="footer-menu__link">Terms of Service</a></li>
                                                <!--<li class="footer-menu__item"><a href="https://yardyadventures.com/demo/policy/privacy-policy/42" class="footer-menu__link">Privacy Policy</a></li>-->
                                                <!--<li class="footer-menu__item"><a href="https://yardyadventures.com/demo/cookie-policy" class="footer-menu__link">Cookie Policy</a></li>-->
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6">
                <div class="footer-item">
                    <h5 class="footer-item__title">Address</h5>
                    <ul class="footer-menu">
                        <li class="footer-menu__item"><a href="tel:8767811741">8767811741</a></li>
                        <li class="footer-menu__item"><a href="mailto:sales@yardyadventures.com">sales@yardyadventures.com</a></li>
                        <li class="footer-menu__item">
                            <a target="_blank" href="">Westmoreland, Jamaica</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="footer-item">
                    <h5 class="footer-item__title">Newsletter</h5>
                    <p class="mb-2">Subscribe our latest update</p>
                    <form action="https://yardyadventures.com/demo/subscribe" method="POST">
                        <input type="hidden" name="_token" value="X9EYpSxt8xj1Ml7G1z6GtIELZQVPnQQNmTQTd5Ln" autocomplete="off">                        <div class="form-group">
                            <input type="text" class="form--control" name="email" placeholder="Email">
                            <button><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>Copyright 2024. All rights reserved.</p>    </div>
</footer>
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

        <script>
   function addToWishlist(element) {

    "use strict"

        var isAddingToWishlist = false;
        var isLoggedIn = false;

        if (!isAddingToWishlist && isLoggedIn) {
            isAddingToWishlist = true;
            var propertyId = $(element).data('id');

            $.ajax({
                url: 'https://yardyadventures.com/demo/client/property-wishlist-add',
                type: 'get',
                data: {
                    propertyId: propertyId,
                },
                complete: function() {
                    isAddingToWishlist = false;
                },
                success: function(response) {
                    if (response.hasOwnProperty('message')) {
                        Toast.fire({
                            icon: 'success',
                            title: response.message
                        });
                        var heartIcon = $(element).find('i');
                        heartIcon.removeClass('far fa-heart').addClass('fas fa-heart');
                    } else {
                        Toast.fire({
                            icon: 'warning',
                            title: response.error
                        });
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = 'Error occurred while adding the item to the wishlist.';
                    Toast.fire({
                        icon: 'error',
                        title: errorMessage
                    });
                }
            });
        } else {
            var errorMessage = 'Please log in to add items to your wishlist and insure are you client?';
            Toast.fire({
                icon: 'warning',
                title: errorMessage
            });

            isAddingToWishlist = false;
        }
    }
</script>
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
</html>
