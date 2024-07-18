<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        $users = User::query()->get();

        return view('profile',compact('users'));

    }

    public function create(){

        return view('profile.add');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        User::create($request->all());
    }

    public function update(){

        return view('profile.update');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('profile');

    }

}

?>