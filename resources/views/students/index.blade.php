<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel 5.8 First Ajax CRUD Application</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/css/mdb.min.css" rel="stylesheet">


<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 
 <style>
   .container{
    padding: 0.5%;
   } 
</style>
</head>
<body>

 
<div class="container">
    <h2 style="margin-top: 12px; color:white; text-align:center" class="alert btn-danger"><marquee behavior="" direction="">Laravel 6.0 CRUD Application -Step by Step</marquee> </h2><br>
    <div class="row">
        <div class="col-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
         @endif
          <a href="javascript:void(0)" class="btn btn-dark-green  " style="margin-left:85%" id="create-new-user">Add New User</a> 
          <table class="table table-bordered" id="laravel_crud">
           <thead style="background:black; color:white; border-redius:2px;">
              <tr>
                 <th>#</th>
                 <!-- <th>Image</th> -->
                 <th class="text-center">Name</th>
                 <th class="text-center">Surname</th>
                 <th class="text-center">Gender</th>
                 <th class="text-center">Country</th>
                 <th class="text-center" >City</th>
                 <th class="text-center" >Address</th>
                 <td class="text-center" colspan="2">Action</td>
              </tr>
           </thead>
           <tbody id="users-crud">
              @foreach($students as $key => $student)
              <tr id="user_id_{{ $student->id }}">
                 <td>{{++$key}}</td>
                 <!-- <td><a href="#"><img src="/photos/{{ $student->img }}" style="width:100px;height:80px; border-radius:5px;"></a></td> -->
                 <td class="text-center">{{ $student->firstname }}</td>
                 <td class="text-center">{{ $student->lastname }}</td>
                 <td class="text-center">{{ $student->gender }}</td>
                 <td class="text-center">{{ $student->country }}</td>
                 <td class="text-center">{{ $student->city }}</td>
                 <td class="text-center">{{ $student->address }}</td>
                
                 <td>
                 <!-- --------------------------------Here is the Show button functions Start Here---------------------------------------------- -->
                 <a data-toggle="modal" data-student_id="{{ $student->id }}" class="btn btn-sm btn-secondary" data-target="#student-crud-show-modal"
                  data-firstname="{{ $student->firstname }}" data-lastname="{{ $student->lastname }}" data-gender="{{ $student->gender }}"
                  data-country="{{ $student->country }}"data-city="{{ $student->city }}"data-address="{{ $student->address }}" >Show</a>
                  <!-- -------------------------------------Ends Here-------------------------------------------------------------------------------------- -->
                
                 <!-- --------------------------------Here is the Edit button functions Start Here---------------------------------------------- -->
                 <a data-toggle="modal" data-student_id="{{ $student->id }}" class="btn btn-sm btn-info" data-target="#student-crud-edit-modal"
                  data-firstname="{{ $student->firstname }}" data-lastname="{{ $student->lastname }}" data-gender="{{ $student->gender }}"
                  data-country="{{ $student->country }}"data-city="{{ $student->city }}"data-address="{{ $student->address }}" >Edit</a>
                  <!-- -------------------------------------Ends Here-------------------------------------------------------------------------------------- -->
                
                 <!-- --------------------------------Here is the Delete button functions Start Here---------------------------------------------- -->

                  <a data-toggle="modal" data-student_id="{{ $student->id }}" class="btn btn-sm btn-danger " data-target="#student-crud-delete-modal">Delete</a></td>
                  <!-- -------------------------------------Ends Here-------------------------------------------------------------------------------------- -->
              </tr>
              @endforeach
           </tbody>
          </table>
          {{ $students->links() }}
       </div> 
    </div>
</div>

<!-- ------------------------------------------------STUDENT ADD MODAL AREA------------------------------------------------------ -->

