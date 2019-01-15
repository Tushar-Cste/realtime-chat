<template >
<div :class="classname">
    <!-- <div v-if="spamedmessageid == 'false'">
        <div v-bind:class="{ spamDisplay: isActive }">
         
           
            <li  :class="classname"> -->
                
                <img v-bind:src="'/../uploads/avatars/' + images" alt="/../uploads/avatars/defaultspic.jpg" style="border-radius: 50%;display:inline;padding:10px;float:left;overflow:hidden;" height="70px" width="70px" />
                <h3 class="sender" style="float:left;display:inline"> {{user}} </h3>
                <h5  style="" id="time">{{time}}</h5>
                <!-- <a class="spanclass"  href="" v-bind:style="{display:spam}"   @click.prevent="tushar(messageid)">spam <i class="fas fa-ban"></i></a> -->
                <p class="messagebody">
                <slot>



                </slot>
                 </p>
            <!-- <p v-if="isActive == 'true'">
                this message hase been spamed. Our security team would like to take it as a serious issue. Ohter person won't see this message..
            </p> -->
            <!-- </li>
        
        </div>
    </div> -->
    <!-- <div v-if="spamedmessageid == 'true'">
        <div v-if="mgssender == 'false'">
            <div class="spamDisplay">
              
                <li  :class="classname">
                <img v-bind:src="'/../image/' + images" alt="/../uploads/avatars/defaultspic.jpg" style="border-radius: 50%;display:inline;padding:10px;float:left;overflow:hidden;" height="70px" width="70px">
                <h3 class="sender" style="float:left;display:inline"> {{user}} </h3>
                <h5 class="time" style="display:inline;" id="time">{{time}}</h5>
                <a class="spanclass"  href="" v-bind:style="{display:spam}"   @click.prevent="tushar(messageid)">spam <i class="fas fa-ban"></i></a>
                <p class="messagebody">
                <slot>

                </slot>
               </p>
                          
                </li>
            
            </div>
        </div>
        <div v-if="mgssender == 'true'">
            <div class="">
              
                <li  :class="classname">
                <img v-bind:src="'/../image/' + images" style="border-radius: 50%;display:inline;padding:10px;float:left" height="70px" width="70px">
                <h3 class="sender" style="float:left;display:inline"> {{user}} </h3>
                <h5 class="time" style="display:inline;" id="time">{{time}}</h5>
                <a class="spanclass"  href="" v-bind:style="{display:spam}"   @click.prevent="tushar(messageid)">spam <i class="fas fa-ban"></i></a>
                <p class="messagebody">
                <slot>

                </slot>
               </p>
                          
                </li>
            
            </div>
        </div> -->
    <!-- </div> -->
</div>
</template>

<script>
    export default {
         data: function () {
                return {
                    isActive:'',
                   
                }
        },
    	props:[
    		'color',
            'user',
            'time',
            'messageid',
            'spam',
            'report',
             'images',
            'mgssender',
            'spamedmessageid',
            
    	],
    	computed:{
    		classname(){
    			return this.color;
    		},
    		badgeclass(){
    			return "badge-"+this.color;
            },
            
           
        },
       methods:{
          
            tushar(id1){
              console.log(id1);
              
               axios.post('/chatSpam/'+id1,{
                  
               })
               .then(response=>{
                  // console.log(response.data.spamClass);

                   this.isActive=response.data.spamClass;
                   
               })
               .catch(error=>{
                   console.log(error);
               });

           }
       },
      
       
       
        mounted() {
            
            console.log(this.spamedmessageid);
            
        }
    }
</script>



