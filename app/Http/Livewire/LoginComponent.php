<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginComponent extends Component{

    public $username, $password;
     //check user is registered
     public function getDatauser(){
        return DB::table('users')->where('username', $this->username)->first();
     }

    public function login(){
        // dd($this->getDatauser());
        $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        //log in logic
        if($this->getDatauser() and Hash::check($this->password, $this->getDatauser()->password ) and $this->username == $this->getDatauser()->username) {
           session([
               'username' => $this->getDatauser()->username,
           ]);
        //    dd('oke');
           redirect('/');
        }else{
            session()->flash('message', 'Username & Password not valid.');
        }
    }

    public function render(){
        return view('livewire.login-component');
    }
}
