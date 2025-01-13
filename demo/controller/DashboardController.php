<?php
class DashboardController extends Controller
{
    
    
    public function index()
    {
        if($this->isLoggedin()) {
            $data = $this->model->currentUser($this->get('userid'));
            if(isset($data) && intval($data['access']) < 2) {
                View::assign('users', $this->count('users'));
                View::assign("header", "Home");  
                View::assign("data", $data);
                View::assign('CurrentUser', $this->get('fname'));
                View::assign('uname', $this->get('username'));
                View::render('Dashboard/dashboard');                
            }else{
                if($affiliate = $this->model->currentAffiliate($this->get('userid'))) {
                    if(empty($affiliate['affiliate_code'])) {
                        $code = $this->model->getRandomString();
                        View::assign("code", $code);
                    }else{
                        $code = $affiliate['affiliate_code'];
                        View::assign("code", $code);
                    }
                    if(empty($affiliate['unique_link'])) {
                        $unique_link = BASE_URL.SSL.'?route=home/services&affiliate='.$code;
                        View::assign("unique_link", $unique_link);
                    }else{
                        $unique_link = $affiliate['unique_link'];
                        View::assign("unique_link", $unique_link);
                    }
                    View::assign("affiliate", $affiliate);
                    
                    if($aF_Transactions = $this->model->getAffiliateOrders($affiliate['affiliate_code'])) {
                        View::assign("transactions", $aF_Transactions);
                    }
                }
                if($currentuser = $this->model->currentUser($this->get('userid'))) {
                    View::assign('CurrentUser', $currentuser);
                }
                View::assign("header", "Affliate - Home");
                View::render('Influencer/userprofile');
            }

        }else{
            View::render('Auth/login');
            
        }
    }

    public function main(){
        if($this->isLoggedIn()){
            $userData = $this->model->currentUser($this->get("userid"));
            $affilateData = $this->model->currentAffiliate($this->get("userid"));
            $code = $this->model->getRandomString(); //random code, if one isn't already present

            $users = $this->model->getUsers();

            View::assign("userData", $userData);
            View::assign("affiliateData", $affilateData);
            View::assign("code", $code);

            View::assign("users", $users);

            View::render("Dashboard/main");
        }else{
            header("Location: /login");
        }
    }
    public function paymentGateway()
    {
        if($this->isLoggedin()) {
            $settings = $this->model->getFacSettings();
            if(!empty($settings) || isset($settings)) {
                View::assign("settings", $settings);
            }
            $transactions = $this->model->getFacPayments();
            if(!empty($transactions) || isset($transactions)) {
                View::assign("transactions", $transactions);
            }
            View::assign("header", "Payment Gateway");  
            View::assign("currency", $this->getCurrency("JMD"));
            View::render('Dashboard/payment-gateway/FirstAtlanticCommerce/FirstAtlanticCommerce_settings');
        }else{
            View::render('Auth/login');
            
        }

    }  
    private function getBillingToCountry($code)
    {
        $countries = file_get_contents(ASSETS . 'countries.json');
        $countries = json_decode($countries, true);
        return isset($countries[$code]) ? $countries[$code] : null;
    }
    private function getCurrency($code)
    {
        $currencies = file_get_contents(ASSETS . 'currencies.json');
        $currencies = json_decode($currencies, true);
        return isset($currencies[$code]) ? $currencies[$code] : null;
    }
    public function order()
    {
        if($this->isLoggedin()) {
            View::assign("header", "Orders");  
        
            $data = $this->model->orders();
            if(!empty($data) || isset($data)) {
                View::assign("data", $data);
            }
            View::render('Dashboard/order');
        }else{
            View::render('Auth/login');
        }  
    }
    public function services()
    {
        if($this->isLoggedin()) {
            View::assign("header", "Services");  
            $data = $this->model->getContents();
            if(!empty($data) || isset($data)) {
                View::assign("data", $data);
            }
            View::render('Dashboard/services/service-list');
        }else{
            View::render('Auth/login');
        }        
    }
    public function addContents()
    {
        
        if($this->isLoggedin()) {
            View::assign("header", "Add New Service");  
            View::render('Dashboard/services/service-input');            
        }else{
            View::render('Auth/login');
        }   

    }
    public function contentUpdates()
    {
        if($this->isLoggedin()) {
            if(isset($_REQUEST['id']) || !empty($_REQUEST['id'])) {
                    $data = $this->model->getContent($_REQUEST['id']);
                    View::assign("header", "Update Service");  
                    View::assign("data", $data);
                    View::assign("id", $_REQUEST['id']);
            }
            View::render('Dashboard/services/service-update');            
        }else{
            View::render('Auth/login');
        }
    }   
    public function updateContent()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $error = "";
        $target_dir = MAINPATH."public/uploads/content/";
        $file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fakename = $_FILES["fileToUpload"]["tmp_name"];
        $fileformat = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $fileSize = $_FILES["fileToUpload"]["size"];
        
        
        if(!empty($_POST['id'])) {
            $content_id = $_POST['id'];
        }        
        