<div class="modal fade right" id="ajax-crud-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-notify modal-success modal-lg " id="notify" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="userCrudModal" style="color:white; font:bold"></h4>
        </div>
        <div class="modal-body">
        <span id="message_errors"></span>
            <form method="POST" action="{{ route('students.store') }}" id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
            @csrf
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">First and last name</span>
                </div>
                <input autocomplete="false" name="hidden" type="text" style="display:none;">
                <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="" maxlength="50"  autocomplete="off" focus require>
                <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" value="" maxlength="50"  autocomplete="off">
                </div>
                <br>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Country and City</span>
                </div>
                <input type="text" class="form-control" name="country" placeholder="Enter Country" value="" maxlength="50"  autocomplete="off">
                <input type="text" class="form-control" name="city" placeholder="Enter City" value="" maxlength="50"  autocomplete="off">
                </div>
                <br>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Address and Gender</span>
                </div>
                <textarea type="text" class="form-control" name="address" placeholder="Enter Address" value="" maxlength="500"  autocomplete="off"></textarea>
                <input type="text" name="gender" class="form-control col-sm-3" placeholder="Enter Gender" value="" maxlength="10"  autocomplete="off">
                </div>
        <div class="modal-footer">
            <input type="hidden" name="action" id="action" />
            <button type="button" class="btn btn-warning " data-dismiss="modal" id="btn-cancel" value="cancel">Cancel
            </button>
            <button type="submit" name="btn-save" class="btn btn-success" id="btn-save" >Save Student</button>
           
        </div>
        </form>
    </div>
  </div>
</div>
</div>

<!-- ------------------------------------------------STUDENT EDIT MODAL AREA------------------------------------------------------ -->


<div class="modal fade left" id="student-crud-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-notify modal-info modal-lg" id="notify" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="userCrud-edit-Modal" style="color:white; font:bold"></h4>
        </div>
        <div class="modal-body">
        <span id="message_errors"></span>
            <form method="POST" action="{{ route('students.update','alagie')}}" id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">First and last name</span>
                </div>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" value="" maxlength="50" validate>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" value="" maxlength="50" validate>
                </div>
                <br>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Country and City</span>
                </div>
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="" maxlength="50">
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="" maxlength="50">
                </div>
                <br>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Address and Gender</span>
                </div>
                <textarea type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="" maxlength="500"></textarea>
                <input type="text" name="gender" id="gender" class="form-control col-sm-3" placeholder="Enter Gender" value="" maxlength="10" >
                </div>
             <div class="modal-footer">
            <input type="hidden" name="student_id" id="student_id" value="" />
            <button type="button" class="btn btn-warning " data-dismiss="modal" >Cancel</button>
            <button type="submit" name="btn-save" class="btn btn-info" id="btn-save" >Update Student</button>
           
        </div>
        </form>
    </div>
  </div>
</div>
</div>

<!-- ------------------------------------------------STUDENT VIEW MODAL AREA------------------------------------------------------ -->
<div class="modal fade left" id="student-crud-show-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-notify modal-warning modal-lg" id="notify" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="userCrud-edit-Modal" style="color:white; font:bold"></h4>
        </div>
        <div class="modal-body">
        <span id="message_errors"></span>
            <form method="POST" action="{{ route('students.show','alagie')}}" id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <h2 class="text-center">Student Profile</h2>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">First and last name</span>
                </div>
                <input readonly="" type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" value="" maxlength="50">
                <input readonly="" type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" value="" maxlength="50">
                </div>
                <br>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Country and City</span>
                </div>
                <input readonly="" type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="" maxlength="50">
                <input readonly="" type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="" maxlength="50">
                </div>
                <br>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Address and Gender</span>
                </div>
                <textarea  readonly="" type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="" maxlength="500"></textarea>
                <input readonly="" type="text" name="gender" id="gender" class="form-control col-sm-3" placeholder="Enter Gender" value="" maxlength="10" >
                </div>
             <div class="modal-footer">
            <input type="hidden" name="student_id" id="student_id" value="" />
            <button type="button" class="btn btn-warning " data-dismiss="modal" >Cancel</button>
           
        </div>
        </form>
    </div>
  </div>
</div>
</div>


