<?php
namespace App\Interfaces;

interface LoginInterface
{
    public function indexLoginRepo($page);

    public function loginLogic($attributes,$rules);
}