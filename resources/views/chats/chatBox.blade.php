@extends('chats.chatHome')
@section('routes')
var fetchroomId = "{{  $roomId }}";
var requestmaker ="{{ $requestmaker }}";
@endsection
@section('content')
    @php
       $u=Auth::user()->id;
       $receiver_user=App\User::where('id',$receiverid)->first();  
       $mes=App\Message::where('RoomId',$roomId) 
                        ->where('readWriteStatus','!=',1)
                         ->where('sender','!=',$u)
                          ->get(); 
        foreach ($mes as $mes) {
           $mes->readWriteStatus=1;
           $mes->save();
        }

    @endphp

    <div class=" col-md-8 float-right"  >
			
          
           
        <div class="chatboxtopbar"> 
           
                <tr style="overflow:hidden">  <img class="receiver-profile-image float-left" style="" src="{{asset('/uploads/avatars/'.$receiver_user->avatar)}}" height="60px" width="60px" alt="default.png"  > </tr> 
           
            <div class="">
               <table style="" class="col-md-7">
                    <tr scope="row" >
                        <td colspan="12"><h1 class="chtbxusername">{{$receiver_user->name}}</h1></td>
                        
                        <td class="chatnavicon" >
                            <i  class="far fa-star chatnavicon"></i>
                            <i  class="far fa-envelope-open chatnavicon"></i>
                            <i  class="fas fa-trash-alt chatnavicon"></i>
                           

                            <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i  class="fas fa-tag chatnavicon"></i></a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                
                                        <option class="levelop" value='Archive' id="archiveclk">Archive</option>
                                        <option class="levelop" value='Span'  id="spamclk">Spam</option>
                                        <option class="levelop" value='Report'  id="reportclk">Report</option>
                                        <option class="levelop" value='Follow'  id="followclk">Follow</option>
                                        <option class="levelop" value='Nudge'  id="nudgeclk">Nudge</option>
                                       
                                      
                                        <form method="POST" action="{{url('/addcustomlevel')}}">
                                            {{ csrf_field() }}
                                            <input type="text" class="form-controller" name='customlevel' placeholder="Custom level" required>
                                            <br>
                                            <input type="submit" class="mybtn" value="Add custom level">
                                            <input type="hidden" name="roomid" value="{{$roomId}}">
                                        </form>
                                        
                                     
                                    

                                </div> 
                            
                            <i class="fas fa-book chatnavicon"></i>
                        </td>
                    </tr>
                    <tr scope="row">
                    <td class="message_font"> @{{line}}   | Local time: <i id="demo" class="time"></i></td>
                    </tr>
                    <tr  >
                        <td class="message_font" >
                            <div class="leveldiv" id="levelid" >
                             
                            </div>   
                       </td>
                    </tr>
               </table>

            </div>
           
            </div> 


			
            <ul style="overflow-y: scroll;height:400px" class="list-group " v-chat-scroll >
                <style>
                    [v-cloak]{display: none;}
                </style>
			  
			  <message
			  	v-for="value,index in chat.messages"
			  	:key=value.index
			  	:user=chat.user[index]
			  	:color=chat.color[index]
			  	:time=chat.time[index]
                :messageid=chat.messageid[index]
                :spam=chat.spam[index]
                :report=chat.report[index]
                :images=chat.images[index]
                :mgssender=chat.mgssender[index]
                :spamedmessageid=chat.spamedmessageid[index]
                v-cloak

               
			  >@{{value}} </message>
			  
            </ul><span v-cloak class="typing ">@{{typing}}</span>
			<input type="text" placeholder="type your message...." class="form-control" v-model="message" @keyup.enter="send({{$roomId}})">
			
	</div>
@endsection
@section('script')
<script>
    var myVar = setInterval(myTimer, 1000);
   

    function myTimer() {
   

     $.ajax({
            type: 'get',
            url : '{{URL::to('getlogedinusertime')}}',
            data:{'roomid':fetchroomId},
            success:function(data){
               // console.log(data);
                // $('#spambody').html(data);
                document.getElementById("demo").innerHTML = data;
                
            }
        })

    }

</script>
<script>
   
  $(document).ready(function() {
   // put Ajax here.
   
   $.ajax({
       type: 'get',
       url:'{{url('/getOldLevel')}}',
       data:{'roomid':fetchroomId},
       success:function(data){
           console.log(data);
           document.getElementById("levelid").innerHTML=data;
       }

   })
 });
  $(document).ready(function(){
      $('#archiveclk').click(function(){     
           $.ajax({
              type:'get',
              url:'{{URL::to('levelset')}}',
              data:{'level':'Archive','roomid':fetchroomId},
              success:function(data){
                // console.log('success');
                 console.log(data);
                 if(data == 'reload'){
                     location.reload();
                 }else{
                     document.getElementById("levelid").innerHTML=data;
                 }
                
              }
          })
      });
      $('#spamclk').click(function(){
          console.log('spam');
          $.ajax({
              type:'get',
              url:'{{URL::to('levelset')}}',
              data:{'level':'Spam','roomid':fetchroomId},
              success:function(data){
                  console.log(data);
                 if(data == 'reload'){
                     location.reload();
                 }else{
                     document.getElementById("levelid").innerHTML=data;
                 }
              }
          })
      });
      $('#reportclk').click(function(){
          console.log('report');
          $.ajax({
              type:'get',
              url:'{{URL::to('levelset')}}',
              data:{'level':'Report','roomid':fetchroomId},
              success:function(data){
                  console.log(data);
                if(data == 'reload'){
                     location.reload();
                 }else{
                     document.getElementById("levelid").innerHTML=data;
                 }
              }
          })
      });
      $('#followclk').click(function(){
          console.log('follow');
          $.ajax({
              type:'get',
              url:'{{URL::to('levelset')}}',
              data:{'level':'Follow','roomid':fetchroomId},
              success:function(data){
                  console.log(data);
                if(data == 'reload'){
                     location.reload();
                 }else{
                     document.getElementById("levelid").innerHTML=data;
                 }
              }
          })
      });
      $('#nudgeclk').click(function(){
          console.log('nudge');
          $.ajax({
              type:'get',
              url:'{{URL::to('levelset')}}',
              data:{'level':'Nudge','roomid':fetchroomId},
              success:function(data){
                  console.log(data);
                if(data == 'reload'){
                     location.reload();
                 }else{
                     document.getElementById("levelid").innerHTML=data;
                 }
              }
          })
      });
  });
           
</script>


<script>
 $('.leveldel').click(function(){
     
         var op= $('#leveldel').val();
        
         console.log(op);
        
      });
</script>
<script>
     Window.Echo.private('messagesent-'+ requestmaker)
     .listen('Messagesent',e=>{
        console.log(e);
     });
</script>

@endsection
   