<!-- ------------------------------------------------STUDENT DELETE MODAL AREA------------------------------------------------------ -->

<div class="modal fade left" id="student-crud-delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-notify  modal-danger" id="notify" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="userCrud-edit-Modal" style="color:white; font:bold"></h4>
        </div>
            <form method="POST" action="{{ route('students.destroy','alagie')}}" id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
        <div class="modal-body" style="background:gray">
        <label class="col-md-12"><h5 style="color:white">Are you sure you  want to Delete Student?</h5> <span style="color:yellow; font-size:20px; font-weight:bold"></span></label>
        <input type="hidden" name="student_id" id="student_id" value="" />
        </div>
        <div class="modal-footer">
             <button type="button" class="btn btn-warning " data-dismiss="modal">No/Cancel</button>
            <button type="submit" name="btn-delete" class="btn btn-danger" id="btn-delete" value="">Yes/Confirm Delete Student</button>
        </div>
        </form>
    </div>
  </div>
</div>
</div>

</body>
<!-- ------------------------------------------------USER JQUERY SCRIPT AREA------------------------------------------------------ -->

<script>

    

    $('#create-new-user').click(function () {
    $('#userCrudModal').text("Add New User ");
        $('#ajax-crud-modal').modal('show');
    });

    $('#btn-cancel').click(function () {
        $('#ajax-crud-modal').modal('hide');
    });
    
// --------------------Student-Edit--------Start Here-------------------
     $('#student-crud-edit-modal').on('show.bs.modal', function(event){
    // $('#student-crud-edit-modal').modal('show');
    // $('#userCrud-edit-Modal').text("Edit Student Details ");
    // $('body').removeClass('modal-open');
   
var button = $(event.relatedTarget)
var firstname = button.data('firstname')
var lastname = button.data('lastname')
var gender = button.data('gender')
var country = button.data('country')
var city = button.data('city')
var address = button.data('address')
var student_id = button.data('student_id')

var modal = $(this)

modal.find('.modal-title').text('Hello Edit');
modal.find('.modal-body #firstname').val(firstname);
modal.find('.modal-body #lastname').val(lastname);
modal.find('.modal-body #gender').val(gender);
modal.find('.modal-body #country').val(country);
modal.find('.modal-body #city').val(city);
modal.find('.modal-body #address').val(address);
modal.find('.modal-body #student_id').val(student_id);
	// $fetch = $(this).closest('tr');
	// var data = $fetch.children("td").map(function(){
	// 	return $(this).text();

	// }).get();

    // console.log(data);
	// $('#user_id').val(data[0]);
	// $('#firstname').val(data[1]);
	// $('#lastname').val(data[2]);
	// $('#gender').val(data[3]);
	// $('#country').val(data[4]);
	// $('#city').val(data[5]);
	// $('#address').val(data[6]);
	
  });

//   $('#btn-edit-cancel').click(function () {
//         $('#userCrud-edit-Modal').modal('hide');
//     });
   
  

  // --------------------Student-Show--------Start Here-------------------
  $('#student-crud-show-modal').on('show.bs.modal', function(event){
        
        var button = $(event.relatedTarget)
        var firstname = button.data('firstname')
        var lastname = button.data('lastname')
        var gender = button.data('gender')
        var country = button.data('country')
        var city = button.data('city')
        var address = button.data('address')
        var student_id = button.data('student_id')

        var modal = $(this)

        modal.find('.modal-title').text('Hello Edit');
        modal.find('.modal-body #firstname').val(firstname);
        modal.find('.modal-body #lastname').val(lastname);
        modal.find('.modal-body #gender').val(gender);
        modal.find('.modal-body #country').val(country);
        modal.find('.modal-body #city').val(city);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #student_id').val(student_id);
  });

    // --------------------Student-Delete--------Start Here-------------------
    $('#student-crud-delete-modal').on('show.bs.modal', function(event){
        
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')

        var modal = $(this)

        modal.find('.modal-body #student_id').val(student_id);
  });
  
</script>

</html>