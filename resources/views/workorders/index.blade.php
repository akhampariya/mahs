@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Work Order</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('workorders/create') }}" method="GET">{{ csrf_field() }}
                                 @if (Auth::check())
                                        @role('admin')
                                        <button type="submit" id="create-workorder" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                                         @endrole
                                         @endif


                            </form>
                        </div>
                        <div><h4>Work Order List</h4></div>
                    </div>
                    <div class="panel-body">
                        @if (count($workorders) > 0)
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                    <tr class="bg-info">
                                    <th>Id</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Expected Date</th>
                                    <th>Expected Cost</th>
                                    <th>Actual Date</th>
                                    <th>Actual Cost</th>
                                    <th colspan="3">Actions</th>
                                </tr>

                                </thead>
                                <tbody> <!-- Table Body -->
                                @foreach ($workorders as $workorder)
                                    <tr>
                                        <td>{{ $workorder->id }}</td>
                                        <td>{{ $workorder->desc }}</td>
                                        <td>{{ $workorder->status }}</td>
                                        <td>{{ $workorder->expecteddate }}</td>
                                        <td>{{ $workorder->estmtdcost }}</td>
                                        <td>{{ $workorder->actualdate }}</td>
                                        <td>{{ $workorder->actualcost }}</td>
                                        <td><a href="{{url('workorders',$workorder->id)}}" class="btn btn-primary">Read</a></td>

                                        @if (Auth::check())
                                        @role('admin')
                                        <td><a href="{{route('workorders.edit',$workorder->id)}}" class="btn btn-warning">Update</a></td> 
                                        
                                        <td>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['workorders.destroy', $workorder->id]]) !!}

                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        </td> @endrole
                                         @endif
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <div class="panel-body"><h4>No workorder Records found</h4></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
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