@extends('layouts.app')

@section('content')



@if ($errors->any())

<div class="alert alert-danger">

    <strong>hahaha!</strong> you have an error check your inputs!.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Student') }}</div>

                <div class="card-body">
                <form action="{{ route('students.update',  $students->id) }}" method="POST">

                            @csrf
                            @method('PUT')
                        <div class="form-group col-md-6 row">
                            <label for="first name"
                                class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="firstname" class="form-control" value="{{$students->firstname}}" autofocus>

                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="Last Name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-8">
                                <input type="text" name="lastname" class="form-control" value="{{$students->lastname}}" autofocus>

                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                        <div class="col-md-8">
                                <input type="text" class="form-control" name="gender" value="{{$students->gender}}">
                                    <select name="" id="">
                                        <option value="" @if(!empty($students->gender) && $students->gender==$students) selected @endif>{{ $students }}></option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6 row">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                         <div class="col-md-8">

                                <input type="text" class="form-control" name="country" value="{{$students->country}}">

                            </div>

                        </div>
                        <div class="form-group col-md-6 row">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                         <div class="col-md-8">
                                <input class="form-control" name="city" value="{{$students->city}}">

                            </div>

                        </div>
                        <div class="form-group col-md-6 row">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                         <div class="col-md-8">
                         <textarea class="form-control" style="height:100px" name="address" >{{$students->address}}</textarea>
                            </div>

                        </div>
                        <div class="form-group md-6">
                            <!-- <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button> -->
                  <a style="margin-left:100px;" class="btn btn-lg btn-warning" href="{{ route('students.index') }}"> Return</a>
                <button style="margin-left:100px;" type="submit" class="btn btn-lg btn-primary">Submit</button>
                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection