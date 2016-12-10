@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     <!--    <div class="pull-right"> -->
        
                        <div class="table-responsive">
                             <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <tr class="bg-info">
                                <th><h4>Update Property Details</h4>
        </th>
                                </tr></thead></table>
            {!! Form::model($Property,['method' => 'PATCH','route'=>['Property.update',$Property->id]]) !!}


        
        <div class="form-group">
        {!! Form::label('property_name', 'Property Name:') !!}
        {!! Form::text('property_name',null,['class'=>'form-control']) !!}
       
        </div>
        <div class="form-group">
            {!! Form::label('address','Address:') !!}
            {!! Form::text('address',null,['class'=>'form-control']) !!}
        </div>
       
            <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        </div></div></div></div></div></div>
        {!! Form::close() !!}

@stop