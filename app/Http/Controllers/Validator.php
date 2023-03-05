<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class Validator extends Controller
{
    function login_fnc(){
        return view('validator.login');
    }
    function signup_fnc(){
        return view('validator.signup');
    }
    function forgot_fnc(){
        return view('validator.forgot');
    }
    function reset_fnc(){
        return view('validator.reset');
    }
    function blog_fnc(){
        return view('blog');
    }
    function contact_fnc(){
        return view('contact');
    }
    function about_fnc(){
        return view('about');
    }
    function gamearena_fnc(){
        $data = array(
            'list' => DB::table('gamecard')->get()
        );
$username = Auth::user()->username;
        $checkplayer1 =  DB::table('gamehistory')
                        ->where('player1', $username)
                        ->where('gamestatus', 'on')
                        ->get();
        $checkplayer2 = DB::table('gamehistory')
                        ->where('player2', $username)
                        ->where('gamestatus', 'on')
                        ->get();
        if(!$checkplayer1){
            return redirect()->route('gamesettings');
         }
         else{
        return view('user.dashboard', $data);
        }
    }
    function save_user(Request $request){
        $user = User::where('email', $request['email'])->first();
        if($user){
            return response()->json(['exists' => 'Email already exists']);
        }
        else{
            $user = new User;
            $user->name = $request['fullname'];
            $user->email = $request['email'];
            $user->username = $request['username'];
            $user->role = '0';
            $user->password = bcrypt($request['password']);
        }
        $user->save();
        return response()->json(['success' => 'User registered successfully']);
    }
    function user_login(Request $request){
        if(Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ])){
            if(Auth::user()->role == 0){
            return response()->json(['success' => 'Successfully Logged In']);
            }
            else if(Auth::user()->role == 1){
                return response()->json(['success' => 'Admin Successfully Logged In']);
              
            }
        } else{
            return response()->json(['error' => 'Something Went Wrong']);
        }
    }
    function gamesettings_fnc(){
        $data = array(
            'list' => DB::table('players')
            ->where('username', '<>', Auth::user()->username)
            ->get()
        );

        $data2 = array(
                'list2' => DB::table('players')
                ->where('username', Auth::user()->username)
                ->get()
        );

        $username = Auth::user()->username;
        $checkplayer1 = array(
            'player1' => DB::table('gamehistory')
                        ->where('player1', $username)
                        ->where('gamestatus', 'on')
                        ->get()
        );
        $checkplayer2 = array(
            'player2' => DB::table('gamehistory')
                        ->where('player2', $username)
                        ->where('gamestatus', 'on')
                        ->get()
        );
        
        // if($checkplayer1 or $checkplayer2){
        //     return redirect()->route('gamearena');
        // }
        
        return view('validator.settings', $data, $data2);
    }
    function startGame_fnc($id){
        $player1username = Auth::user()->username;
        $player2username = $id;
        $saverecord = DB::table('gamehistory')->insert([
                'player1' => $player1username,
                'player2' => $player2username,
                'timeplayed' => "--:--",
                'guesstitle' => "--",
                'strikeword' => "--",
                'activeplayer' => "--",
                'player1score' => "0",
                'player2score' => "0",
                'gamestatus' => "on"
        ]);
        $deleterecord = DB::table('players')
                        ->where('username', $id)
                        ->delete();
        if($saverecord && $deleterecord){
            return redirect()->route('gamearena');
        }
    }
    function become_player_fnc(){
        $username = Auth::user()->username;
        $addplayer = DB::table('players')->insert([
            'username' => $username
        ]);
        if($addplayer){
            return redirect()->route('gamesettings');
        }
    }
    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
