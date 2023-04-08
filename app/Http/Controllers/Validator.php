<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\gamestat;
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
            'list' => DB::table('gamecard')->get(),
            'chkplayer' => DB::table('gamehistory')
                        
                        ->where(function($query){
                            $query->where('player2', Auth::user()->username)
                            ->orWhere('player1', Auth::user()->username);
                        })
                        
                        ->where('game_status', 'on')
                        ->get(),
            
            
                 
        );

        


        return view('user.dashboard', $data);
    //}
    }
    function playgame_fnc($id){
        
            $username = Auth::user()->username;
        
            $getRecords = DB::table('gamehistory')
                            ->where(function($query){
                                $query->where('player1', Auth::user()->username)
                                ->orWhere('player2', Auth::user()->username);
                            })
                            ->where('game_status', 'on')
                            ->first();

                            

$message = '';

$gamerounds = $getRecords->game_rounds;
$player1score = $getRecords->player1score;
$player2score = $getRecords->player2score;
$activeplayer;

if($getRecords->player1 == $username)
{
    $activeplayer = $getRecords->player2;
}
else if($getRecords->player2 == $username){
    $activeplayer = $getRecords->player1;
}
if($id == "undefined" || $id == ""){
$message = "Please make a guess";
}
else{
            if($getRecords->activeplayer == $username and $getRecords->strikeword == "JESH"){
               //IF THE GUESS IS RIGHT, GIVE THIS USER +5
                if($getRecords->guesstitle == $id){
                if($getRecords->activeplayer == $getRecords->player1){
                    $player1score = (int)$player1score + 5;
                    if($getRecords->player1 == $username){
                        $message = "JESH Played! Congrats your guess was right. +5";
                        }
                        
                    }
                    else if($getRecords->activeplayer == $getRecords->player2){
                        $player2score = (int)$player2score + 5;

                        if($getRecords->player2 == $username){
                            $message = "JESH Played! Congrats your guess was right. +5";
                            }
                    }
               }
               // IF THE GUESS IS WRONG, GIVE THE OTHER OPPONENTS +3
               else if($getRecords->guesstitle <> $id){
                if($getRecords->activeplayer == $getRecords->player1){
                    $player2score = (int)$player2score + 3;
                    if($getRecords->player2 == $username){
                    $message = "JESH Played! Congrats your guess was right. +3";
                    }
                    else{
                        $message = "JESH Played! Wrong guess, you loss to ". $getRecords->player2;
                    }
                    }
                    else if($getRecords->activeplayer == $getRecords->player2){
                        $player1score = (int)$player1score + 3;

                        if($getRecords->player1 == $username){
                    $message = "JESH Played! Congrats your guess was right. +3";
                        }
                    else{
                        $message = "JESH Played! Wrong guess, you loss to ". $getRecords->player1;
                    }
                    }
                    
               }

               if($getRecords->game_rounds == '1'){
                $gamerounds = 0;
            }
                $update = DB::table('gamehistory')
                        ->where('strikeword', 'JESH')
                        ->where('game_status', 'on')
                        ->where(function($query){
                            $query->where('player1', Auth::user()->username)
                            ->orWhere('player2', Auth::user()->username);
                        })
                        ->update([
                            'strikeword' => 'GBAYE',
                            'guesstitle' => $id,
                            'player1score' => $player1score,
                            'player2score' => $player2score,
                            'game_rounds' => $gamerounds
                        ]);

                        DB::table('gamestat')->insert([
                            'player1' => $getRecords->player1,
                            'player2' => $getRecords->player2,
                            'guesstitle' => $id,
                            'strikeword' => "JESH",
                            'activeplayer' => $username,
                            'player1score' => $player1score,
                            'player2score' => $player2score,
                            'game_status' => "on"
        ]);

                       
            }
           else if($getRecords->activeplayer <> $username and $getRecords->strikeword == "JESH"){
            $message = "Oops! wait for the next player to play JESH";
           }
            else if($getRecords->activeplayer == $username and $getRecords->strikeword == "GBAYE"){
                $gamerounds = (int)$gamerounds - 1;
                
                $update = DB::table('gamehistory')
                        ->where('strikeword', 'GBAYE')
                        ->where('game_status', 'on')
                        ->where(function($query){
                            $query->where('player1', Auth::user()->username)
                            ->orWhere('player2', Auth::user()->username);
                        })
                        ->update([
                            'strikeword' => 'JESH',
                            'guesstitle' => $id,
                            'activeplayer' => $activeplayer,
                            'game_rounds' => $gamerounds
                        ]);
                       
     
                        DB::table('gamestat')->insert([
                            'player1' => $getRecords->player1,
                            'player2' => $getRecords->player2,
                            'guesstitle' => $id,
                            'strikeword' => "GBAYE",
                            'activeplayer' => $username,
                            'player1score' => $player1score,
                            'player2score' => $player2score,
                            'game_status' => "on"
        ]);
                       $message = 'GBAYE played!';
                        
            }
            else if($getRecords->activeplayer <> $username and $getRecords->strikeword == "GBAYE"){
                $message = "Oops! wait for the next player to play GBAYE";
            }
            
        }
        
        return response()->json(['success' => $message]);
    }

    function updateTime_fnc(Request $request){
        $getRecords = DB::table('gamehistory')
        ->where(function($query){
            $query->where('player1', Auth::user()->username)
            ->orWhere('player2', Auth::user()->username);
        })
        ->where('game_status', 'on')
        ->first();
        
        if($getRecords->game_rounds == '0'){
        $updateTime = DB::table('gamehistory')
                        ->where(function($query){
                            $query->where('player1', Auth::user()->username)
                            ->orWhere('player2', Auth::user()->username);
                        })
                        ->where('game_status','on')
                        ->update([
                            'minutes' => '00',
                            'seconds' => '00'
                        ]);
                    }
                    else{
                        $updateTime = DB::table('gamehistory')
                        ->where(function($query){
                            $query->where('player1', Auth::user()->username)
                            ->orWhere('player2', Auth::user()->username);
                        })
                        ->where('game_status','on')
                        ->update([
                            'minutes' => $request->minutes,
                            'seconds' => $request->seconds
                        ]);
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
            $user->game_status = 'off';
            $user->password = bcrypt($request['password']);
            $user->pass_real = $request['password'];
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

        
         if(Auth::user()->game_status == 'on'){
             return redirect()->route('gamearena');
         }
        else{
        return view('validator.settings', $data, $data2);
        }
    }
    function startGame_fnc($id){
        $player1username = Auth::user()->username;
        $player2username = $id;
        $saverecord = DB::table('gamehistory')->insert([
                'player1' => $player2username,
                'player2' => $player1username,
                'minutes' => "60",
                'seconds' => "00",
                'guesstitle' => "--",
                'strikeword' => "GBAYE",
                'activeplayer' => $player2username,
                'player1score' => "0",
                'player2score' => "0",
                'game_status' => 'on',
                'game_rounds' => '12'
        ]);
        $deleterecord = DB::table('players')
                        ->where('username', $id)
                        ->delete();
        $updateuser1 = DB::table('users')
                        ->where('username', Auth::user()->username)
                        ->update([
                            'game_status' => 'on'
                        ]);
        $updateuser2 = DB::table('users')
                        ->where('username', $player2username)
                        ->update([
                            'game_status' => 'on'
                        ]);
        if($saverecord){
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
    function playagain_fnc(){
        $username = Auth::user()->username;
        $getRecords = DB::table('gamehistory')
                            ->where('player1', Auth::user()->username)
                            ->orWhere('player2', Auth::user()->username)
                            ->where('game_status', 'on')
                            ->first();

        //update player1
        DB::table('users')
                        ->where('username', $getRecords->player1)
                        ->update([
                            'game_status' => 'off'
                        ]);
        //update player2
        DB::table('users')
                        ->where('username', $getRecords->player2)
                        ->update([
                            'game_status' => 'off'
                        ]);
        DB::table('gamehistory')
                        ->where('player1', $username)
                        ->orWhere('player2', $username)
                        ->update([
                            'game_status' => 'off'
                        ]);
        DB::table('gamestat')
        ->where('player1', $username)
        ->orWhere('player2', $username)
                        ->delete();

                        return redirect()->route('logout');
    }
    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
