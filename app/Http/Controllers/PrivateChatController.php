<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Chatroom;
use Session;
use App\User;
use App\Message;
use App\Events\ChatEvent;
use App\Events\OnlineEvent;

class PrivateChatController extends Controller
{
    public function rtnChatBox($id)
    {   $roomId=Chatroom::where('chatRoomId',$id)->first();
       
        $roomId=$roomId->id;
    
        $message =Message::where('roomId', $roomId)->get();
        $arr = explode(',', $id);
        $senderid = Auth::user()->id;
        $userob=User::find($senderid);
        $receivers = $this->receivers($senderid);
    

        for ($i = 0; $i < sizeof($arr); $i++) {
            if ($arr[$i] != Auth::user()->id)
                $receiver = $arr[$i];
        }
       // $requestmaker=Auth::user()->id;
       // event(new OnlineEvent($userob,$roomId));
        return view('chats.chatBox')->with('messages', $message)
            ->with('receiverid', $receiver)
            ->with('chatroomUser', $id)
            ->with('receivers', $receivers)
            ->with('requestmaker', $senderid)
            ->with('roomId',$roomId);
    }
    public function receivers($id)
    {
        $receiver = array();
        $chatroom = Chatroom::where('chatRoomId', 'Like', '%' . $id . '%')->orderBy('updated_at')->get();
        /*$message = Message::where('chatRoomId','Like','%'.$id.'%')->first();
        dd($message);*/
        foreach ($chatroom as $chat) {
            $arr = explode(',', $chat->chatRoomId);
           // print_r($arr);
            if ($arr[0] == $id) {

                array_push($receiver, User::find($arr[1]));
            } elseif ($arr[1] == $id) {
                array_push($receiver, User::find($arr[0]));
            } else {
                continue;
            }
        }
        return $receiver;
    }
    public function store (Request $request,$id){
        $senderId = auth()->user()->id;
        $chatroom = Chatroom::where('id', $id)->first();
        $chatRoomId = $chatroom->chatRoomId;
        $arr = explode(',', $chatRoomId);
        for ($i = 0; $i < sizeof($arr); $i++) {
            if ($arr[$i] != Auth::user()->id)
                $receiver = $arr[$i];
        }
        $message = new Message;
        $message->roomId = $chatroom->id;
        $message->sender = $senderId;
        $message->receiver = $receiver;
        $message->readWriteStatus = 0;
        $image=auth()->user()->avatar;
        $user=auth()->user()->name;
       
        $message->activationStatus = 1;
        $message->message = $request->message;
        $message->selftime=$request->time;
        $message->UTC=$request->utc;
        
        $message->save();
        $wasactive='true';
        event(new ChatEvent($message , $chatroom->id, $image,$user));
        
        return [
            'id' => $message->id,
             'image'=>$image,
            'wasactive'=>$wasactive,
        ];
    }
    public function timeformate(Request $request){
        $unformatted=$request->untime;
        $unformatted= explode('   ',$unformatted);
        $time= explode(':',$unformatted[0]);
        $date= explode('/',$unformatted[1]);
        $month=["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
       
       $m=$date[1];
       $m=$month[$m];
       $d=$date[0];
       $s=$time[2];
       $min=$time[1];
       $h=$time[0];
       $datestring=$m.' '.$d.','.' '.$h.':'.$min;
       return['time'=>$datestring,];
        
    }
    public function setuserlocalutc(Request $request){
        $user=auth()->user()->id;
        $user=User::find($user);
        $user->utc=$request->utcdiff;
        $user->save();
       // return ['utc'=>$request->utcdiff];
    }
    public function getlogedinusertime(Request $request){
        $roomId=$request->roomid;
        $chatroom=Chatroom::where('id',$roomId)->first();
        $chatRoomId=$chatroom->chatRoomId;
        //return $chatRoomId;
        $arr=explode(',',$chatRoomId);
        $senderId=Auth::user()->id;
        $otheruser;
       // return $senderId;
        if($arr[0] == $senderId){
            $otheruser=$arr[1];
        }else{
            $otheruser=$arr[0];
        }
//return $otheruser;
        $otheruser=User::find($otheruser);
        $otheruserutc=$otheruser->utc;
        if($otheruserutc == null){
            return 'didnt with '.$otheruser->name.' before';
        }
         $arr=gmdate('h:i:s');
      //   return  $otheruser;
        $arr=explode(':',$arr);
      
        $otheruserutc=(-1)*($otheruserutc);  
        $mm=($arr[0]*60)+$arr[1];
        $m=$mm+$otheruserutc;
       // return $mm;
        if($mm<0){
            $m=1440-$m;
        }
        if($mm>1440){
            $m=0+($mm-1440);
        }
     
        
        $h = (int)($m/60);
        $m = $m%60;
         $s=$arr[2];
        return $h.':'.$m.':'.$s;
      
      
    }
    public function test(){
      //  echo gmdate('h:i:s');
        $arr=gmdate('h:i:s');
        $arr=explode(':',$arr);
       // print_r($arr);
        $r=24*60;
        echo $r;
    }

}
