<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- <script
        src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script>
            var sender_id=@json(auth()->user()->id);
            var receiver_id;
            </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

   <style>

main{
background-color:lightgrey;
}
.username{
    margin: auto;
}
.cursor-pointer{
    cursor:pointer;
}
.border-list{
    border-radius:40%;
}
.border{
    width:80%;
    border:2px solid black;
}
.btn-primary{
    background-color:midnightblue;
    color:white;
}
.chat-section{
    display:none;
}
.offline-status{
    color:red;
}
.online-status{
    color:green;
}
.current-user-chat{
text-align: right;
margin:10px;
color:black;
font-size:20px;
border-style: solid;
/* display: inline-block; */
/* color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative */
}
.distance-user-chat{
text-align:left;
margin:10px;
color:black;
font-size:20px;
}
#message{
    margin-top:10px;
    border:4px black;
    font-size:15px;
}
.fa-trash{
    color:black;
    size:2px
}
.btn-danger{
    background-color:red;
}
.new{
    color:white;
}
/* member css */
.addMemberTable{
    overflow-y: scroll;
    height:100px;
    width:100%;
}
 #add-member-error{
color:red;
}

.group-chat-section{
    display:none;
}
  </style>

{{-- dashboard --}}
<style>

body{
    background-color: #f4f7f6;
    margin-top:20px;
}
.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 30px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}
@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #c9daeb;
        left: -400px;
        display: none
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}

</style>


    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')


            <main>
                {{ $slot }}
            </main>
        </div>






        {{-- code for chat --}}
        <script>
        var global_group_id;

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
$(document).ready(function(){
    $('.user-list').click(function(){

        //to clear chat container when user click on another user
        $('#chat-container').html('');

        var getUserId= $(this).attr('data-id');
        var getUserName= $(this).attr('data-name');
        var getUserImage= $(this).attr('data-image');
        receiver_id = getUserId;
        receiver_name=getUserName;
        receiver_image=getUserImage;

        // $('.start-head').hide();
        $('#receiver').html(receiver_name);
        $('#receiver-image').html(receiver_image);

        loadOldChats();
    });

// save chat work

$('#chat-form').on('submit',function(e){
e.preventDefault();

var message = $('#message').val();

$.ajax({

url:"/save/chat",
type:"POST",
data:{sender_id:sender_id,receiver_id:receiver_id,message:message},

success:function(res){

    if(res.success) {

    $('#message').val('');
    let chat= res.data.message;

    let html=`
    <div class="current-user-chat" id='`+res.data.id+`-chat'>
    <h3>
        <span class="message other-message">`+chat+`</span>
        <i class="fa fa-trash" aria-hidden="true" data-id='`+res.data.id+`' data-toggle="modal" data-target="#deleteChatModal"></i>
        </h3>
    </div>`;

    $('#chat-container').append(html);
    scrollChat();

}
else{
    alert(res.msg);
}

//success message closing
}
//ajax closing
});


// }
});

$(document).on('click','.fa-trash',function(){
    var id = $(this).attr('data-id');
    $('#delete-chat-id').val(id);
    $('#delete-message').text($(this).parent().text());
});

$('#delete-chat-form').on('submit',function(e){
e.preventDefault();

var id=  $('#delete-chat-id').val();

$.ajax({

url:"/delete/chat",
type:"post",
data:{id:id},
success:function(res){

    alert(res.msg);
    if(res.success){
        $('#'+id+'-chat').remove();
        $('#deleteChatModal').modal('hide');
    }

}


});


});

});////document ready end

// //loadoldchat function
function loadOldChats(){

$.ajax({

    url:"load/chat",
    type:"POST",
    data:{sender_id:sender_id,receiver_id:receiver_id},
    success:function(res){

    if(res.success) {

    let chats=res.data;
    let html='';

    for(let i=0; i<chats.length; i++){
    let addClass='';
        if(chats[i].sender_id == sender_id){

            addClass='current-user-chat';
        }
        else{
            addClass='distance-user-chat';
        }
        // if(chats[i].sender_id == sender_id){

        //     addClass='message other-message float-right current-user-chat';
        // }
        // else{
        //     addClass='message my-message distance-user-chat';
        // }

    html+=`<div class="`+addClass+`" id='`+chats[i].id+`-chat'>
    <h3>
        <span class="message other-message ">`+chats[i].message+`</span>`;

        if(chats[i].sender_id == sender_id){
        html+=`<i class="fa fa-trash" aria-hidden="true" data-id='`+chats[i].id+`' data-toggle="modal" data-target="#deleteChatModal"></i>`;
    }
        html+=`
       </h3>
    </div>`;

    }

    $('#chat-container').append(html);
    scrollChat();
    }

    else{
    alert(res.msg);
    }
}
});
}

