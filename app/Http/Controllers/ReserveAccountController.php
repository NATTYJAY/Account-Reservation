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
        return $created;
    }

    public function showAllReservedAccount(Request $request, $accountReference){
        //Method to view a reserved account 
        $showReserved = $this->reserveSer->getReservedAccount($request, $accountReference);
        dd( $showReserved);
    }

    public function deleteReservedAccount(Request $request, $accountNumber){
        //method to delete an account
        $deleteReserved = $this->reserveSer->deleteReservedAccount($request, $accountNumber);
        dd($deleteReserved);
    }
   
}
