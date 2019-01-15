/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import Vue from "vue";
// import VueDragTree from "vue-drag-tree";
// import "vue-drag-tree/dist/vue-drag-tree.min.css";
// import cncVueTree from "cnc-vue-jstree";

// Vue.use(VueDragTree);

// require("./bootstrap");

// window.Vue = require("vue");

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// Vue.component("test", require("./components/Test.vue"));
// Vue.component("test2", require("./components/Test2.vue"));
// Vue.component("cnc-vue-jstree", cncVueTree);
// // Vue.component("vue-drag-tree", VueDragTree);
// // Vue.component("vddl-list", Vddl);

// new Vue({
//     el: "#app"
// });
require('./bootstrap');



window.Vue = require('vue');
//file for scroll
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

//file for notification
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {
    timeout: 5000
})




Vue.component('message', require('./components/message.vue'));
// Vue.component("test", require("./components/Test.vue"));
// Vue.component("test2", require("./components/Test2.vue"));


//  const app=new Vue({
// 	el: '#reg',

// render: h => h(App),
// });

const app = new Vue({
    el: '#appchat',
    data: {
        message: '',
        check: '',
        time: 0,
        utc: 0,
        line: ' ',
        levelss: [],
        res: '',
        customlevels: [],
        selected: ' ',
        k:'',
        chat: {
            messages: [],
            user: [],
            color: [],
            time: [],
            messageid: [],
            spam: [],
            report: [],
            onlineUserId: [],
            mgssender: [],
            spamedmessageid: [],
            images: [],

        },
        typing: '',
        online: ' ',
        iid: 0
    },
    methods: {
        send(id) {
             this.k = this.dateformate();
             console.log(this.k);
            if (this.message.length != 0) {
                this.chat.messages.push(this.message);
                this.chat.spamedmessageid.push('false');
                this.chat.mgssender.push('true');
                this.chat.user.push('Me');
                this.chat.color.push("mesuccess");
               
                this.chat.time.push(this.k);
                this.chat.spam.push('none');
                this.chat.report.push('none');
                this.time = this.getTime();
                this.utc = this.getTimezone();
                //console.log(this.time);

                axios.post('/send/' + id, {

                        message: this.message,
                        time: this.time,
                        utc: this.utc,

                    })
                    .then(response => {
                        this.message = '';

                        this.chat.messageid.push(response.data.id);
                        this.chat.images.push(response.data.image);

                    })
                    .catch(error => {
                        console.log(error);
                    });
            }

        },
        setlevel(id) {



            console.log(this.selected);
            console.log(roomid);
            if (this.selected != '') {
                this.levelss.push(this.selected);
            }
            axios.post('/levelset', {

                    roomid: id,
                    levels: this.selected,
                })
                .then(response => {
                    //this.selected='';
                   // console.log(response.data);
                    this.levelss.push(response.data.level);

                })
                .catch(error => {
                    console.log(error);
                });



        },
        dateformate() {
            var d = this.getTime();

            axios.post('/timeformate', {
                    untime: d,
                })
                .then(response => {
                    this.res = response.data.time;
                    //console.log(response.data.time);
                })
                .catch(error => {
                    console.log(error);
                });
            //console.log(this.res);
            return this.res;

        },


        getTime() {

            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var second = currentTime.getSeconds();
            var year = currentTime.getFullYear();
            var month = currentTime.getMonth();
            var date = currentTime.getDate();

            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            //console.log(month);
            let tim = hours + ':' + minutes + ':' + second + '   ' + date + '/' + month + '/' + year;

            return tim;

        },
        getTimezone() {
            var currentTime = new Date();
            var utc = currentTime.getTimezoneOffset();
            return utc;

        },
        getOldMessages() {

            axios.post('/getOldMessage', {
                    room: fetchroomId,
                    me: requestmaker,
                    time: this.getTime(),
                    utc: this.getTimezone(),
                })
                .then(response => {
                    console.log(response.data);
                    this.chat.messages = response.data.messages;
                    this.chat.color = response.data.color;
                    this.chat.time = response.data.time;
                    this.chat.user = response.data.user;
                    this.chat.messageid = response.data.messageid;
                    this.chat.images = response.data.image;
                    this.chat.spam = response.data.spam;
                    this.chat.report = response.data.report;
                    this.chat.spamedmessageid = response.data.spamedmessageid;
                    this.line = response.data.receiverOnline;
                    this.chat.mgssender = response.data.mgssender;
                    this.cont = response.data.cont;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getOldLevel() {
            axios.post('/getOldLevel', {
                    roomid: fetchroomId,


                })
                .then(response => {
                    this.levelss = response.data.levels;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        setLogedInUserTime() {
            var dd = new Date();
            var nn = dd.getTimezoneOffset();
            console.log(nn);
            axios.post('/setuserlocalutc', {
                    utcdiff: nn,
                })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });

        }

    },
    created() {

    },

    watch: {
    message() {
        Echo.private('chat-roomId-' + fetchroomId)
            .whisper('typing', {
                name: this.message
            });
    },

    },
    mounted() {
        this.getOldMessages();
      //  this.getOldLevel();
        var m = this.getTime();
         this.dateformate();
        this.setLogedInUserTime();

        // console.log(requestmaker);
        Echo.private('chat-roomId-' + fetchroomId)
            .listen('ChatEvent', (e) => {
                //  console.log(e);
                this.chat.messages.push(e.message.message);
                this.chat.user.push(e.user);
                this.chat.color.push("warning");
                this.chat.time.push(this.getTime());
                this.chat.messageid.push(e.message.id);
                this.chat.spam.push('block');
                this.chat.spamedmessageid.push('false');
                this.chat.mgssender.push('false');
                this.chat.images.push(e.image);

            })
            .listenForWhisper('typing', (e) => {
                if (e.user != '')
                    this.typing = "  typing.....";
                else
                    this.typing = "";
            });



    }
});