///scroll function
function scrollChat(){
    $('#chat-container').animate({
        scrollTop:$('#chat-container').offset()
        .top+$('#chat-container')[0].scrollHeight
    },0);

}

// neccesary to run echo using window .onload
window.onload = function(){
Echo.join('status-update').here((users)=>{
// console.log(users);
//this tells which user is logged in
for(let x=0; x<users.length; x++){
if(sender_id !=users[x]['id']){
$('#'+users[x]['id']+'-status').removeClass('fa fa-circle offline');
$('#'+users[x]['id']+'-status').addClass('fa fa-circle online');
$('#'+users[x]['id']+'-status').text('Online');
}
}

}).joining((user)=>{
// console.log(user.name+' joined');
//this can tell other user which is logged in
$('#'+user.id+'-status').removeClass('fa fa-circle offline');
$('#'+user.id+'-status').addClass('fa fa-circle online');
$('#'+user.id+'-status').text('Online').addClass('fa fa-circle online');


}).leaving((user)=>{
    // console.log(user.name+' leaved');
//this can tell other user which is leaved
$('#'+user.id+'-status').addClass('fa fa-circle offline');
$('#'+user.id+'-status').removeClass('fa fa-circle online');
$('#'+user.id+'-status').text('Offline').addClass('fa fa-circle offline');

}).listen('UserStatus',(e)=>{
console.log(e);
});

// distance user chat

Echo.private('broadcast-message')
.listen('.getChatMessage',(data)=>{

   if(sender_id == data.chat.receiver_id && receiver_id == data.chat.sender_id ) {
    let html=`
    <div class="distance-user-chat" id='`+data.chat.id+`-chat'>
<h3 class="message other-message">`+data.chat.message+`</h3>
</div>`;
    $('#chat-container').append(html);
    scrollChat();

   }
});

//delete mesage
Echo.private('message-deleted')
.listen('MessageDelete',(data)=>{

    $('#'+data.id+'-chat').remove();


});

Echo.private('broadcast-group-message')
.listen('.getGroupChatMessage',(data)=>{
    // console.log(data);

   if(sender_id != data.chat.sender_id && global_group_id == data.chat.group_id ) {
    let html=`
    <div class="distance-user-chat" id='`+data.chat.id+`-chat'>
<h3 class="message my-message">`+data.chat.message+`</h3>
</div>`;
    $('#group-chat-container').append(html);
    scrollGroupChat();

   }
});
}

////Group script
$(document).ready(function(){

    $('#createGroup').on('submit',function(e){
    e.preventDefault();

    $.ajax({

    url:"create/group",
    type:"POST",
    data:new FormData(this),
    contentType: false,
    cache:false,
    processData:false,

    success:function(res){
        alert(res.msg);
        if(res.success){
            location.reload();
        }
    }



    });

    });

});//document end here

///memeber script

