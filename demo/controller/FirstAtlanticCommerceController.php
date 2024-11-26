<?php
class FirstAtlanticCommerceController extends Controller{
    public $setting= [];
    private $data = [];
    private $json = [];
    private $cred = [];
    
   
    
    // Admin Portion
    public function index(){
   
        View::render('Dashboard/payment-gateway/FirstAtlanticCommerce/FirstAtlanticCommerce_settings');
    }
    public function save(){
        header("Content-Type: application/json; charset=UTF-8");
        if(isset($_POST['merchant_id']) && !empty($_POST['merchant_id'])){
            $this->data['merchant_id'] = htmlspecialchars($_POST['merchant_id']);
        }
        if(isset($_POST['merchant_key']) && !empty($_POST['merchant_key'])){
            $this->data['merchand_password'] = htmlspecialchars($_POST['merchant_key']);
        }        
        if(isset($_POST['merchant_sand_id']) && !empty($_POST['merchant_sand_id'])){
            $this->data['merchant_sandbox_id'] = htmlspecialchars($_POST['merchant_sand_id']);
        }                
        if(isset($_POST['merchant_sand_key']) && !empty($_POST['merchant_sand_key'])){
            $this->data['merchant_sandbox_password'] = htmlspecialchars($_POST['merchant_sand_key']);
        }          
        if(isset($_POST['merchant_sand_key']) && !empty($_POST['merchant_sand_key'])){
            $this->data['merchant_sandbox_password'] = htmlspecialchars($_POST['merchant_sand_key']);
        }         
       
        $this->data['mode'] = htmlspecialchars($_POST['status']);
        
        if(isset($_POST['gateway_id']) && !empty($_POST['gateway_id'])){
            $this->data['id'] = htmlspecialchars($_POST['gateway_id']);
        }
        
        if($this->model->put('fac_settings',$this->data)){
            $response = [
                    'message'=> 'Gateway Credentials have been updated',
                    'redirect'=> BASE_URL_SSL.'?route=dashboard/paymentGateway'
                    ];
                    echo json_encode($response);             
        }else{
            $response = [
                    'message'=> 'There was an error updating your Gateway Credentials',
                    'redirect'=> BASE_URL_SSL.'?route=dashboard/paymentGateway'
                    ];
                    echo json_encode($response);            
        }
    }
    
    private function msTimeStamp() {
        return (string)round(microtime(1) * 10000);
    }  
    
