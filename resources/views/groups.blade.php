<x-app-layout>
    <div class="container">
<h2 style="font-size:30px;color:black;"><b>Groups</b></h2>
<br><br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createGroupModel">
    Create Group
  </button>

    <table class="table table-dark">
        <thead>
          <tr>
            <th>S.NO</th>
            <th>Image</th>
            <th>Name</th>
            <th>limit</th></th>
            <th>Members</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group)
          <tr>
            <td>{{$group->id}}</td>
            <td><img src="{{$group->image}}"alt={{$group->name}} width="100px" height=100px> </td>
            <td>{{$group->name}}</td>
            <td>{{$group->join_limit}}</td>
            <td>
                 <a style="cursor:pointer" class="addMember"
                 data-limit="{{$group->join_limit}}"
                 data-id="{{$group->id}}"
                 data-toggle="modal"
                 data-target="#memberModel"
                  href="#">Members</a>
                </td>
            <td>
        <i class="fa fa-trash deleteGroup" aria-hidden="true"
        data-id="{{$group->id}}"  data-name="{{$group->name}}" data-toggle="modal"
        data-target="#deleteGroupModel"></i>
    <a class="copy cursor-pointer" data-id="{{$group->id}}">
        <i class="fa fa-copy" ></i></a>

    </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  <!-- Modal -->
  <div class="modal fade" id="createGroupModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" id="createGroup">
        <div class="modal-body">
        <input type="text" name="name" placeholder="Enter group Name" required class="w-100 mb-2">
        <input type="file" name="image"  required class="w-100 mb-2">
        <input type="number" name="join_limit" min="1"  placeholder="Enter user limit" required class="w-100 mb-2">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  {{-- member modal --}}
  <div class="modal fade" id="memberModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Members</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" id="add-member-form">
        <div class="modal-body">
        <input type="hidden" name="group_id" id="add-group-id"  class="w-100 mb-2">
        <input type="hidden" name="join_limit" id="add-limit" class="w-100 mb-2">
        {{-- <input type="number" name="join_limit" min="1"  placeholder="Enter user limit" required class="w-100 mb-2"> --}}

        <table class="table table-dark">
            <thead>
              <tr>
                <th>Select</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                <td colspan="2">
                    <div class="addMemberTable">
                        <table class="table addMembersInTable" style="background-color: black">

                        </table>


                    </div>

                </td>
                </tr>
            </tbody>
        </table>



        </div>
        <div class="modal-footer">
            <span id="add-member-error"></span>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add member</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  {{-- delete group modal --}}
  <div class="modal fade" id="deleteGroupModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">delete group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" id="delete-group-form">
        <div class="modal-body">
        <input type="hidden" name="id" id="delete-group-id"  class="w-100 mb-2">
        {{-- <input type="number" name="join_limit" min="1"  placeholder="Enter user limit" required class="w-100 mb-2"> --}}
            <p >want to delete<b id="group-name"></b></p>
        </div>
        <div class="modal-footer">
            <span id="add-member-error"></span>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete Group</button>
        </div>
    </form>
      </div>
    </div>
  </div>

</div>

    </x-app-layout>
