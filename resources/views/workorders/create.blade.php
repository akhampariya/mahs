@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Create Work Order</h1>
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
					 {!! Form::open(['url' => 'workorders', 'class' => 'form-horizontal']) !!}
                    {{-- @include('common.errors')
                        @include('common.flash') --}}
                          {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('footer')
    <script>
        $(document).ready(function($) {
            $('select').select2();
        });

        function validateOnSave() {
            var rc = true;
            if ($("select#sb_id").val() === "") {
                alert("Please select a Type");
                rc = false;
            } else if ($("input#x_number").val() === "") {
                alert("Please input a X-number");
                rc = false;
            }
            return rc;
        }

    </script>

@endsection
--}}
