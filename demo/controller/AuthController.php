<?php
class AuthController extends Controller{
    
    private $user = [];

    private $details = [];

    public $username, $password;
    
    public function index(){
        
        if($this->isLoggedin()){
            
            header('location:'.BASE_URL_SSL.'?route=dashboard');

        }else{
            View::render('Auth/login');
        }

    }

    public function login(){
        
        if($this->isLoggedin()){
            
            header('location:'.BASE_URL_SSL.'dashboard');

        }else{
            View::render('Auth/login');
        }

    }
        
    public function setup(){
        View::render('Auth/quickstart');
    }   
    
    public function register(){
        View::render('Auth/register');
    }
    
    public function forgetpassword(){
        return View::render('Auth/forgetpassword');
    }
    
    public function processLogin(){
        header("Content-Type: application/json; charset=UTF-8");

        if(isset($_POST['password']) && isset($_POST['username'])){

            //check if login details are correct
            $checkUserLogin = $this->model->checkUserLogin(htmlspecialchars($_POST['username']),$_POST['password']);

            if(isset($checkUserLogin['id'])){
                //save information into sessions, you can find session functions in System/classes/Controller.php
                $this->setkey('userid',$checkUserLogin['id']);
                $this->setkey('username', $checkUserLogin["username"]);
                $this->setkey('fname', $checkUserLogin["fname"]);
                $this->setkey('access', $checkUserLogin["access"]);
                
                $response = [
                    'message'=> 'success',
                    'redirect'=> BASE_URL_SSL.'?route=dashboard/'
                ];
                echo json_encode($response);
                
                
            }else{
                     $response = [
                    'message'=> 'failed',
                    'redirect'=> BASE_URL_SSL.'login'
                    ];
                    echo json_encode($response);
            } 
        }
    }

    public function processRegister(){
        header("Content-Type: application/json; charset=UTF-8");
        if($this->model->checkUserEmail($_POST['InputEmail'])){
            $response = [
                'message'=>'failed, account already exist please login',
                'redirect'=>BASE_URL_SSL.'login'
                ];            
            echo json_encode($response);
            return false;            
        }

        if(isset($_POST['InputConfirmPassword']) && isset($_POST['InputPassword']) && $_POST['InputConfirmPassword'] == $_POST['InputPassword']){
            //user login details

            
            $this->user['email'] = htmlspecialchars($_POST['InputEmail']);
            $this->user['username'] = htmlspecialchars($_POST['InputUsername']);
            $this->user['password'] = $this->model->secure($_POST['InputPassword']);
            $this->user['phone'] = htmlspecialchars($_POST['InputPhone']);
            if(empty($_POST['Inputaccess']) || !isset($_POST['Inputaccess'])){
                $this->user['access'] = $this->model->access['Users'];
            }else{
                $this->user['access'] = $this->model->access[$_POST['Inputaccess']]; 
            }
            $this->user['fname'] = htmlspecialchars($_POST['Inputfname']);
            $this->user['lname'] = htmlspecialchars($_POST['Inputlname']);
            
            
            if($this->model->userRegister('users',$this->user)){
                
                $this->setkey('userid',$this->model->getid());
                $this->setkey('username',$this->user['username']);
                
                $response = [
                    'message'=>'success, account has been created',
                    'redirect'=>BASE_URL_SSL
                    ];            
                echo json_encode($response);
                return false;                 
            }
        }else{
            $response = [
                'message'=>'FAILED: Ensure Password Matches, try again',
                'redirect'=>BASE_URL_SSL
                ];
            echo json_encode($response);
            return false;               
        }

            
    }
    public function abbreviate($string){
        $abbreviation = "";
        $string = ucwords($string);
        $words = explode(" ", "$string");
          foreach($words as $word){
              $abbreviation .= $word[0];
          }
       return $abbreviation; 
    }
    
    public function logout(){
        $this->session->destroy();
        echo '<script>window.location.href = "'.BASE_URL_SSL.'" </script>';
     
            
         header("content",BASE_URL_SSL);
        
    }
    
    
}