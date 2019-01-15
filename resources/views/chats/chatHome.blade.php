<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
   
    <link href="{{ asset('chat/app.css') }}" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' =>  auth()->user()
        ]) !!};
        var fetchChatURL = null;
    </script>

   
</head>
<body >
 <script>
   var roomid="{{  $roomId }}";
 </script>   
  @include('partials.nav') 
   @include('partials.second_nav')
  
<div class="container divbox"  id="appchat">
        <div>
            
            <a style="float:right" href="{{url('/home')}}"><i class="fas fa-times"></i></a>
        </div> 

    <div style="float:letf" class="col-md-4 float-left" id="reg">

        <div class="topleftchatdiv" >
            <a class="btn dropdown-toggle" href="#" role="button" id="drop" data-toggle="dropdown" data-toggle="dropdown" aria-expanded="true">
               All conversation
           </a> 
    
            <input type="text" placeholder="Search with name" class="form-controller" id="search" name="search"></input>
            
           

            <div class="dropdown-menu " >
              
                <li class="dropdown-item "  id="unrea" aria-expanded="true" >Unread</li>
                
                
                <hr>
                
                <li class="dropdown-item" href="#">Archive</li>
                <li  class="dropdown-item "  aria-expanded="true" id="sss">Spam</li>
           
                <li class="dropdown-item" id="report" aria-expanded="true">Report</li>
                
                <hr>
                
               
                <div id="lll">

                </div>
                   
                
               
                 
            
            </div>
           
           {{-- spam body --}}
            <div id="spambody" >
    
            </div >
            {{-- unread body --}}
            <div id="unread" >
            
            </div>
            {{--report body --}}
            <div id="reportbody" >
            
            </div>
            {{-- level --}}
            <div id="indeviduallevelsearch">

            </div>
           
            <table class="table table-bordered table-hover text-success" >
           
              
                <tbody id="tbod">
        
                </tbody>
              
            </table>

        </div>
 
 
       
        <ul class="table " style="overflow-y: scroll;height:430px ;width:100%" > 
             
          
                
           
            @foreach($receivers as $receiver)
           
            
                @php
                    $userid = Auth::user()->id;
                    $receiverid = $receiver->id;
                    if($userid==$receiverid){
                        continue;
                    }
               
                    if($receiverid > $userid){
                    $chatRoomId = $userid.','.$receiver->id;
                    }
                    else{
                    $chatRoomId = $receiver->id.','.$userid;
                    }
                    $romid=App\Chatroom::where('chatRoomId',$chatRoomId)->first();
                    // echo $chatRoomId;
                    // continue;
                    // echo $receiver->id;
                    // continue;

                    $romid=$romid->id;
                @endphp
              
                
                
                   
                    @php
                    
                       $messagecont=App\Message::where('RoomId',$romid)
                                                ->where('readWriteStatus','!=',1)
                                                ->where('sender','!=',$userid)
                                                ->count();
                        $message='';
                        if($messagecont>0){
                            $messageunread = App\Message::where('RoomId',$romid)
                                                ->where('readWriteStatus','!=',1)
                                                ->where('sender','!=',$userid)
                                                ->orderBy('created_at','DESC')
                                                ->first();
                        }                     
                        else{
                            $message = App\Message::where('RoomId',$romid)->orderBy('created_at','DSEC')->first();
                            $messageunread=0;
                        }
                        
                   $timestring=' ';
                   //dd($message);
                    if($message!=''){
                         $time = strtotime($message->created_at);
                        $date= date('Y-m-d H:i:s', $time);
                        $date = date_create($date);
                        $nowdate = date("Y-m-d H:i:s");
                        $nowdate = date_create($nowdate);
                        $diff = date_diff($nowdate, $date);
                       
                        if($diff->s > 0 && $diff->i <1  && $diff->h <= 0 && $diff->d <=0 && $diff->m <=0 && $diff->y <=0){
                            $timestring='just now';
                        }elseif ($diff->i >=1  && $diff->h <= 0 && $diff->d <=0 && $diff->m <=0 && $diff->y <=0) {
                        $timestring=$diff->i.'m  ago';
                        }elseif ($diff->i >=1  && $diff->h >= 0 && $diff->d <=0 && $diff->m <=0 && $diff->y <=0) {
                            $timestring=$diff->h.'h    '.$diff->i.'m ago';
                        }elseif($diff->h >= 0 && $diff->d >=0 && $diff->m <=0 && $diff->y <=0){
                            $timestring=$diff->d.'d  '.$diff->h.'h ago';
                        }elseif($diff->d >=0 && $diff->m >=0 && $diff->y <=0){
                            $timestring=$diff->m.'months  '.$diff->d.'days ago';
                        }
                        elseif ($diff->m >=0 && $diff->y >=0) {
                        $timestring=$diff->y.' year '.$diff->m.' months ago';
                        }
                    }

                    if($messageunread){
                         $time = strtotime($messageunread->created_at);
                        $date= date('Y-m-d H:i:s', $time);
                        $date = date_create($date);
                        $nowdate = date("Y-m-d H:i:s");
                        $nowdate = date_create($nowdate);
                        $diff = date_diff($nowdate, $date);
                       
                        if($diff->s > 0 && $diff->i <1  && $diff->h <= 0 && $diff->d <=0 && $diff->m <=0 && $diff->y <=0){
                            $timestring='just now';
                        }elseif ($diff->i >=1  && $diff->h <= 0 && $diff->d <=0 && $diff->m <=0 && $diff->y <=0) {
                        $timestring=$diff->i.'m  ago';
                        }elseif ($diff->i >=1  && $diff->h >= 0 && $diff->d <=0 && $diff->m <=0 && $diff->y <=0) {
                            $timestring=$diff->h.'h  '.$diff->i.'m ago';
                        }elseif($diff->h >= 0 && $diff->d >=0 && $diff->m <=0 && $diff->y <=0){
                            $timestring=$diff->d.' days  '.$diff->h.'h ago';
                        }elseif($diff->d >=0 && $diff->m >=0 && $diff->y <=0){
                            $timestring=$diff->m.' months '.$diff->d.' days ago';
                        }
                        elseif ($diff->m >=0 && $diff->y >=0) {
                        $timestring=$diff->y.' year '.$diff->m.' months ago';
                        }
                    }
                   

                    //echo $timestring;
                    @endphp
                    
                     
                    @if( $messageunread)
                        <li class="chatliststyle"  style="overflow: auto;background:lightgray;">
                            <img style="border-radius: 50%;display:inline" src="{{asset('/uploads/avatars/'.$receiver->avatar)}}" height="50px" width="50px"  alt="{{asset('uploads/avatars/defaultpic.jpg')}}"  >
                            <h3  style="display:inline" @keyup.enter='dataset{{($romid)}}'> 
                            <a class="alink" href="{{url('privateChat/'.$chatRoomId)}}">   {{$receiver->name}}</a>
                            </h3> 
                            <i class="far fa-star time"></i>
                            <i class="time" style=" color:rgb(153, 153, 153);" >{{$timestring}}</i>
                            <div class="divmgs">
                            <h5 class="offset-1 well-sm message_font" style="display:inline;" ><b>{{ $messageunread->message}}</b></h5>
                            <span class="badge badge-success">{{$messagecont}}</span>
                            </div>
                        </li>
                       @elseif($message)
                        <li class="chatliststyle" style="overflow: auto;">
                                <img style="border-radius: 50%;display:inline" src="{{asset('/uploads/avatars/'.$receiver->avatar)}}" height="50px" width="50px" alt="{{asset('uploads/avatars/defaultpic.jpg')}}"  >
                                <h3  style="display:inline" @keyup.enter='dataset{{($romid)}}'> 
                                <a class="alink" href="{{url('privateChat/'.$chatRoomId)}}">   {{$receiver->name}}</a>
                                </h3> 
                                <i class="far fa-star time"> {{$timestring}}</i>
                            
                               <div class="divmgs"> <h5 class="offset-2 message_font" style= "display:inline;" >{{ $message->message}}</h5></div>
                        </li>
                                            
                    @endif
                   
                   
           
          
         
             @endforeach 
            
             
        </ul>

    </div>
  
     @php
       $fullurl=url()->full();
       $dashurl= url('/').'/'.'dashboard';
       //echo $fullurl.'<br>'.$dashurl;
       
      @endphp 
      @if($fullurl == $dashurl)
      <div class="jumbotron col-md-8 text-justify float-right"><h2>Hi..  You don't start chat yet... Let's find someone and starting talking <i class="far fa-smile"></i> </h2> </div>
     
      @endif
     
  
    @yield('content')
    

      

   
