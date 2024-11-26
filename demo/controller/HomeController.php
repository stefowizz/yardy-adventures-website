<?php
class HomeController extends Controller{
    
    public function index(){
        if($this->isLoggedin()){
            if(isset($_REQUEST['affiliate']) || !empty($_REQUEST['affiliate'])){
                $this->session->set('affiliate',$_REQUEST['affiliate']);
            }
            View::assign('user',true);
            
        }else{
            View::assign('user',false);
        }
        
        View::render('home');
    }
    public function services(){
        
        if($this->isLoggedin()){
            if(isset($_REQUEST['affiliate']) || !empty($_REQUEST['affiliate'])){
                $this->session->set('affiliate',$_REQUEST['affiliate']);
            }
            View::assign('user',true);
        }else{
            View::assign('user',false);
        }  
       if($resources = $this->model->getServices()){
           View::assign('services',$resources);
       }     
 
        View::render('spage');        
        
    }
    public function adventures(){
        
        if($this->isLoggedin()){
            if(isset($_REQUEST['affiliate']) || !empty($_REQUEST['affiliate'])){
                $this->session->set('affiliate',$_REQUEST['affiliate']);
            }
            View::assign('user',true);
        }else{
            View::assign('user',false);
        }  
       if($resources = $this->model->getServices()){
           View::assign('services',$resources);
       }     
 
        View::render('adventure');        
        
    }
    public function product($productID=null){
        if($this->isLoggedin()){
            View::assign('user',true);
        }else{
            View::assign('user',false);
        } 
         if(isset($_REQUEST['affiliate']) || !empty($_REQUEST['affiliate'])){
            $this->session->set('affiliate',$_REQUEST['affiliate']);
        }
        if($productID === null){
           $productID = $_REQUEST['id'];
        }   
        if($resource = $this->model->getService($productID)){
            View::assign('service',$resource);
        }else{
            View::assign('service',false);
        }

        View::render('checkout/service');            
         
        
    }   

    public function send_mail(){
        header("Content-Type: application/json; charset=UTF-8");
        $array = [
            'name' => htmlspecialchars($_POST['Name']),
            'email' => htmlspecialchars($_POST['Email']),
            'subject' => htmlspecialchars($_POST['Subject']),
            'message' => htmlspecialchars($_POST['Comment']),
            ];

        
        if($this->model->put($array,'messages')){
            $response = [
                'message' => 'Message Sent',
                ];
        }else{
            $response = [
                'message' => 'Error: Message not Sent, contact admin',
                ];
        }

        echo json_encode($response);
        
    }
    
    
    
    
}



?>