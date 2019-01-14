<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Chatroom;
use App\Message;
use App\Level;
class searchController extends Controller
{ 
    public function search(Request $request)

     {  
        $senderId=Auth::user()->id;
        $chatRoomId;

        if ($request->ajax()) {

            $output = "";

            $users = DB::table('users')->where('name', 'LIKE', '%' . $request->search . "%")->get();
           if($request->search == ''){
                $output = "";
                return Response($output);
           }

            if ($users) {

                foreach ($users as $key => $user) {
                    $receiverId = $user->id;
                    if ($senderId == $receiverId){
                        continue;
                    }
                    if ($senderId > $receiverId) {
                        $chatRoomId = $receiverId.','.$senderId;
                    } else {
                        $chatRoomId = $senderId.','.$receiverId;

                    }
                    $chatroom = Chatroom::where('chatRoomId', $chatRoomId)->first();
                    if (is_null($chatroom)){
                        $chatroom = new Chatroom;
                        $chatroom->chatRoomId=$chatRoomId;
                        $chatroom->save();

                    }
                     $chatRoomId=route('privateChat',$chatRoomId);
                
                    $src=url('/uploads/avatars/'.$user->avatar);
                    $output .= '<tr>' .

                        '<td>'.'<a class="alink " href="'.$chatRoomId.' ">' .'<img src="'.$src. '"height="30px" width="30px" style="border-radius:50%;float:left">'. '<h1 style="display:inline;font-weight: 900;">'. $user->name.'</h1>' .'</a>'. '</td>' .


                        '</tr>';


                }

                return Response($output);

            }
            

        }

    }
    public function spamsearch(Request $request){
        $use=Auth::user()->id;
        $message=Message::where('activationStatus',0)
                         ->where('receiver',$use)
                         ->orderBy('created_at', 'DESC')
                         ->get();
        
        if($request->close=='close')
        {
            $output="";
            return Response($output);
        }  
        else{              
        $output= '<h3 class="well-sm">The Spamed messages are </h3>'.'<h3 class="btn btn-danger" id="spamclose">Click Here to Close Spam section</h3>';
       
        foreach($message as $message){
            $sender=$message->sender;
            $sender=User::find($sender);
            $sendersrc=url('/uploads/avatars/'.$sender->avatar);
            $output .='<tr >'. 
                        '<td>'.
                        '<img src="'. $sendersrc .'"height="20px" width="20px" style="border-radius:50%;float:left">'.


                             '<h4 style="display:inline;font-weight: 900;">'.$sender->name.
                            '</h4>'.



                '<h5 style="font-size: 14px;">'.$message->message.'</h5>'.'<h5 style="margin-left:10px;font-size:10px">'.$message->created_at.'</h5>'.
                        '</td>'.
                    '</tr>'                   
                    ;
        }                 
       return Response($output);}

    }
    public function levelsearch(Request $request){
       $roomid=$request->authid;
       $sender=auth()->user()->id;
        $chatroom = Chatroom::where('id', $roomid)->first();
        $chatroomusers=$chatroom->chatRoomId;
        $chatroomusers = explode(',', $chatroomusers);
        $receiver;
        if ($chatroomusers[0] == $sender) {
            $receiver = $chatroomusers[1];
        } else {
            $receiver = $chatroomusers[0];
        }
        $allevels = Level::where('userleveler', '=', $sender)
            ->where('userbeenleveled', '=', $receiver)->get();
            $output='';
        foreach($allevels as $levels){
            $output.='<tr>'.
             '<td>'.'<h6>'.$levels->value. '</h6>'. '</td>'.
            '</tr>';
        } 
        return Response($output);

    }
    public function unreadsearch(Request $request){
      //  $roomid=$request->authid;
        $senderid=auth()->user()->id;
       $output=""; 
         $message=Message::where('receiver','=',$senderid)
                        ->where('readWriteStatus','=',0)
                        ->where('activationStatus','!=',0)->orderBy('created_at','DSEC')->get();
         $messagecnt=Message::where('receiver','=',$senderid)
                        ->where('readWriteStatus','=',0)
                        ->where('activationStatus','!=',0)->orderBy('created_at','DSEC')->count();
       // 
        if($messagecnt == 0){
            $output.='<tr>'.'<td>'.'<h3 class="well-sm">No unread message</h3>'.'</td>'.'</tr>';
            return Response($output);
        }               
        foreach($message as $message){
            $sender=$message->sender;
            $sender=User::find($sender);
            $sendersrc=url('/uploads/avatars/'.$sender->avatar);
            $output .='<tr >'. 
                        '<td>'.
                        '<img src="'. $sendersrc .'"height="20px" width="20px" style="border-radius:50%;float:left">'.


                             '<h4 style="display:inline;font-weight: 900;">'.$sender->name.
                            '</h4>'.



                '<h5 style="font-size: 14px;">'.$message->message.'</h5>'.'<h5 style="margin-left:10px;font-size:10px">'.$message->created_at.'</h5>'.
                        '</td>'.
                    '</tr>'                   
                    ;
        }  
         return Response($output);              
    }
}
