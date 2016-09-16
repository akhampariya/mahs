@extends('app')
@section('content')
    <h1>Create New Investment</h1>
    {!! Form::open(['url' => 'investments']) !!}

    <div class="form-group">
        {!! Form::select('customer_id', $customers) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category', 'Category:') !!}
        {!! Form::text('category',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Acquired_Value', 'Acquired Value:') !!}
        {!! Form::text('Acquired_Value',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Acquired_Date', 'Acquired Date:') !!}
        {!! Form::text('Acquired_Date',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Recent_Value', 'Recent Value:') !!}
        {!! Form::text('Recent_Value',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Recent_Date', 'Recent Date:') !!}
        {!! Form::text('Recent_Date',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop
