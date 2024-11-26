<?php require(VIEWS."home_header.php"); 

if(!empty($service) && $service != false){
?>


<style>

 .footer-area {
    background-color: #EBF3EF!important;
    margin-top: auto!important;
    position: relative !important;
    overflow: hidden !important;
}


</style>



    <div style="padding:40px;"></div>
    <br />
    <!-- Product section-->
<form id="checkout" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $service['id']?>" />
    <input type="hidden" name="product_name" value="<?php echo $service['name']?>" />
    <input type="hidden" name="product_price" value="<?php echo $service['price']?>" />
    <input type="hidden" name="product_image" value="<?php echo $service['image_url']?>" />
    <section class="py-2">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $service['image_url']?>" alt="<?php echo $service['name']?>" /></div>
                <div class="col-md-6">
                    <div class="small mb-1"><i>Yardy River Adventures and Tours</i></div>
                    <h1 class="display-5 fw-bolder"><?php echo $service['name']?></h1>
                    <div class="fs-5 mb-5">
                        <span style="display-3"><?php echo "$ ".number_format($service['price'],2)." USD"?></span>
                        <p><span style="display-4"><?php echo "$ ".number_format($service['price_child'],2)." USD"?></span> for children</p>
                        <p class="lead"><?php echo $service['description']?></p>
                    </div>
                    <p class="lead">
                        <h4>Schedule your Adventure Now!</h4>
                        <label>Date:</label>
                        <input type="date" name="date" class="form-control onchange" />
                        <br />
                        <label>Time:</label>
                        <input type="time" name="time" class="form-control onchange" />
                    </p>
                    <br />
                    <div class="d-flex">
                        <button id="submit" class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Schedule Adventure
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<script>
    $(document).ready(function () { 
        $('#checkout').submit(function (e) { 
            e.preventDefault(); 
            var formData = $(this).serialize(); 
            
            $.ajax({ 
                url: 'index.php?route=Checkout/cart', 
                type: 'POST', 
                data: formData, 
                success: function (response) { 
                    let redirect = response.redirect;
                    let error = response.error;
                    
                    if(error){
                        alert(error);
                        
                    }else if(redirect){
                        location.assign(redirect);
                    }
                }, 
                error: function (jqXHR, textStatus, errorThrown) { 
                    alert(errorThrown); 
                } 
            }); 
        }); 
        
    }); 
</script>
<?php
}
require(VIEWS."home_footer.php");
?>