    //Gateway Operations
    public function confirm(){
        
        $this->setting = $this->model->getGatewaySettings();
        $this->settings($this->setting);
        $order_id = $this->makeuuid('YRDY'.$this->msTimeStamp());
        
        $transaction = [
            "OrderID" => $order_id,
            "CardHolderName" => $_POST['card-name'],
            "CardPan" => $_POST['card-number'],
            "CardCVV" => $_POST['cvv'],
            "CardExpiration" => $_POST['expyear'].$_POST['expmonth'],
            "BillToAddress" => $_POST['address'],
            "BillToAddress2" => $_POST['address2'],
            "BillToCity" => $_POST['city'],
            "BillToCountry" => $_POST['country'],
            "BillToState" => $_POST['state'],
            "BillToZipPostCode" => $_POST['zip'],
            "BillToFirstName" => $_POST['firstName'],
            "BillToLastName" => $_POST['lastName'],
            "BillToTelephone" => $_POST['phone'],
            "BillToMobile" => $_POST['mobile'],
            "BillToEmail" => $_POST['email'],
            "Total" => $_POST['total']
            ];
        
        $response = $this->Request($transaction);
        $json = [];
        $json['error'] = false;
        
        if($response->IsoResponseCode == "SP4"){
            $transaction['SpiToken'] = $response->SpiToken;
            $json['form3ds'] = $response->RedirectData;
            $transaction["CardPan"] = substr($_POST['card-number'],0,4)."********".substr($_POST['card-number'],-4);
            $transaction["orders"] = $_POST['id'];
            if($this->model->put('fac_transactions',$transaction)){
                header("Content-Type: application/json; charset=UTF-8");
                echo json_encode(['form3ds'=>$response->RedirectData]);   
            }
        }else{
                $json['error'] = "There is an error proccessing this card. \n\n".$response->IsoResponseCode ." - ".$response->ResponseMessage;
            }
       
    }
    
    
    public function capture(){
        $result = json_decode($_POST['Response']);
        
        
         $this->setting = $this->model->getGatewaySettings();
         $this->settings($this->setting);   
        
         if($result->TransactionType == 2){
             $transData = 'Sale';
         }else{
             $transData = 'Auth';
         }

         $response = $this->payment($result->SpiToken);
         $queryresponse = $this->model->getGatewayTransaction($result->SpiToken);
        
         if($response->IsoResponseCode == 00){

             $dataset = [
                 'id' => $queryresponse['id'],
                 'rrn' => $response->RRN,
                 'Transaction_Id' => $response->TransactionIdentifier,
                 'status' => $response->Approved
                 ];

             if($this->model->put('fac_transactions',$dataset)){
                
                $dataset['order_no'] = $queryresponse['OrderID'];
                $dataset['date'] = date('d-m-y / h:m:s');
                $dataset['code'] = $response->AuthorizationCode;
                $dataset['approved'] = $response->Approved;
                $dataset['trans'] = $transData;
                $dataset['cardType'] = $result->CardBrand;
                $dataset['cardno'] = $queryresponse['CardPan'];
                $dataset['name'] = $queryresponse['CardHolderName'];
                $dataset['total'] = $queryresponse['Total'];
                $dataset['message'] = $response->ResponseMessage;
                $dataset['redirect'] = BASE_URL_SSL;
                $dataset['success_note'] = "
                     <h5>Transaction Successful</h5>
                     <p>A reciept will be sent to you later, either by email or WhatsApp</p>
                     ";

             }
             
             $orderUpdate = [
               'id'=>$queryresponse['orders'],
               'status' => 'Paid'
                 ];
            $this->model->put('orders',$orderUpdate);
            View::assign('heading','Reciept for '.$queryresponse['CardHolderName']);
            View::assign('is_successful',true);
            View::assign('data',$dataset);
            View::render('checkout/reciept');
          
       
        }else{
            $data['errorcode']=$response->IsoResponseCode;
            $data['errornote']="
                <h5>Failed To Complete Transaction</h5>
                <p>Card was authenticated but could not continue transaction, please check your card and try again later.</p>
                <p>If this error persist, please contact your bank</p>
                ";
            $data['message'] = $response->ResponseMessage;
            $data['rrn'] = $response->RRN;
            $data['order_no'] = $response->OrderIdentifier; 
            $dataset['redirect'] = BASE_URL_SSL.'checkout';
            View::assign('heading','Reciept for '.$queryresponse['CardHolderName']);
            View::assign('is_successful',false);
            View::assign('data',$data);
            View::render('checkout/reciept');
         }
    }  
    private function settings($setting){
        if($setting['mode'] == "Live"){
            $this->cred = [
                "Host"=>"gateway.ptranz.com",
                "Username" => $this->setting['merchant_id'],
                "Password" => $this->setting['merchand_password'],
                "URL"      => 'https://gateway.ptranz.com/api/spi/sale',
                "Payment"  => 'https://gateway.ptranz.com/api/spi/payment'
                ];            
        }else{
            $this->cred = [
                "Host"=>"staging.ptranz.com",
                "Username" => $this->setting['merchant_sandbox_id'],
                "Password" => $this->setting['merchant_sandbox_password'],
                "URL"      => 'https://staging.ptranz.com/api/spi/sale',
                "Payment"  => 'https://staging.ptranz.com/api/spi/payment'
                ];
        }
        

    }

    private function makeuuid($g){
        $a = array(
            substr($g,0,8),
            substr($g,8,4),
            substr($g,12,4),
            substr($g,16,4),
            substr($g,20,strlen($g))
        );
        
        return implode('-',$a);
    }


