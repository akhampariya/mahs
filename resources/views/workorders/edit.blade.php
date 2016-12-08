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
                                <th><h4>Update Workorder Details</h4>
        </th>
                                </tr></thead></table>
            {!! Form::model($workorder,['method' => 'PATCH','route'=>['workorders.update',$workorder->id]]) !!}

       <!--  <div class="form-group">
            {!! Form::select('tenant_id', $users) !!}            
        </div> -->
        
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
        </div></div></div></div></div></div>
        {!! Form::close() !!}

@stop