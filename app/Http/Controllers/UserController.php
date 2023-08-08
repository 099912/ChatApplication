<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\Group;
use App\Events\ChatMessage;
use App\Events\GroupMessage;
use App\Events\MessageDelete;
use App\Models\GroupChat;
use App\Models\Member;

class UserController extends Controller
{
    //
    public function showDashboard(){
        $users=User::whereNotIn('id',[auth()->user()->id])->get();
        return view('dashboard',compact('users'));


    }
    public function saveChat(Request $request){
        try{
            $chat=Chat::create([
                'sender_id'=>$request->sender_id,
                'receiver_id'=>$request->receiver_id,
                'message'=>$request->message,

            ]);

            event(new ChatMessage($chat));

            return response()
            ->json(['success' =>true,'data'=>$chat]);
        }
        catch(\Exception $e){
            return response()
            ->json(['success' =>false, 'msg' =>$e->getMessage()]);
        }
    }



    public function loadChat(Request $request){
        try{

           $chats = Chat::where(function($query) use ($request){
            $query->where('sender_id','=',$request->sender_id)
            ->orWhere('sender_id','=',$request->receiver_id);})
            ->where(function($query) use ($request){
            $query->where('receiver_id','=',$request->sender_id)
            ->orWhere('receiver_id','=',$request->receiver_id);
            })->get();


            return response()->json(['success' =>true,'data'=>$chats]);
        }
        catch(\Exception $e){
            return response()
            ->json(['success' =>false, 'msg' =>$e->getMessage()]);
        }
    }

    public function deleteChat(Request $request){
        try{


            // event(new ChatMessage($chat));
            Chat::where('id',$request->id)->delete();

            event(new MessageDelete($request->id));

            return response()
            ->json(['success' =>true,'msg' => 'deleted']);
        }
        catch(\Exception $e){
            return response()
            ->json(['success' =>false, 'msg' =>$e->getMessage()]);
        }
    }

    public function loadgroups(){
       $groups= Group::where('creator_id',auth()->user()->id)->get();
        return view('groups',compact('groups'));

    }




    public function createGroup(Request $request){
        try{
            $imagename='';
            if($request->image){
            $imagename=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imagename);
            $imagename='images/'.$imagename;
            }

            Group::insert([
                'creator_id' => auth()->user()->id,
                'name' => $request->name,
                'image'=>$imagename,
                'join_limit'=>$request->join_limit
            ]);
            return response()
            ->json(['success' =>true,'msg' =>$request->name .'created successfully']);
        }
        catch(\Exception $e){
            return response()
            ->json(['success' =>false, 'msg' =>$e->getMessage()]);
        }

    }

    public function getMembers(Request $request){

        try
{
        $users=User::with(['groupUser'=>function($query) use($request)
        {$query->where('group_id',$request->group_id);
        }])->whereNotIn('id',[auth()->user()->id])->get();


            return response()->json(['success' =>true,'data' =>$users]);
        }
        catch(\Exception $e){
            return response()
             ->json(['success' =>false, 'msg' =>$e->getMessage()]);
        }

    }
///add member


    public function addMember(Request $request){
    try
    {
            if(!isset($request->members)){

                return response()->json(['success' =>true,'msg' =>'select fields']);


            }

            else if(count($request->members) > (int)$request->join_limit){

                return response()->json(['success' =>true,'msg' =>"you cannot select more than".$request->join_limit."members"]);

            }
         else{
                Member::where('group_id',$request->group_id)->delete();
                $data=[];
                $x=0;
                foreach($request->members as $users){
                    $data[$x]=['group_id'=>$request->group_id, 'user_id'=>$users];
                    $x++;
                }

                Member::insert($data);



         return response()->json(['success' =>true,'msg' =>'members added successfully']);

            }
            }
            catch(\Exception $e){
                return response()
                 ->json(['status' =>false, 'msg' =>$e->getMessage()]);
            }

        }

        public function deleteGroup(Request $request){

            try
            {
                // dd($request->id);
                Group::where('id',$request->id)->delete();
                Member::where('group_id',$request->id)->delete();

                return response()->json(['success' =>true]);
            }
            catch(\Exception $e){
                return response()
                 ->json(['success' =>false, 'msg' =>$e->getMessage()]);
            }

        }

        //show creatorgroup  and joined group
        public function groupChats(){
            $groups=Group::where('creator_id',auth()->user()->id)->get();

            $joined=Member::with('getGroup')->where('user_id',auth()->user()->id)->get();
            // dd($joined);
            // $data = [
            //     'groups' => $groups,
            //     'joined' => $joined,
            // ];
            return view('groupChat',compact(['groups','joined']));
        }





///share through link

        public function shareGroup($id){
            $groupData=Group::where('id',$id)->first();
            if($groupData){
                $totalMember=Member::where('group_id',$id)->count();
                $available=$groupData->join_limit - $totalMember;
                $isOwner=$groupData->creator_id==auth()->user()->id ? true : false;
                $isJoined=Member::where(['group_id'=>$id,'user_id'=> auth()->user()->id])->count();
                return view('shareGroup',
                compact(['isJoined','available','groupData','isOwner','totalMember']));


            }
            else{
                return view("404");
            }
        }

//added in group

        public function joinGroup(Request $request){


            try
            {
                Member::insert([
                    "group_id" => $request->group_id,
                    "user_id" => auth()->user()->id,
                ]);

                return response()->json(['success' =>true,'msg' =>"Successfully joined group"]);
            }
            catch(\Exception $e){
                return response()
                 ->json(['success' =>false, 'msg' =>$e->getMessage()]);
            }

        }

        //save group chat

        public function saveGroupChat(Request $request){
            try{
                $chat=GroupChat::create([
                    'sender_id'=>$request->sender_id,
                    'group_id'=>$request->group_id,
                    'message'=>$request->message,

                ]);

                event(new GroupMessage($chat));

                return response()
                ->json(['success' =>true,'data'=>$chat]);
            }
            catch(\Exception $e){
                return response()
                ->json(['success' =>false, 'msg' =>$e->getMessage()]);
            }
        }


        public function loadGroupChats(Request $request){
            try
            {
                $chats=GroupChat::where('group_id',$request->group_id)->get();

                return response()->json(['success' =>true,'chats' =>$chats]);
            }
            catch(\Exception $e){
                return response()
                 ->json(['success' =>false, 'msg' =>$e->getMessage()]);
            }
        }
}
