@extends('layouts.app')

@section('content')

 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                <h1>Add Apartments</h1>
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
                    {!! Form::open(['url' =>'apartments']) !!}
                    
                    <div class="form-group">
                        {!! Form::label('property_name','Property:') !!}
                        {!! Form::select('id', $props) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tenant_id','Tenant name:') !!}
                        {!! Form::select('tenant_id', $users) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('apt_name','apt_name:') !!}
                        {!! Form::text('apt_name',null,['class'=>'from-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('apt_typ','apt_typ:') !!}
                        {!! Form::text('apt_typ',null,['class'=>'from-control']) !!}
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

