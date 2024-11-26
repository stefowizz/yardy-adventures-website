<?php
class CheckoutController extends Controller{


    public function cart(){
        header("Content-Type: application/json; charset=UTF-8");
        $services = [];

        if(!empty($_POST['product_name'])){
            $services['name'] = htmlspecialchars($_POST['product_name']);
        } 
        if(!empty($_POST['product_price'])){
            $services['price'] = htmlspecialchars($_POST['product_price']);
        } 
        if(!empty($_POST['date'])){
            $services['date'] = htmlspecialchars($_POST['date']);
        }
        if(!empty($_POST['time'])){
            $services['time'] = htmlspecialchars($_POST['time']);
        } 
        if(!empty($this->session->get('affiliate'))){
            $services['affiliate'] = $this->session->get('affiliate');
        }
        if($this->model->put('orders', $services)){
            $services['id'] = $this->model->getID();
        }else{
            $response['error'] = "failure setting appointment";
            die(json_encode($response)); 
        }
        
        if(!empty($_POST['product_image'])){
            $services['image_url'] = htmlspecialchars($_POST['product_image']);
        }             
        
        $this->setkey("service",$services);
        $location['redirect'] = BASE_URL_SSL."checkout";
        echo json_encode($location);
        
    } 
    
    public function checkout(){
        $service = $this->session->get('service');
        View::assign('service', $service);
        View::render('checkout/fac_checkout');
    }
    
    public function update_order(){
        $service = $this->session->get('service');
        if(!empty($_POST['id'])){
            $transaction["id"] = $service['id'];
        }
        if(!empty($_POST['address'])){
            $transaction["billing_address"] = htmlspecialchars($_POST['address']);
        }
        if(!empty($_POST['address2'])){
            $transaction["billing_address_2"] = htmlspecialchars($_POST['address2']);
        }
        if(!empty($_POST['city'])){
            $transaction["billing_city"] = htmlspecialchars($_POST['city']);
        }
        if(!empty($_POST['country'])){
            $transaction["billing_country"] = htmlspecialchars($_POST['country']);
        }
        if(!empty($_POST['state'])){
            $transaction["billing_state"] = htmlspecialchars($_POST['state']);
        }
        if(!empty($_POST['zip'])){
            $transaction["billing_zip"] = htmlspecialchars($_POST['zip']);
        }
        if(!empty($_POST['firstName'])){
            $transaction["fname"] = htmlspecialchars($_POST['firstName']);
        }
        if(!empty($_POST['lastName'])){
            $transaction["lname"] = htmlspecialchars($_POST['lastName']);
        }
        if(!empty($_POST['phone'])){
            $transaction["telephone"] = htmlspecialchars($_POST['phone']);
        }
        if(!empty($_POST['mobile'])){
            $transaction["mobile"] = htmlspecialchars($_POST['mobile']);
        }            
        if(!empty($_POST['email'])){
            $transaction["email"] = htmlspecialchars($_POST['email']);
        }            
            
        $this->model->updateOrder('orders', $service['id'], $transaction);
            
        
    }
    

}