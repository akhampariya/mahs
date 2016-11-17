@extends('layouts.app')
@section('content')
    
    <h3>Update Workorder Details</h3>
           

    {!! Form::model($workorder,['method' => 'PATCH','route'=>['workorders.update',$workorder->id]]) !!}
       <div class="form-group">
        {!! Form::label('desc', 'Workorder Desc:') !!}
        {!! Form::text('desc',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Workorder status:') !!}
        {!! Form::text('status',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('expecteddate', 'Workorder expecteddate:') !!}
        {!! Form::text('expecteddate',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('estmtdcost', 'Workorder estmtdcost:') !!}
        {!! Form::text('estmtdcost',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('actualdate', 'Workorder actualdate:') !!}
        {!! Form::text('actualdate',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('actualcost', 'Workorder actualcost:') !!}
        {!! Form::text('actualcost',null,['class'=>'form-control']) !!}
    </div>

        <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

@stop