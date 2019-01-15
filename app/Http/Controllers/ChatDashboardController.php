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
       // $readWrite= $this->readwriteStatus($id);
        $user=User::find($id);
        $user->onlineStatus=1;
        $user->save();
        $ri=$this->receiversid($id);
      //  broadcast(new OnlineEvent($user));
       
        return view('chats.chatHome')->with('receivers', $receiver)
                                      ->with('ri', $ri)
                                     ->with('requestmaker', $id)
                                     ->with('roomId',0);
                                   
    }
    public function receivers($id)
    {
        $receiver = array();
       
        $chatroom = Chatroom::where('chatRoomId', 'Like', '%' . $id . '%')->orderBy('updated_at')->get();
       
        foreach ($chatroom as $chat) {
            $arr = explode(',', $chat->chatRoomId);
            if($arr[0] == $id || $arr[1] == $id){
                for ($i = 0; $i < sizeof($arr); $i++) {
                    if ($arr[$i] != $id) {
                        array_push($receiver, User::find($arr[$i]));

                    }

                }
            }
           
        }
        return $receiver;
    }
    public function receiversid($id)
    {
        $receiverid = array();
       
        $chatroom = Chatroom::where('chatRoomId', 'Like', '%' . $id . '%')->orderBy('updated_at')->get();
        /*$message = Message::where('chatRoomId','Like','%'.$id.'%')->first();
        dd($message);*/
        foreach ($chatroom as $chat) {
            $arr = explode(',', $chat->chatRoomId);
            if($arr[0]== $id || $arr[1]== $id){
                for ($i = 0; $i < sizeof($arr); $i++) {
                    if ($arr[$i] != $id) {
                        $u = User::find($arr[$i]);
                        $u = $u->id;
                        array_push($receiverid, $u);

                    }

                }
            }
            
        }
        return $receiverid;
    }
 
}
