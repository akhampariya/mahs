@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     <!--    <div class="pull-right"> -->
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                    </div>
                    @endif

                        <div class="table-responsive">
                             <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                      <tr class="bg-info">
                                      <th><h4>Enter W/O Details</h4></th>
                                      </tr>
                                </thead>
                              </table>
                   <!--  <div class="panel-heading">Please enter information:</div> -->
                    {!! Form::open(['url' =>'workorders']) !!}
                    
                    <div class="form-group">
                        {!! Form::label('tenant_id','Tenant name:') !!}
                        {!! Form::select('tenant_id', $users) !!}
                    </div>

                    <div class="from-group">
                        {!! Form::label('desc','Description:') !!}
                        {!! Form::text('desc',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('status','Status:') !!}
                        {!! Form::text('status',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('expecteddate','Expected Date:') !!}
                        {!! Form::text('expecteddate',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('estmtdcost','Expected Cost:') !!}
                        {!! Form::text('estmtdcost',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('actualdate','Actual Date:') !!}
                        {!! Form::text('actualdate',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="from-group">
                        {!! Form::label('actualcost','Actual Cost:') !!}
                        {!! Form::text('actualcost',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
          {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>


                        </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
          {!! Form::close() !!}
@endsection



@section('footer')
    <style>
        .table td { border: 0px !important; }
        .tooltip-inner { white-space:pre-wrap; max-width: 400px; }
    </style>

    <script>
        $(document).ready(function() {
            $('table.cds-datatable').on( 'draw.dt', function () {
                $('tr').tooltip({html: true, placement: 'auto' });
            } );

            $('tr').tooltip({html: true, placement: 'auto' });
        } );
    </script>
@endsection
