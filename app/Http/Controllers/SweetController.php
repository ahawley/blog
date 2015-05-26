<?php namespace App\Http\Controllers;

use Request;
use DB;
use App\User; //model
use App\Blog;
use Redirect;
use Input;
use Hash;
use Session;

class SweetController extends Controller {
    
    public function getIndex(){
        $blogs = DB::table('blogs')->orderBy('id','desc')->get();
        return view('index')->with('blogs', $blogs);
    }
    
    public function getSignup($err = ''){
        if(Session::get('user')){
            return redirect('/');
        }
        else{
            return view('signup')->with('err', $err);
        }        
    }
    
    public function postSignup(){
        $username = Request::input('user');
        $password = Request::input('pass');
        $firstName = Request::input('first');
        $lastName = Request::input('last');
        $email = Request::input('email');
        $verify = Request::input('vpass');
        $birthday = Request::input('birth');
        $u = DB::table('users')->where('username',$username)->get();
        if(!$u){
            if($username && $password && $firstName && $lastName && $birthday && $password == $verify){
                $u = new User();
                $u->firstName = $firstName;
                $u->lastName = $lastName;
                $u->email = $email;
                $u->username = $username;
                $u->password = Hash::make($password);
                $u->push();
                Session::put('user', $username);
                return redirect('/');
            }
            else {
                $err = 'Please fill in all values and make sure your passwords match';
                return view('signup')->with('err',$err);
            }
        }
        else {
            $err = 'Your username has already been used';
            return view('signup')->with('err',$err);
        } 
    }
    
    public function getLogin($err = ''){
        if(Session::get('user')){
            return redirect('/');
        }
        else{
            return view('login')->with('err',$err);
        }          
    }
    
    public function postLogin(){
        $username = Request::input('user');
        $password = Request::input('pass');
        $err = 'The username or password is invalid';
        $u = DB::table('users')->where('username',$username)->get();
        
        if(!$u){
            return view('login')->with('err',$err);
        }
        else{
            $u = $u[0];
            $userPassword = $u->password;
            if(Hash::check($password, $userPassword)){
                Session::put('user', $username);
                return redirect('/');
            }  
            else{
                return view('login')->with('err',$err);
            }
        }
    }
    
    public function getNewpost($err = ''){
        if(Session::get('user')){
            return view('newpost')->with('err',$err);
        }
        else{
            return redirect('/');
        }
    }
    
    public function postNewpost(){
        $subject = Request::input('subject');
        $content = Request::input('content');
        if($subject && $content){
           $b = new Blog();
           $b->subject = $subject;
           $b->content = $content;
           $b->push();
           return redirect('/'); 
        }   
        else{
           $err = 'Make sure you have a subject and something in the body';
           return view('newpost')->with('err',$err);
        }
    }
    public function getLogout(){
        Session::forget('user');
        return redirect('/');
    }
}