<?php
// app/Repositories/PostRepository.php
namespace App\Repositories;
use App\Interfaces\ReserveAccountInterface;

class ReserveAccountRepository implements ReserveAccountInterface
{
    public function __construct(){
    }

    public function indexRepo($page){
        return view($page);
    }

    public function reserveAccount(){
        
    }

    public function showAccountForm($pageForm){
        return view($pageForm);
    }
}