        if(!empty($_POST['name'])) {
            $array['name'] = htmlspecialchars($_POST['name']);
        }
        if(!empty($_POST['price'])) {
            $array['price'] = number_format($_POST['price'], 2);
        }
        if(!empty($_POST['description'])) {
            $array['description'] = htmlspecialchars($_POST['description']);
        }  
        if(!empty(basename($_FILES["fileToUpload"]["name"]))) {
            $array['image_url'] = BASE_URL_SSL."public/uploads/content/". basename($_FILES["fileToUpload"]["name"]);
        } 
        
        
        if($this->model->checkFileExist($file)) {
            $continue = true;
        }else{
            $error .= " - File Already Exist";  
        }
        if($this->model->checkFileSize($fileSize)) {
            $continue = true;
        }else{
            $error .= " - Incorrect File Size";  
            
        }
        if($this->model->checkFileType($fileformat)) {
            $continue = true;
        }else{
            $error .= " - File Type Not Supported, try these jpg, png, jpeg";  
           
        }
        if($this->model->fileUpload($file, $fakename)) {
            $uploadSuccess =  " - File Upload successful";                 
        }else{
            $response = [
                "message" => "File Upload Failed".$error,
                "redirect" => BASE_URL_SSL."?route=dashboard/addContents",
                ];  
            
        }
        if(isset($content_id)) {
            if($this->model->edit('services', $array,  $content_id)) {
                $response = [
                    "message" => "Content Updated:".$uploadSuccess,
                    "redirect" => BASE_URL_SSL."?route=dashboard/contents",
                    ];                
            }                
        }
         echo json_encode($response);

    }
    public function processContent()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $error = "";
        $target_dir = MAINPATH."public/uploads/content/";
        $file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fakename = $_FILES["fileToUpload"]["tmp_name"];
        $fileformat = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $fileSize = $_FILES["fileToUpload"]["size"];

        
        $array = [
        "name" => htmlspecialchars($_POST['name']),
        "description" =>htmlspecialchars($_POST['description']),
        "price"=> number_format($_POST['price'], 2),
        ];
        
        if(!file_exists($file)) {
            $array["image_url"] = BASE_URL_SSL."public/uploads/content/". basename($_FILES["fileToUpload"]["name"]);
        }
        
        if(file_exists($file)) {
            $continue = true;
        }else{
            $error .= " - File Already Exist";  
        }
        if($this->model->checkFileSize($fileSize)) {
            $continue = true;
        }else{
            $error .= " - Failed: Incorrect File Size";  
            
        }
        if($this->model->checkFileType($fileformat)) {
            $continue = true;
        }else{
            $error .= "Failed: File Type Not Supported, try these jpg, png, jpeg";  
           
        }
        if($this->model->fileUpload($file, $fakename)) {
            if($this->model->put("services", $array)) {
                $response = [
                    "message" => "Service was added successfully",
                    "redirect" => BASE_URL_SSL."?route=dashboard/contents",
                    ];             
            }                
        }else{
            $response = [
                "message" => "Service Upload Failed".$error,
                "redirect" => BASE_URL_SSL."?route=dashboard/addContents",
                ];  
        }

         echo json_encode($response);
        
    }
    
    public function users()
    {
        if($this->isLoggedin()) {
            $data = $this->model->getUsers();
            View::assign("header", "Users");  
            View::assign("data", $data);
            View::render('Dashboard/users');
        } else{
            View::render('Auth/login');
        }      
    }

    public function Addusers()
    {
        if($this->isLoggedin()) {
            View::assign("header", "Update");  
            View::render('Dashboard/user-input');
        } else{
            View::render('Auth/login');
        }     
    }

    public function updateProfileAddress()
    {
        $addressJSON = array();

        if(!empty($_POST['street1'])) {
            $addressJSON["street1"] = $_POST['street1'];
        }
        if(!empty($_POST['street2'])) {
            $addressJSON["street2"] = $_POST['street2'];
        }
        if(!empty($_POST['country'])) {
            $addressJSON["country"] = $_POST['country'];
        }
        if(!empty($_POST['region'])) {
            $addressJSON["region"] = $_POST['region'];
        }

        $address = array(
            'id' => $this->get('userid'),
            'address'=>json_encode($addressJSON)
        );


        $values = array(
            'address' => json_encode($addressJSON)
        );


        $this->model->edit("users", $values, $this->get("userid"));
    }

    public function updateProfileInfo()
    {
        $userData = array();

        if(!empty($_POST['fname'])) {
            $userData["fname"] = $_POST['fname'];
        }
        if(!empty($_POST['lname'])) {
            $userData["lname"] = $_POST['lname'];
        }
        if(!empty($_POST['email'])) {
            $userData["email"] = $_POST['email'];
        }
        if(!empty($_POST['phone'])) {
            $userData["phone"] = $_POST['phone'];
        }
        if(!empty($_POST['bio'])) {
            $userData["bio"] = $_POST['bio'];
        }

        $values = array(
            "fname" => $userData["fname"],
            "lname" => $userData["lname"],
            "email" => $userData["email"],
            "phone" => $userData["phone"],
        );

        //TODO: Obv. Add bio to database
    
        $this->model->edit("users", $values, $this->get("userid"));
    }
    
    public function updateAffiliate()
    {
        //address 
        if(!empty($_POST['street'])) {
            $addressJSON["street"] = $_POST['street'];
        }
        if(!empty($_POST['city'])) {
            $addressJSON["city"] = $_POST['city'];
        }  
        if(!empty($_POST['state'])) {
            $addressJSON["state"] = $_POST['state'];
        }
        
        $address = [
            'id' => $this->get('userid'),
            'address'=>json_encode($addressJSON)
            ];
        
        //bankaccount
        
        if(!empty($_POST['account'])) {
            $accountJSON['account']= $_POST['account'];
        }
        if(!empty($_POST['name'])) {
            $accountJSON['name']=$_POST['name'];
        }
        if(!empty($_POST['type'])) {
            $accountJSON['type']=$_POST['type'];
        }
        if(!empty($_POST['branch'])) {
            $accountJSON['branch']=$_POST['branch'];
        }   
        $code = $this->model->getRandomString();
        $unique_link = BASE_URL_SSL.'?route=home/services&affiliate='.$code;
        
    
        $account = [
            "user_id" => $this->get('userid'),
            "affiliate_code" => $code,
            //"unique_link" =>$unique_link,
            "bank_details" => json_encode($accountJSON)
        ];
        if(!empty($_POST['id'])) {
            $account['id']=$_POST['id'];
        }          
        
        

        if($this->model->put('affiliates', $account)) {
            $response = ['message' =>" Bank Account Added "];
        }
        if($this->model->put('users', $address)) {
            $response = ['address' =>" Address Added"];
        }
        
        echo json_encode($response);
    }
    
    
    public function share2()
    {
        if($this->isLoggedin()) {
           
            View::render('Dashboard/share2');
        } else{
            View::render('Dashboard/share2');
        }      
    }
    


    public function contentDelete()
    {
        
        if($this->model->delete_content("content", $_REQUEST['id'])) {
            $response = [
                "message" => "File Deleted",
                "redirect" => BASE_URL_SSL."?route=dashboard/contents",
                ];             
        }
        echo json_encode($response);
        
    }
    public function feedback()
    {
        if($this->isLoggedin()) {
            if($data=$this->model->getmessages()) {
                View::assign('data', $data);
                View::assign("header", "Feedback");
            }else{
                View::assign('data', null);
            }
                        
            
            View::render('Dashboard/feedback');
        } else{
            View::render('Auth/login');
        }        
    }

    // public function uploads(){
    //     if($this->isLoggedin()){
            
            
    //         View::render('Dashboard/uploads');
    //     } else{
    //         View::render('Auth/login');
    //     }      
    // }
    // public function collaboration(){
    //     if($this->isLoggedin()){
    //         if($data=$this->model->getcollab()){
    //             View::assign('data',$data);
    //         }else{
    //             View::assign('data',null);
    //         }
                        
            
    //         View::render('Dashboard/collaboration');
    //     } else{
    //         View::render('Auth/login');
    //     }      
    // }
    // public function attendance(){
    //     if($this->isLoggedin()){
    //         if($data=$this->model->getSessionUsers()){
    //             View::assign('data',$data);
    //         }else{
    //             View::assign('data',null);
    //         }
                        
            
    //         View::render('Dashboard/session-attendance');
    //     } else{
    //         View::render('Auth/login');
    //     }      
    // }    
    
    // public function collabresources(){
    //     if($this->isLoggedin()){
    //         if($data=$this->model->getCourseware()){
    //             View::assign("data",$data);
    //         }else{
    //             View::assign("data",null);
    //         }           
            
    //         View::render('Dashboard/collab-resources');
    //     } else{
    //         View::render('Auth/login');
    //     }      
    // }
    // public function collabsessions(){
    //     if($this->isLoggedin()){
    //         if($data=$this->model->getcollab){
    //             View::assign('data',$data);
    //         }else{
    //             View::assign('data',null);
    //         }
            
    //         View::render('Dashboard/collab-sessions');
    //     } else{
    //         View::render('Auth/login');
    //     }      
    // }
    
    // public function processCollabSessions(){
    //     header("Content-Type: application/json; charset=UTF-8");
    //     $array =[
    //         'name'=>htmlspecialchars($_POST['Inputname']),
    //         'date'=>htmlspecialchars($_POST['Inputdate']),
    //         'details'=>htmlspecialchars($_POST['Inputdetails']),
    //         'link'=>htmlspecialchars($_POST['Inputlink']),
    //         ];

    //     if($this->model->put($array,"sessions")){
    //             $response = [
    //                 "message" => "Collaboration successfully set",
    //                 "redirect" => BASE_URL_SSL."?route=dashboard/contents",
    //                 ];             
    //         }  
    //     echo json_encode($response);
    // }
    
    // public function resources(){
    //     if($this->isLoggedin()){
    //         if($data=$this->model->getResources()){
    //             View::assign("data",$data);
    //         }else{
    //             View::assign("data",null);
    //         }
    //         View::render('Dashboard/resources-list');
    //     } else{
    //         View::render('Auth/login');
    //     }      
    // }


    // public function newSession(){
    //     if($this->isLoggedin()){
    //         View::render('Dashboard/collaboration-input');
    //     } else{
    //         View::render('Auth/login');
    //     }      
    // }
    // public function newCourseware(){
    //     if($this->isLoggedin()){
    //         View::render('Dashboard/collab-resources-input');
    //     } else{
    //         View::render('Auth/login');
    //     }      
    // }
    // public function processCourseware(){
    //     header("Content-Type: application/json; charset=UTF-8");
    //     $array =[
    //         'name'=>htmlspecialchars($_POST['Inputname']),
    //         'type'=>htmlspecialchars($_POST['Inputtype']),
    //         'link'=>htmlspecialchars($_POST['Inputlink']),
    //         ];

    //     if($this->model->put($array,"courseware")){
    //             $response = [
    //                 "message" => "Collaboration Resource Added",
    //                 "redirect" => BASE_URL_SSL."?route=dashboard/collabresources",
    //                 ];             
    //         }  
    //     echo json_encode($response);
    // }
    // public function processUpload(){
    //     header("Content-Type: application/json; charset=UTF-8");
    //     $target_dir = MAINPATH."public/uploads/documents/";
    //     $file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //     $fakename = $_FILES["fileToUpload"]["tmp_name"];
    //     $fileformat = strtolower(pathinfo($file,PATHINFO_EXTENSION));
    //     $fileSize = $_FILES["fileToUpload"]["size"];
        

    //     $array = [
    //     "name" => htmlspecialchars($_POST['name']),
    //     "category" =>htmlspecialchars($_POST['category']),
    //     "type" => htmlspecialchars($_POST['type']),
    //     "location" => BASE_URL_SSL."public/uploads/documents/". basename($_FILES["fileToUpload"]["name"]),
    //     "file_ext" => $fileformat
    //     ];
        
    //     if($this->model->checkFileExist($file)){
    //         $continue = true;
    //     }else{
    //         $response = [
    //             "message" => "File Already Exist",
    //             "redirect" => BASE_URL_SSL."?route=dashboard/uploads",
    //             ];  
            
    //     }
    //     if($this->model->checkFileSize($fileSize)){
    //         $continue = true;
    //     }else{
    //         $response = [
    //             "message" => "Failed: Incorrect File Size",
    //             "redirect" => BASE_URL_SSL."?route=dashboard/uploads",
    //             ];  
            
    //     }
    //     if($this->model->checkFileType($fileformat)){
    //         $continue = true;
    //     }else{
    //         $response = [
    //             "message" => "Failed: File Type Not Supported, try these 'pdf','jpg','ppt','pptx','doc','docx','mp4'",
    //             "redirect" => BASE_URL_SSL."?route=dashboard/uploads",
    //             ];  
           
    //     }
    //     if($this->model->fileUpload($file,$fakename)){
    //         if($this->model->put($array,"files")){
    //             $response = [
    //                 "message" => "Upload successful",
    //                 "redirect" => BASE_URL_SSL."?route=dashboard/resources",
    //                 ];                
    //         }
    //     }else{
    //         $response = [
    //             "message" => "File Upload Failed",
    //             "redirect" => BASE_URL_SSL."?route=dashboard/uploads",
    //             ];  
            
    //     }

    //      echo json_encode($response);

    // }  
    // public function fileDelete(){
        
    //     if($this->model->delete_content("files",$_REQUEST['id'])){
    //         $response = [
    //             "message" => "File Deleted",
    //             "redirect" => BASE_URL_SSL."?route=dashboard/resources",
    //             ];             
    //     }
    //      echo '<meta http-equiv="Refresh" content="1;url='.$response["redirect"].'">';
    //      echo $response['message'];
        
    // }    
    public function userDelete()
    {
        
        if($this->model->delete_content("users", $_REQUEST['id'])) {
            $response = [
                "message" => "User Deleted",
                "redirect" => BASE_URL_SSL."?route=dashboard/users",
                ];             
        }
         echo '<meta http-equiv="Refresh" content="1;url='.$response["redirect"].'">';
         echo $response['message'];
        
    }   
    // public function deleteSessions(){
        
    //     if($this->model->delete_content("sessions",$_REQUEST['id'])){
    //         $response = [
    //             "message" => "Session Removed",
    //             "redirect" => BASE_URL_SSL."?route=dashboard/collaboration",
    //             ];             
    //     }
    //      echo '<meta http-equiv="Refresh" content="1;url='.$response["redirect"].'">';
    //      echo $response['message'];
        
    // } 
    public function deleteMessage()
    {
        
        if($this->model->delete_content("messages", $_REQUEST['id'])) {
            $response = [
                "message" => "Session Removed",
                "redirect" => BASE_URL_SSL."?route=dashboard/feedback",
                ];             
        }
         echo '<meta http-equiv="Refresh" content="1;url='.$response["redirect"].'">';
         echo $response['message'];
        
    } 
    public function count($table)
    {
        return $this->model->counter($table);
    }
    
}

?>
