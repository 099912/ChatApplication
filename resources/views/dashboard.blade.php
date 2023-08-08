<x-app-layout>
{{-- <div class="container">
<div class="row">

    @if(count($users)>0)

    {{-- show user --}}
    {{-- <div class="col-md-2">


        <ul class="list-group">

@foreach($users as $user)
@php
    if($user->image!='' && $user->image!=null){
$image=$user->image;

    }
    else{
$image='images/dummy.jpeg';
    }
@endphp

<li class="list-group-item list-group-item-dark cursor-pointer user-list" data-id={{$user->id}}>
    <img src="{{$image}}" alt=""class="user-image"style="width:50px">
{{$user->name}}
{{-- this-status will work in joining adn gettin user id
<b><sup id="{{$user->id}}-status" class="offline-status">offline</sup></b>
</li>

@endforeach
        </ul>



    </div>


{{-- chatt
    <div class="col-md-9">
<h4 class="start-head">click to start chat</h4>

<div class="chat-section">

<div id="chat-container" style="background-color:slategrey;width:100%;height:400px;overflow-y:scroll;margin-top:10px; font-size:25px;">

</div>
<form action="" id="chat-form">
<input type="text" name="message" class='border' id="message" placeholder="write messasge here">
<input type="submit" value="send message" class="btn btn-primary">
</form>


</div>
    </div>
    @endif



    <div class="col-md-12"></div>

</div>
</div>--}}


  {{-- data-toggle="modal" data-target="#deleteChatModal" --}}
  <!-- Modal -->
  <div class="modal fade" id="deleteChatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">delete Chat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="" id="delete-chat-form">
        <div class="modal-body">
        <input type="hidden" name="id" id="delete-chat-id">
        <p>want to delete message?</p>
        <p><b id="delete-message"></b></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">delete</button>
        </div>
    </form>

      </div>
    </div>
  </div>

<div class="container" style="padding-top: 90px;">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list" style="background-color:black ;height:100%;">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0 list-group">



                        @foreach($users as $user)
                        @php
                            if($user->image!='' && $user->image!=null){
                        $image=$user->image;

                            }
                            else{
                        $image='images/dummy.jpeg';
                            }
                        @endphp

                        <li class="clearfix list-group-item cursor-pointer user-list d-flex" data-image={{$image}} data-name={{$user->name}} data-id={{$user->id}}>
                            <div class="imageuser">
                                <img src="{{$image}}" alt=""class="user-image"style="width:50px">
                            </div>
                        <div class="username">{{$user->name}}
                        {{-- {{-- this-status will work in joining adn gettin user id  class="offline-status--}}
                        <b><sup id="{{$user->id}}-status" class="fa fa-circle offline">offline</sup></b>
                        </div></li>

                        @endforeach



                    </ul>
                </div>




                <div class="chat" style="position: relative">
                    <div style=" height: 600px;
                    width:100%;
                    ">
                    <div class="chat-header clearfix" style="background-color:black;">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img id="receiver-image" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 id="receiver"class="m-b-0 "style="color:white;">Aiden Chavez</h6>

                                </div>
                            </div>
                        </div>
                    </div>




{{-- //////////////////////////////////////////////////////////////////////// --}}

                    <div class="chat-history "id="chat-container" style="height:60vh;overflow-y:scroll;margin-top:10px; font-size:25px;">
                        {{-- <div class="chat-container"> --}}
                        <ul class="m-b-0">
                            {{-- <li class="clearfix">
                                <div class="message-data text-right current-user-chat">
                                    <span class="message-data-time">10:10 AM, Today</span>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                </div>
                                <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                            </li>
                            <li class="clearfix">
                                <div class="message-data">
                                    <span class="message-data-time">10:12 AM, Today</span>
                                </div>
                                <div class="c">Are we meeting today?</div>
                            </li>
                            <li class="clearfix">
                                <div class="message-data">
                                    <span class="message-data-time">10:15 AM, Today</span>
                                </div>
                                <div class="message my-message">Project has been already finished and I have results to show you.</div>
                            </li> --}}
                        </ul>

                    </div>


                    <div class="chat-message clearfix">
                        {{-- <form action="" id="chat-form">
                            <input type="text" name="message" class='border' id="message" placeholder="write messasge here">
                            <input type="submit" value="send message" class="btn btn-primary"> --}}

                        <form action="" id="chat-form">
                        <div class="input-group mb-0"
                        style="width: 95%;
                        bottom: 17px;
                        position: absolute;">
                            {{-- <div class="input-group-prepend"> --}}
                                {{-- <span class="input-group-text"><i class="fa fa-send"></i></span> --}}
                            {{-- </div> --}}
                            <input type="text" name="message" id="message" class=" border form-control " placeholder="Enter text here...">
                            <input type="submit" value="send message" class="btn btn-primary">

                        </div>
                    </form>
                    </div>

                {{-- </div> --}}
            </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
