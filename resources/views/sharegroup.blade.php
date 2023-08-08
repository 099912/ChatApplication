<x-app-layout>
    <div class="container mt-4">

        <img src="/{{$groupData->image}}" width="200px" height="200px" >
        <p class="new"><b>{{$groupData->name}}</b></p>
        <p class="new"><b>Total-Member:</b> {{$totalMember }}</p>

        @if($available !=0)
            <p class="new">Avability for <b> {{$available}}</b>Member only</p>
        @endif

        @if($isOwner)
            <p class="new">you are cretor of this group </p>
        @elseif($isJoined>0)
        <p class="new">
            already joined
        </p>
        @elseif ($available ==0)
        <p class="new">Full</p>
        @else
        <button class="btn btn-primary join-now" data-id="{{$groupData->id}}"> Join Now</button>
        @endif










    </div>
    </x-app-layout>
