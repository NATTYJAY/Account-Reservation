<?php
// app/Repositories/PostRepository.php
namespace App\Repositories;
use App\Interfaces\LoginInterface;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginRepository implements LoginInterface
{
    public function __construct(){
    }

    public function indexLoginRepo($page){
        return view($page);
    }

    public function loginLogic($attributes,$rules){
         $validator = Validator::make($attributes, $rules);
         return $validator;
    }

    public function logoutRepo(){
        $logout = Auth::logout();
        //Session::flash('status', 'You have logged out successful ');
        return $logout;
    }
}