</div>
   
    <!-- Scripts -->
    <script type="text/javascript">
         @yield('routes')

    </script>
   
   

   

   
    <script src="{{ asset('chatjs/app.js') }}"></script>
     @yield('script')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
        <script type="text/javascript">

            $('#search').on('keyup',function(){
            
                 $value=$(this).val();
            
                 $.ajax({
            
                type : 'get',
            
                 url : '{{URL::to('search')}}',
            
                 data:{'search':$value},
            
                 success:function(data){
            
                  $('#tbod').html(data);
            
                 }
            
                 });
        
            })
        
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#sss").click(function(){
                $.ajax({
                    type: 'get',
                    data:{'value':'Spam'}, 
                    url : '{{URL::to('defaullevelsearch')}}',
                   // data:{'authid':$userid},
                    success:function(data){
                        console.log(data);
                        $('#spambody').html(data);
                      
                    }
                })
            });
            $("#report").click(function(){
                $.ajax({
                    type: 'get',
                    data:{'value':'Report'},
                    url : '{{URL::to('defaullevelsearch')}}',
                   // data:{'authid':$userid},
                    success:function(data){
                        console.log(data);
                        $('#reportbody').html(data);
                      
                    }
                })
            });
            });
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#drop").click(function(){
                $.ajax({
                    type: 'get',
                    url : '{{URL::to('levelsearch')}}',
                    //data:{'authid':roomid },
                    success:function(data){
                     $('#lll').html(data);
                     //  console.log('success');
                    }
                })
            });
            });
        </script>
        <script>
            
            function indeviduallevelsearch(id){
                console.log(id);
                $.ajax({
                    type:'get',
                    url:'{{url('indeviduallevelsearch')}}',
                    data:{'levelid':id},
                    success:function(data){
                        console.log('success');
                        console.log(data);
                        $('#indeviduallevelsearch').html(data);
                    }
                })
            };
        </script>
        <script type="text/javascript">
        $(document).click(function(){
            $("#spamclose").click(function(){
                $.ajax({
                    type: 'get',
                    url : '{{URL::to('spamsearch')}}',
                    data:{'close':'close'},
                    success:function(data){
                     $('#spambody').html(data);
                     //  console.log('success');
                    }
                })
            });
            });
        </script>
         <script type="text/javascript">
        $(document).ready(function(){
            $("#unrea").click(function(){
                //console.log('unread isie');
                $.ajax({
                    type: 'get',
                    url : '{{URL::to('unreadsearch')}}',
                   data:{'authid':roomid },
                    success:function(data){
                       
                     $('#unread').html(data);
                      // console.log('success');
                    }
                })
            });
            });
        </script>
    
         
     
       
</body>
</html>
