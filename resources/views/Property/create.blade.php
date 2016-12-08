@extends('layouts.app')

@section('content')

 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                <h1>Create Property</h1>
                @if (count($errors) > 0)
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

            <div class="form-group">
                <div class="table-responsive">


                    <div class="panel-heading">Please enter information:</div>
                    {!! Form::open(['url' =>'Property']) !!}
                    
                    <div class="form-group">
                        {!! Form::label('apt_no','Apartment Number:') !!}
                        {!! Form::select('apt_no', $users) !!}
                    </div>

                    <div class="from-group">
                        {!! Form::label('property_name','Property Name:') !!}
                        {!! Form::text('property_name',null,['class'=>'from-control']) !!}
                    </div>

                    <div class="from-group">
                        {!! Form::label('adress','Address:') !!}
                        {!! Form::text('adress',null,['class'=>'from-control']) !!}
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

