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
                                      <th><h4>Update Property Details</h4></th>
                                      </tr>
                                </thead>
                              </table>
                    {!! Form::open(['url' =>'apartments']) !!}
                    
                    <div class="form-group">
                        {!! Form::label('property_name','Apartment Name:') !!}
                        {!! Form::select('id', $props, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tenant_id','Tenant name:') !!}
                        {!! Form::select('tenant_id', $users) !!}
                    </div>
                 <!--    <div class="form-group">
                        {!! Form::label('apt_name','Apartment Name:') !!}
                        {!! Form::text('apt_name',null,['class'=>'form-control']) !!}
                    </div> -->
                    <!-- <div class="form-group">
                        {!! Form::label('id','Apartment No:') !!}
                        {!! Form::text('id',null,['class'=>'form-control']) !!}
                    </div> -->
                    <div class="form-group">
                        {!! Form::label('apt_typ','Apartment Type:') !!}
                        {!! Form::text('apt_typ',null,['class'=>'form-control']) !!}
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