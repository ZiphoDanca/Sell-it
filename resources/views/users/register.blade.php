@extends('master')
@section('content')
<ol class="breadcrumb hidden-xs">
    <li><a href="{{url('/master')}}">Home</a></li>
    <li class="active">Registration Form</li>
</ol>
<h4 class="page-title">USERS</h4>

<!-- Basic with panel-->
<div class="block-area" id="basic">
    <h3 class="block-title">Registration Form</h3>
    <div class="tile p-15">
        {!! Form::open(['url' => 'createUser', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"registrationForm" ]) !!}

        <div class="form-group">
            {!! Form::label('Name', 'Name', array('class' => 'col-md-2 control-label')) !!}
            <div class="col-md-6">
                {!! Form::text('name',NULL,['class' => 'form-control input-sm','id' => 'name', "onfocus"=>"geolocate()", 'required']) !!}
                @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name')}}</strong></span>
                @endif
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('Surname', 'Surname', array('class' => 'col-md-2 control-label')) !!}
            <div class="col-md-6">
                {!! Form::text('surname',NULL,['class' => 'street_number form-control input-sm','id' => 'surname' , 'required']) !!}
                @if ($errors->has('surname'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('surname')}}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('Gender', 'Gender', array('class' => 'col-md-2 control-label')) !!}
            <div class="col-md-6">
                {!! Form::select('gender',['0' => 'Select/All','Male' => 'Male','Female' => 'Female'],0,['class' => 'form-control' ,'id' => 'gender']) !!}
                @if ($errors->has('gender'))
                    <span class="help-block"><strong>{{ $errors->first('gender')}}</strong></span>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('Cellphone', 'Cellphone', array('class' => 'col-md-2 control-label')) !!}
            <div class="col-md-6">
                {!! Form::text('cellphone',NULL,['class' => 'locality form-control input-sm','id' => 'cellphone' , 'required']) !!}
                @if ($errors->has('cellphone'))
                    <span class="help-block"><strong>{{ $errors->first('cellphone')}}</strong></span>
                @endif
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('Email', 'Email', array('class' => 'col-md-2 control-label')) !!}
            <div class="col-md-6">
                {!! Form::text('email',NULL,['class' => 'administrative_area_level_1 form-control input-sm','id' => 'email', 'required']) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('Password', 'Password', array('class' => 'col-md-2 control-label')) !!}
            <div class="col-md-6">
                {!! Form::text('password',NULL,['class' => 'administrative_area_level_1 form-control input-sm','id' => 'password','type'=>"password", 'required']) !!}
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label(' Confirm Password', 'Confirm Password', array('class' => 'col-md-2 control-label')) !!}
            <div class="col-md-6">
                {!! Form::text('confirm_password',NULL,['class' => 'administrative_area_level_1 form-control input-sm','id' => 'confirm_password',  'type'=>"password",'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
                <button type="submit" id='submitMemberForm' class="btn btn-info btn-sm m-t-10">SUBMIT FORM</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
    @endsection

