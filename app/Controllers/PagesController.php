<?php

namespace App\Controllers;

use App\Models\User;

class PagesController
{
    public function index()
    {
        return view('index');
    }

    public function store()
    {
        $userName = trim($_POST['userName']);

        if(!empty($userName)){
            $user = new User($userName);
    
            $greetings = $user->greet();
    
            return view('index', compact('greetings'));
        }

        $error = 'Please enter User Name';
        
        return view('index', compact('error'));
    }
}
