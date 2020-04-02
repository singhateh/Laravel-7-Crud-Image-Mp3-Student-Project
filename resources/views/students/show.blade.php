@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Student Profile') }}</div>
            <!-- <div class="pull-right"> -->
                <a class="btn btn-warning" href="{{ route('students.index') }}"> Return</a>
           
   

    <div class="card-body">
    <div class="row">
         <div class="form-group col-md-6 row">
            <div class="form-group">
                <strong>First Name:</strong>
                {{ $students->firstname }}
            </div>
        </div>
         <div class="form-group col-md-6 row">
            <div class="form-group">
                <strong>Last Name:</strong>
                {{ $students->lastname }}
            </div>
        </div>
         <!-- <div class="form-group col-md-6 row">
            <div class="form-group">
                <strong>Date of Birth:</strong>
                {{ $students->dob }}
            </div>
        </div> -->
         <!-- <div class="form-group col-md-6 row">
            <div class="form-group">
                <strong>dateregistered:</strong>
                {{ $students->dateregistered}}
            </div>
        </div> -->
         <div class="form-group col-md-6 row">
            <div class="form-group">
                <strong>Gender:</strong>
                {{ $students->gender }}
            </div>
        </div>
         <div class="form-group col-md-6 row">
            <div class="form-group">
                <strong>Country:</strong>
                {{ $students->country }}
            </div>
        </div>
        <div class="form-group col-md-6 row">
            <div class="form-group">
                <strong>City:</strong>
                {{ $students->city }}
            </div>
        </div>
        <div class="form-group col-md-6 row">
            <div class="form-group">
                <strong>Address:</strong>
                {{ $students->address }}
            </div>
            </div>

            </div>
            </div>
            </div>
        </div>
        
        
       
    </div>
@endsection