function scrollGroupChat(){
    $('#group-chat-container').animate({
        scrollTop:$('#group-chat-container').offset()
        .top+$('#group-chat-container')[0].scrollHeight
    },0);

}
///member script
$(document).ready(function () {
  $('.addMember').click(function () {
    var id = $(this).attr('data-id');
    var limit = $(this).attr('data-limit');
    // console.log(limit);
    $('#add-group-id').val(id);
    $('#add-limit').val(limit);


 $.ajax({
      url: "get/members",
      type: "POST",
      data: { group_id: id },
      success: function (res) {
        console.log(res);
        if (res.success) {

              var users = res.data;
          var html="" ;

          for (let i = 0; i < users.length; i++) {

            let isGroupMemberChecked ='';
            if(users[i]['group_user']!=null){
                isGroupMemberChecked="checked";
            }
            html += `
              <tr>
                <td>
                  <input type="checkbox" name="members[]" value="` + users[i]['id'] + `" `
                  +isGroupMemberChecked+`
                  />
                </td>
                <td>
                  ` + users[i]['name'] + `
                </td>
              </tr>`;
          }

          $('.addMembersInTable').html(html); // <-- Corrected this line

        } else {
          alert(res.msg);
        }
      }});


  }); ///click end here

 $('#add-member-form').submit(function(e){
    e.preventDefault();


 var formData=$(this).serialize();
//  console.log(formData);
$.ajax({

    url:"save/members",
    type: "POST",
    data: formData,
    success: function(res){
    if(res.success){
    $('#memberModal').modal('hide');
    $('#add-member-form')[0].reset();
    alert(res.msg);

}
else{
    $('#add-member-error').text(res.msg);
    setTimeout(function(){
        $('#add-member-error').text('');

    },3000)
}




}//success end here




}); //ajax ending

});

$('.deleteGroup').click(function(){

    $('#delete-group-id').val($(this).attr('data-id'));
    $('#group-name').text($(this).attr('data-name'));

});

$('#delete-group-form').submit(function(e){

    e.preventDefault();

    var formData=$(this).serialize();
    $.ajax({

      url: "/delete-group",
      type: "POST",
      data: formData,
      success: function (res) {
        console.log(res);
        if (res.success) {
            location.reload();
        }
        else{
            alert(res.msg);
        }
    }

        });

});

//copy link
$('.copy').click(function(){
$(this).prepend('<span class="copied_text">Copied</span>');

setTimeout(function(){
    $('.copied_text').remove();
},2000);

var group_id =$(this).attr('data-id');
var url= window.location.host+'/share-group/'+group_id;
var temp=$("<input>");
$('body').append(temp);
temp.val(url).select();
document.execCommand('copy');

temp.remove();

});

$('.join-now').click(function(){


$(this).text('wait');
$(this).attr('disabled', 'disabled');

var group_id=$(this).attr('data-id');


$.ajax({

    url:"/join-group",
    type:"post",
    data:{group_id:group_id},
    success:function(res){
        alert(res.msg);
        if(res.success){
            location.reload();
        }
        else{
            $(this).text('join now');
            $(this).removeAttr('disabled');
        }
    }


});

});

////group chat started

$('.groups-list').click(function(){

var gId = $(this).attr('data-id');
global_group_id =gId;
console.log(global_group_id);

var groupName = $(this).attr('data-name');
$('#group-name').html(groupName);
//to clear chat container when user click on another user
$('#group-chat-container').html('');

loadGroupChats();
console.log('global_group_id in click event:', global_group_id);

});



//groupchat script implement
$('#group-chat-form').on('submit',function(e){
e.preventDefault();

var message = $('#group-message').val();

$.ajax({

url:"/save-group/chats",
type:"POST",
data:{sender_id:sender_id, group_id:global_group_id,message:message},
success:function(res){
console.log(res);
    if(res.success) {

    $('#group-message').val('');
    let chat = res.data.message;

    let html=`
    <div class="current-user-chat" id='${res.id}-chat'>
    <h3>
        <span class="message other-message">${chat}</span>

    </div>`;

    $('#group-chat-container').append(html);
    scrollGroupChat();

}
else{
    alert(res.msg);
}

//success message closing
}
//ajax closing
});


// }
});///form ending


});


// }); //document end here


function loadGroupChats(){

$('#group-chat-container').html('');
$.ajax({

url:'/load-group/chats',
type: 'POST',
data:{group_id:global_group_id},
success: function(res){

if(res.success){
    let chats=res.chats;
    let html="";

    for(let i=0;i<chats.length;i++){
        let addClass="distance-user-chat";

        if(chats[i].sender_id == sender_id){
            addClass="current-user-chat";
        }



         html+=`
    <div class="`+addClass+`" id='`+chats[i].id+`-chat'>
<h3 class="message other-message">`+chats[i].message+`</h3>
</div>`;

    }

    $('#group-chat-container').append(html);
    scrollGroupChat();

}

else{
    alert(res.msg);
}

}



});



}
       </script>
        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
