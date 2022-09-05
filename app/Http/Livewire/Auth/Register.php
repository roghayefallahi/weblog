<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $date = [
        "email" => "",
        "password" => "",
        "password_confirmation" => "",
        "policy" => false,
    ];

    public function handleRegister()
    {

        $this->validate([
            'date.email' => 'required | email |unique:users,email',
            'date.password' => 'required | string | min:6 | confirmed',
            'date.policy' => 'required'
        ]);

        $user = new User;
        $user->email = $this->date['email'];
        $user->password = Hash::make($this->date['password']);
        $user->gender = 1;
        $user->is_admin = 0;
        $user->role = 'user';
        $user->news = 1;
        $user->save();
        $id = $user->id;
        Auth::loginUsingId($id);
        return (redirect()->to('/'));

        dd($this->date);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
