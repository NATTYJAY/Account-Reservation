<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReserveAccountService;

class ReserveAccountController extends Controller
{
    //
    protected $reserveAccountService;

    public function __construct(ReserveAccountService $reserveAccountService){
		 $this->reserveSer = $reserveAccountService;
    }
    
    public function index(){
        return $this->reserveSer->showIndex();
    }
    
    public function show(Request $request){
        return $this->reserveSer->showAccount($request);
    }

    public function create(Request $request){
        $created = $this->reserveSer->storeReservedAccount($request);
        dd($created);
        //return back()->with(['status'=>$this->postservice]);
    }
    // public function deleteSessionData(Request $request) {
    //     $request->session()->forget('api_token');
    //     echo "Data has been removed from session.";
    //  }
   
}
