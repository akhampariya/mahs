@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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

                        <div class="table-responsive">
                             <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <tr class="bg-info">
                                  <!--   <th>Id</th> -->
                                    <th>Tenant Name</th>
                                    <!-- <th>Tenant ID</th> -->
                                    <th>Created By</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Expected Date</th>
                                    <th>Expected Cost</th>
                                    <th>Actual Date</th>
                                    <th>Actual Cost</th>
                                    @if (Auth::check())
                                        @role('admin')<th colspan="3">Actions</th>@endrole
                                         @endif
                                </tr>

                                </thead>
                                <tbody> <!-- Table Body -->
                                @foreach ($workorders as $workorder)

                                <tr>


                                   <!--      <td class="table-text"><div><a href="{{url('workorders',$workorder->id)}}">{{ $workorder->id }}</a></div></td> -->
                                        <td class="table-text">{{ $workorder->tenantname}}</td>
                                     <!--    <td class="table-text">{{ $workorder->tenant_id}}</td> -->
                                        <td class="table-text">{{ $workorder->createdBy }}</td>
                                        <td class="table-text"><a href="{{url('workorders',$workorder->id)}}">{{ $workorder->desc }}</a></td>
                                        <td class="table-text">{{ $workorder->status }}</td>
                                        <td class="table-text">{{ $workorder->expecteddate }}</td>
                                        <td class="table-text">{{ $workorder->estmtdcost }}</td>
                                        <td class="table-text">{{ $workorder->actualdate }}</td>
                                        <td class="table-text">{{ $workorder->actualcost }}</td>
                                    <!--     <td class="table-text"><a href="{{url('workorders',$workorder->id)}}">Read</a></td>
                                     -->
                                        @if (Auth::check())
                                        @role('admin')
                                        <td class="table-text"><a href="{{route('workorders.edit',$workorder->id)}}">Update</a></td> 
                                        
                                        <td class="table-text">
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['workorders.destroy', $workorder->id]]) !!}

                                        {!! Form::submit('Delete') !!}
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
                    
                                @if (Auth::check())
                                    @role('admin')
                                        @include('import')
                    
                                    @endrole
                                @endif

                            </form>
                        </div>                        
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