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
                                <th><h4>Update Apartment Details</h4>
        </th>
                                </tr></thead></table>

            {!! Form::model($apartment,['method' => 'PATCH','route'=>['apartments.update',$apartment->id]]) !!}



        <div class="form-group">
           {!! Form::label('tenant_name', 'Tenant Name') !!}
            {{ $tenant_name}}     
        </div>
        
        <div class="form-group">
        {!! Form::label('Apt Name', 'Apt Name') !!}
        {!! Form::text('apt_name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('apt_typ', 'apt_typ:') !!}
            {!! Form::text('apt_typ',null,['class'=>'form-control']) !!}
        </div>
        
            <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        </div></div></div></div></div></div>
        {!! Form::close() !!}

@stop