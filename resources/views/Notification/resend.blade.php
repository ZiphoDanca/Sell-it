@extends('master')

@section('content')

    {{--<div class="form-group">--}}
    {!! Form::open(['url' => 'groupUser', 'method' => 'post', 'class' => 'form-horizontal' ]) !!}

    <div class="form-group Notification col-md-6 ">

        {!! Form::label('', '') !!}
        <div class="col-sm-offset-8">
            {!! Form::textarea('Message',$notification->Message,['class' => 'form-control input-sm','id' => 'Message','placeholder'=>'Message.','required']) !!}
            @if ($errors->has('Message')) <p class="help-block red">*{{ $errors->first('Message') }}</p> @endif
        </div>
    </div>


        <div class="form-group">
           {{--<div class="col-md-6 col-md-offset-2">--}}
               {{--<div class="col-md-5 " style="margin-top:10px;">--}}
                   {{--<select name="reject_reason" id="reject_reason" class="form-control " required>--}}
                       {{--<option value="0"  selected disabled>-select group-</option>--}}
                       {{--@foreach($groupUsers as $groupUser)--}}
                           {{--<option value="{{$groupUser->id}}" name="group" id="{{$groupUser->id}}" required>{{$groupUser->group}}</option>--}}
                           {{--@if ($errors->has('reject_reason')) <p class="help-block red">*{{ $errors->first('reject_reason') }}</p> @endif--}}
                       {{--@endforeach--}}
                   {{--</select>--}}
               {{--</div>--}}

           {{--</div>--}}
    </div>
    <div class="form-group col-md-offset-8 col-md-6  hidden">
        {!! Form::label(' Users', ' Users', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-offset-8">
            {!! Form::text('userId',NULL,['class' => 'form-control input-sm','id' => 'userId']) !!}
        </div>
    </div>
    <br/>
    <div class="form-group col-md-offset-8 col-md-6 hidden">
        {!! Form::label('Group Users', 'Group Users', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-offset-8 ">
            {!! Form::text('user',NULL,['class' => 'form-control input-sm','id' => 'user']) !!}

        </div>
    </div>

    <br/>
    <br/>
    <br/>
    <br/>

    <div class="form-group ">
        <div class="col-md-offset-4 col-md-4">
            <button type="submit" type="button" class="btn btn-sm">Resend</button>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
@section('footer')
    <script>
        jQuery(document).ready(function($) {
            $("#userId").tokenInput("{!! url('/getUserss')!!}", {tokenLimit: 50})
        });
        jQuery(document).ready(function($) {
            $("#user").tokenInput("{!! url('/getGroup')!!}", {tokenLimit: 1})
        });
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <link href="css/style.css" rel="stylesheet">
@endsection