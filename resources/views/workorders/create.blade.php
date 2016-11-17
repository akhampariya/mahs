@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Create Work Order</h1>

                @if (count($errors) > 0)
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif


                <div class="panel panel-default">
                    <div class="panel-heading">Please enter information:</div>
                    {!! Form::open(['url' =>'workorders']) !!}
                    <div class="from-group">
                        {!! Form::label('desc','Description:') !!}
                        {!! Form::text('desc',null,['class'=>'from-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('status','Status:') !!}
                        {!! Form::text('status',null,['class'=>'from-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('expecteddate','Expected Date:') !!}
                        {!! Form::text('expecteddate',null,['class'=>'from-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('estmtdcost','Expected Cost:') !!}
                        {!! Form::text('estmtdcost',null,['class'=>'from-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('actualdate','Actual Date:') !!}
                        {!! Form::text('actualdate',null,['class'=>'from-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('actualcost','Actual Cost:') !!}
                        {!! Form::text('actualcost',null,['class'=>'from-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Save',['class' => 'btn btn-primary form-control']) !!}
                    </div>
                   <div class="panel-body">
					 
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

