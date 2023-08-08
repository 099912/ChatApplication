<x-app-layout>
<div class="container">

    <div class="row clearfix">
    @if(count($groups)>0 || count($joined)>0)
        <div class="col-lg-12" style="margin-top: 90px;">
            <div class="card chat-app">

                <div id="plist" class="people-list" style="background-color:black ;height:100%;">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>


                    <ul class="list-unstyled chat-list mt-2 mb-0 list-group">

                    @foreach($groups as $group)

                <li class="clearfix list-group-item cursor-pointer groups-list" data-name={{$group->name}} data-id={{$group->id}}>

                    <img src="/{{$group->image}}" alt=""class="user-image"style="width:50px">
                {{$group->name}}

                {{-- this-status will work in joining adn gettin user id --}}
                {{-- <b><sup id="{{$group->id}}-status" class="offline-status">offline</sup></b> --}}
                            </li>

                        @endforeach

                        @foreach($joined as $group)

                        <li class="clearfix list-group-item cursor-pointer groups-list" data-id={{$group->getGroup->id}} data-name={{$group->getGroup->name}}>

                             <img src="/{{$group->getGroup->image}}" alt=""class="user-image"style="width:50px">
                        {{$group->getGroup->name}}
                        {{-- this-status will work in joining adn gettin user id --}}
                        {{-- <b><sup id="{{$group->id}}-status" class="offline-status">offline</sup></b> --}}
                        </li>

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
                                    <h6 id="group-name" class="m-b-0 " style="color:white;">Aiden Chavez</h6>
                                </div>
                            </div>
                        </div>
                    </div>




{{-- //////////////////////////////////////////////////////////////////////// --}}

                    <div class="chat-history" id="group-chat-container" style="height:60vh;overflow-y:scroll;margin-top:10px; font-size:25px;">

                        <ul class="m-b-0">

                        </ul>

                    </div>

                    <div class="chat-message clearfix">


                        <form action="" id="group-chat-form">
                            <hr style="margin-top:10px;">
                            <div class="input-group mb-0"
                            style="width: 95%;
                            bottom: 17px;
                            position: absolute;">

                            <input type="text" name="message" id="group-message" class=" border form-control " placeholder="Enter text here...">
                            <input type="submit" value="send message" class="btn btn-primary">

                        </div>
                    </form>

                    </div>

                </div>

            </div>
            @endif
            </div>
        </div>
    </div>
    </div>
    </x-app-layout>
