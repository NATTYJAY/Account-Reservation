<?php
namespace App\Services;
use Illuminate\Http\Request;
use App\Repositories\LoginRepository;
use Auth;

class LoginService{
    private $url_ =  "https://sandbox.monnify.com/api/v1/auth/login";
    protected $loginRepo;

    public function __construct(LoginRepository $loginRepo){
		$this->loginRepo = $loginRepo;
    }
   
	public function showLogin(){
		return $this->loginRepo->indexLoginRepo('Auth.login');
    }

     public function LoginCurl_API($user_data){ 
        $data_string = json_encode($user_data);
        $data = (object)$user_data;                                                               
        $api_key = $data->username;   
        $password = $data->password; 
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url_,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_USERPWD => $api_key.':'.$password,
            CURLOPT_SSL_VERIFYPEER=> false,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_POST=> true,
            CURLOPT_POSTFIELDS => $data,
        ));
         $errors = curl_error($curl);   
         return $response =  json_decode(curl_exec($curl),true); // convert object to array
         curl_close($curl);  
    }


	public function doLoginLogic(Request $request){
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);
        $vallidate = $this->loginRepo->loginLogic($request->all(),$rules);
		if ($vallidate->fails()) {
            return redirect(route('login'))
            ->withErrors($vallidate) //send back all errors to the login form
			->withInput($request->only('email','remember')); // send back the input
		} else {
			   // create our user data for the authentication
            $user_arr = [
                "details" => [
                    'email'     => $request->email,
                    'password'  => $request->password
                ] ,
                "api_details" => [
                        "username"=> "MK_TEST_WD7TZCMQV7", 
                        "password"=> "H5EQMQSHSURJNQ7UH2R78YAH6UN54ZP7"
                ]
            ];
            $userdata =(object)$user_arr;
            $apiReturnResult = $this->LoginCurl_API($userdata->api_details);
            if($apiReturnResult['requestSuccessful'] == true && $apiReturnResult['responseMessage'] == 'success' && $apiReturnResult['responseBody']['expiresIn'] != 0 ){
                if (Auth::attempt($userdata->details,$request->remember)) {
                    $request->session()->put('api_token',$apiReturnResult['responseBody']['accessToken']);
                    return redirect(route('dashboard')); // validation successful!
                } else {   
                    return redirect(route('login'))->with('status','Email or Password is Incorrect.');  // validation not successful, send back to form 
                }
            }else{
                return redirect(route('login'))->with('network_error','Check your Internet Connection.');
            }
		}
    }
    
    public function logoutLogic(){
        // Logout Function
        $this->loginRepo->logoutRepo();
        return redirect(route('login'));
       
    }

}