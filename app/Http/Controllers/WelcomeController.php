<?php

namespace App\Http\Controllers;
use App\Models\User;


class WelcomeController

{

    public function __invoke()
    {
        //models
        
        //dd(User::factory()->count(100)->create());

      /*  dd(

            User::query()
            ->find(1)
        ); */

        return view('welcome');

    }
}