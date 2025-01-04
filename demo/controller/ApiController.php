<?php

class ApiController extends Controller
{

    public function index()
    {

    }

    public function adventures()
    {

        if($resources = $this->model->getServices()) {

            if(isset($_REQUEST["id"])) {

                foreach($resources as $service){

                    if($service["id"] == $_REQUEST["id"]) {

                        //Print only the name

                        if(isset($_REQUEST["name"])) {

                            echo $service["name"];

                            return;

                        }

                        //Print only description

                        if(isset(($_REQUEST["desc"]))) {

                            echo $service["description"];

                            return;

                        }
                        View::assign('data', $service);

                        break;

                    }

                }

                unset($service);

            }else{
                View::assign('data', $resources);
            }
        }     

        View::render('API/index');        

    }

    public function adventuresAvailable(){
        if($resources = $this->model->getServices()) {
            if(isset($_REQUEST["date"])){
            
            }

            if(isset($_REQUEST["time"])){
            
            }
        }
        View::render("API/index");
    }

    public function user()
    {

        if($this->isLoggedin()) {

            $data = $this->model->currentUser($this->get('userid'));

            View::render("API/index");

        }else{

            http_response_code(403);

            echo("403:User not logged in");

            die();

        }

    }

}


