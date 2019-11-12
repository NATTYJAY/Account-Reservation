<?php
namespace App\Interfaces;

interface ReserveAccountInterface
{
    public function indexRepo($page);

    public function reserveAccount();

    public function showAccountForm($pageForm);
    
}