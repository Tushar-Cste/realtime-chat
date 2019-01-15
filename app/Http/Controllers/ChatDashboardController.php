<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Chatroom;
use App\User;
use App\Message;
use App\Events\OnlineEvent;

class ChatDashboardController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $receiver = $this->receivers($id);
     
        $user=User::find($id);
      
       
        return view('chats.chatHome')->with('receivers', $receiver)
                                     ->with('requestmaker', $id)
                                     ->with('roomId',0);
                                   
    }
    public function receivers($id)
    {
        $receiver = array();
       
        $chatroom = Chatroom::where('chatRoomId', 'Like', '%' . $id . '%')->orderBy('updated_at')->get();
       // print_r($chatroom);
        foreach ($chatroom as $chat) {
            $arr = explode(',', $chat->chatRoomId);
           // print_r($arr);
            if($arr[0] == $id){ 
               
                array_push($receiver, User::find($arr[1]));
            }
            elseif($arr[1] == $id){
                array_push($receiver, User::find($arr[0]));
            }
            else{continue;}
        
        } 
        return $receiver;
    }
   
 
}
