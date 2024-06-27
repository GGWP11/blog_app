<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthorLoginForm extends Component
{
    public $email, $password;

    public function LoginHandler(){
        $this -> validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5'
        ],[
            'email.required'=>'Enter your email address',
            'email.email'=>'Invalid email address',
            'email.exists'=>'This email is not registered',
            'password.required'=>'Password is required'
        ]);

        $creds = array('email'=>$this->email, 'password'=>$this->password);

        if(Auth::guard('web')->attempt($creds)){
            $checkUser = User::where('email',$this->email)->first();
            if($checkUser->blocked==1){
                Auth::guard('web')->logout();
                return redirect()->route('author.login')->with('fail','Your account has been blocked.');
            }elseif($checkUser->type==1){
                return redirect()->route('author.home');
            }elseif($checkUser->type==2){
                return redirect()->route('user.home');
            }
        }else{
            session()->flash('fail','Incorrect email or password');
        }
    }

    public function render()
    {
        return view('livewire.author-login-form');
    }
}
