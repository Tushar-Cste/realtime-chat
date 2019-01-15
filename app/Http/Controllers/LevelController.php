<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Chatroom;
use App\Level;
use App\User;
use App\Message;

class LevelController extends Controller
{
   public function index(Request $request){
        $roomid=$request->roomid;
        $level=$request->level;
       // return $level;
        $sender=auth()->user()->id;
        $chatroom=Chatroom::where('id',$roomid)->first();
        $chatroomusers=$chatroom->chatRoomId;
        $chatroomusers=explode(',',$chatroomusers);
        $receiver;
        if($chatroomusers[0]==$sender){
            $receiver=$chatroomusers[1];
        }else{
            $receiver=$chatroomusers[0];
        }
       
       
        // if($request->levels == 'Nudge' && $previousnudge == 0){
        //     $newlevel = new Level;
        //     $newlevel->userleveler = $sender;
        //     $newlevel->userbeenleveled = $receiver;
        //     $newlevel->value = $request->levels;
        //     $newlevel->save(); 
        //     return ['level'=>'Nudge'];
        // }
        $levelcont=Level::where('userleveler',$sender)
                          ->where('value',$level)
                          ->where('userbeenleveled',$receiver)->count();
                         // return $levelcont;
       if($levelcont == 0 ){
            $newlevel = new Level;
            $newlevel->userleveler = $sender;
            $newlevel->userbeenleveled = $receiver;
            $newlevel->value = $request->level;
            $newlevel->save();
            $allevels = Level::where('userleveler', '=', $sender)
                ->where('userbeenleveled', '=', $receiver)->get();

            $output = '';
            foreach ($allevels as $allevel) {
                $leveldelsrc = route('leveldel', $allevel->id);
                $output .= '<h6 class="well-sm level_font" style="display:inline;">' . $allevel->value . '<a class="alink"  href="'. $leveldelsrc .'">' . '<i id="crossbutton" class="fas fa-times"></i>' . '</a>' . '</h6>';
            }
            $output='Level: '.$output;
            return Response($output);  
       }else{
           return 'reload';
       }

        
           
               
            
        
   }
   public function getOldLevel(Request $request){
        $roomid = $request->roomid;
        $sender=auth()->user()->id;
        $chatroom = Chatroom::where('id', $roomid)->first();
        $chatroomusers = $chatroom->chatRoomId;
        $chatroomusers = explode(',', $chatroomusers);
        $receiver;
        if ($chatroomusers[0] == $sender) {
            $receiver = $chatroomusers[1];
        } else {
            $receiver = $chatroomusers[0];
        }
        $allevels = Level::where('userleveler', '=', $sender)
            ->where('userbeenleveled', '=', $receiver)->get();

        $output = '';
        foreach ($allevels as $allevel) {
            $leveldelsrc=route('leveldel',$allevel->id);
            $output .= '<h6 class="well-sm level_font" style="display:inline;">' . $allevel->value . '<a class="alink" href="'.$leveldelsrc.'">' . '<i id="crossbutton" class="fas fa-times"></i>' . '</a>' . '</h6>';
        }
        $output='Level: '.$output;
        return Response($output);            
   }
   public function custom(Request $request){
        $roomid = $request->roomid;
        $sender = auth()->user()->id;
        $chatroom = Chatroom::where('id', $roomid)->first();
        $chatroomusers = $chatroom->chatRoomId;
        $chatroomusers = explode(',', $chatroomusers);
        $receiver;
        if ($chatroomusers[0] == $sender) {
            $receiver = $chatroomusers[1];
        } else {
            $receiver = $chatroomusers[0];
        }
        $newlevel = new Level;
        $newlevel->userleveler = $sender;
        $newlevel->userbeenleveled = $receiver;
        $newlevel->value = $request->customlevel;
        $newlevel->save(); 
        return Redirect::to('privateChat/' .( implode(",",$chatroomusers)));


   }
   public function delete($id){
       $level=Level::find($id);
       $level->delete();
       return redirect()->back();
   }
}