  public function Request($transaction = array()){
    $orderNumber = $this->makeuuid($transaction['OrderID']);//$_REQUEST['OrderID'];
    
    $CardDetails = array(
        'CardCvv' => $transaction['CardCVV'], //$_REQUEST['cvv'],
        'CardExpiration' =>  $transaction['CardExpiration'],//$_REQUEST['exp'],
        'CardPan' => $transaction['CardPan'], //$_REQUEST['card-number'],
        'CardholderName' => $transaction['CardHolderName'], //$_REQUEST['card-name'],
        'IssueNumber' => '',
        'StartDate' => '');
    
    $BillingDetails = array(
        'BillToAddress' => $transaction['BillToAddress'], //$_REQUEST['Address'],
        'BillToAddress2' => $transaction['BillToAddress2'], //$_REQUEST['Line2'],
        'BillToCity' => $transaction['BillToCity'], //$_REQUEST['city'],
        'BillToCountry' => $transaction['BillToCountry'], //$_REQUEST['country'],
        'BillToEmail' => $transaction['BillToEmail'], //$_REQUEST['email'],
        'BillToFirstName' => $transaction['BillToFirstName'],  //$_REQUEST['firstname'],
        'BillToLastName' => $transaction['BillToLastName'], //$_REQUEST['lastname'],
        'BillToState' => $transaction['BillToState'], //$_REQUEST['state'],
        'BillToTelephone' => $transaction['BillToTelephone'], //$_REQUEST['phone'],
        'BillToZipPostCode' => $transaction['BillToZipPostCode'], //$_REQUEST['zip'],
        'BillToCounty' => '',
        'BillToMobile' =>$transaction['BillToMobile']//$_REQUEST['mobile']
        );
        
    $MerchantResponseURL = BASE_URL_SSL.'?route=FirstAtlanticCommerce/capture';
    
    $this->data = array(
        "Tokenize" => true,
        "TotalAmount" => $transaction['Total'],//$_REQUEST['Total'],
        "CurrencyCode" => "388",
        "ThreeDSecure" => true,
        "Source" => $CardDetails,
        "OrderIdentifier"=> $orderNumber,
        "BillingAddress"=> $BillingDetails,
        "AddressMatch" => false,
        "ExtendedData"=> [
            "ThreeDSecure"=> [
                "ChallengeWindowSize"=> 4,
                "ChallengeIndicator"=> "01"
            ],
        "MerchantResponseUrl"=> $MerchantResponseURL
    ]);
    
    $result = $this->cURL($this->data);
    
    return $result;
  }
  
  public function payment($spiToken){

      return $this->cURL($spiToken, "Payment");
  }
  
  private function cURL($data,$mode="sale"){
    $ch = curl_init();
    if($mode == "sale"){
        curl_setopt($ch, CURLOPT_URL,$this->cred['URL']);
    }else{
        curl_setopt($ch, CURLOPT_URL,$this->cred['Payment']);
    }

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Host: '.$this->cred['Host'], //staging.ptranz.com'
        'Expect: 100-continue',
        'Connection: Keep-Alive',
        'Accept: application/json',
        'PowerTranz-PowerTranzId: '. $this->cred['Username'],
        'PowerTranz-PowerTranzPassword: '.$this->cred['Password'],
        'Content-Type: application/json; charset=utf-8'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    
    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $server_output = curl_exec($ch);
    
    curl_close($ch);

    return json_decode($server_output);
   
  }
    private function getBillingToCountry($code) {
        $countries = file_get_contents(ASSETS . 'countries.json');
        $countries = json_decode($countries, true);
        return isset($countries[$code]) ? $countries[$code] : null;
    }
    private function getCurrency($code) {
        $currencies = file_get_contents(ASSETS . 'currencies.json');
        $currencies = json_decode($currencies, true);
        return isset($currencies[$code]) ? $currencies[$code] : null;
    }
    
}


?>