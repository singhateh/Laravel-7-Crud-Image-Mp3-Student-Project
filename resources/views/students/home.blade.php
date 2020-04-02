@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
              <marquee behavior="" direction=""><h2 style="color:red">Laravel 5.8 CRUD  from scratch step by step</h2></marquee>  
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" id="create-new-user" > Create New Student</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-hover table-dark">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <!-- <th>dateregistered</th> -->
            <!-- <th>Date of Birth</th> -->
            <th>Gender</th>
            <th>Country</th>
            <th>City</th>
            <th>Address</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $key =>  $student)
        <tr>
            <td>{{++$key}}</td>
            <td>{{ $student->firstname}}</td>
            <td>{{ $student->lastname }}</td>
            <!-- <td>{{ $student->dateregistered }}</td> -->
            <td>{{ $student->gender }}</td>
            <!-- <td>{{ $student->dob }}</td> -->
            <td>{{ $student->country }}</td>
            <td>{{ $student->city }}</td>
            <td>{{ $student->address }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                   
                    @csrf
                  <form action="{{route('students.destroy', $student->id)}}" method="post">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @method('DELETE')

                    </form>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="modal fade" id="students-add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-notify modal-danger" id="notify" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="userCrud-delete-Modal" style="color:white"></h4>
        </div>
        <div class="modal-body">
        <span id="message_errors"></span>
            <form id="user-delete-Form" name="userForm" class="form-horizontal" enctype="multipart/form-data">
            @csrf
           {{ method_field('PUT')}}
           <label class="col-md-12">Are you sure you  want to Delete this?</label>
             </div>
        <div class="modal-footer">
            <input type="hidden" name="action" id="action" />
            <button type="button" class="btn btn-warning " id="btn-cancel" value="cancel">Cancel
            </button>
            <input type="submit" name="btn-delete" class="btn btn-danger" id="btn-delete" value="Delete Student">
           
        </div>
        </form>
    </div>
  </div>
</div>

<script>
  $('#create-new-user').click(function () {
    $('#userCrudModal').text("Add New User ");
        $('#students-add-modal').modal('show');
    });

</script>
  
      
@endsection

