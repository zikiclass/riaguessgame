<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    function admin_fnc(){
        $data = array(
            'gameplayed' => DB::table('gamehistory')->get(),
            'players' => DB::table('players')->get(),
            'admin' => DB::table('users')
                        ->where('role', '1')
                        ->get(),
            );
        return view('admin.dashboard', $data);
    }
    function gametitle_fnc(){
        $data = array(
            'list' => DB::table('gamecard')->get()
        );
        return view('admin.gametitle', $data);
    }
    function viewgames_fnc(){
        $data = array(
            'row' => DB::table('gamehistory')->get()
        );

        return view('admin.viewgames',$data);
    }
    function players_fnc(){
        $data = array(
            'users' => DB::table('users')->get()            
        );
        return view('admin.players', $data);
    }
    function gametitledetails_fnc($id){
        $row = DB::table('gamecard')
                ->where('game_id', $id)
                ->first();
        // $data = array('info' => $row);
        $data = [
            'info' => $row
        ];
        return json_encode($data);

    }
    function down_fnc($id){
        DB::table('users')
        ->where('username', $id)
        ->update([
            'role' => '0'
        ]);
        
       return redirect()->route('players');
    }
    function up_fnc($id){
        DB::table('users')
        ->where('username', $id)
        ->update([
            'role' => '1'
        ]);
        return redirect()->route('players');
    }

    function gametitleupdate_fnc(Request $request){

        //set validation rule 
        $request->validate([
            'gametitle' => 'required'
        ]);

        //get the image in the folder and delete it
        $row = DB::table('gamecard')
                ->where('game_id', $request->gameId)
                ->first();
        $data = ['rec' => $row];


        

        //check if the admin dont want to update the image
        if($request->file('imgFile') == ''){
            $file_name = $data['rec'].pix;

            //deleting the image
        unlink($data['rec']->pix);
        }
        else{
        $path = 'img';
        $file = $request->file('imgFile');
        $file_name = time(). '_'. $file->getClientOriginalName();
        $upload = $request->imgFile->move(public_path($path), $file_name);
        $file_name = "img/".$file_name;
        }

        $updating = DB::table('gamecard')
                    ->where('game_id', $request->input('gameId'))
                    ->update([
                             'pix' => $file_name,
                            'title' => $request->input('gametitle')
                    ]);
        
    return response()->json(['code'=>1, 'msg'=>'Game record updated successfully']);
    }
}
