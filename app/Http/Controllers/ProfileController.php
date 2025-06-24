<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        //
        return view('profile', [
            'user' => auth()->user(),
        ]);


    }


    public function update(ProfileRequest $request)
    {
        //
        /** @var User */
        $user = auth()->user();

        $data= $request->validated();

        if( $file = $request->photo){
           $data['photo'] = $file->store('photos');
        }
        
        $user->fill($data)->save();

        return back()->with('message', 'Atualizado com Sucesso');



    }

}
