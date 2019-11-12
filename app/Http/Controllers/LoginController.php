<?php

namespace App\Http\Controllers;
use App\Services\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(LoginService $loginservice){
        $this->loginservice = $loginservice;
    }
    
    public function Login(){
        return $this->loginservice->showLogin();
    }
    
	public function doLogin(Request $request){
       return $this->loginservice->doLoginLogic($request);
    }

    public function logout(){
        return $this->loginservice->logoutLogic();
    }

    public function showAPI(){
        $user_arr = [
            "details" => [
                'email'     => 'joe@yahoo.com',
                'password'  => 'kingdom'
            ] ,
            "api_details" => [
                "username"=> "MK_TEST_WD7TZCMQV7", 
                "password"=> "H5EQMQSHSURJNQ7UH2R78YAH6UN54ZP7"
            ]
        ];
        $userdata =(object)$user_arr;
        echo "<pre>";
        print_r($this->loginservice->LoginCurl_API($userdata->api_details));
    }
    
}
