@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('apartments/create') }}" method="GET">{{ csrf_field() }}
                                 @if (Auth::check())
                                        @role('admin')
                                        <button type="submit" id="create-apartment" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                                         @endrole
                                         @endif

                            </form>
                        </div>
                        <div><h4>Apartments</h4></div>
                    </div>
                    <div class="panel-body">
                        @if (count($apartments) > 0)

                        <div class="table-responsive">
                             <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <tr class="bg-info">
                                  <!--   <th>Id</th> -->
                                    <th>Tenant Name</th>
                                    <th>Apartment Name</th>
                                    <th>Apartment No</th>
                                    <th>Apartment Type</th>
                                    <!-- <th>Description</th>
                                    <th>Status</th>
                                    <th>Expected Date</th>
                                    <th>Expected Cost</th>
                                    <th>Actual Date</th>
                                    <th>Actual Cost</th> -->
                                   @if (Auth::check())
                                        @role('admin') <th colspan="3">Actions</th>@endrole
                                         @endif
                                </tr>

                                </thead>
                                <tbody> <!-- Table Body -->
                                @foreach ($apartments as $apartment)

                                <tr>
                                        @foreach ($users as $user) 
                                        @if ($user->id == $apartment->tid)
                                            
                                        <td class="table-text">{{ $user->name}}</td>
                                        
                                        <!-- <td class="table-text">{{ $user->id}}</td> -->
                                        
                                        <td class="table-text">{{ $apartment->apt_name}}</td>
                                        <td class="table-text">{{ $apartment->id}}</td>
                                        <td class="table-text">{{ $apartment->apt_typ }}</td>
                                  
                                        @if (Auth::check())
                                        @role('admin')
                                        <td class="table-text"><a href="{{route('apartments.edit',$apartment->id)}}">Update</a></td>
                                        <td class="table-text">
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['apartments.destroy', $apartment->id]]) !!}

                                        {!! Form::submit('Delete') !!}
                                        {!! Form::close() !!}
                                        </td> @endrole
                                         @endif
                                         @endif
                                        @endforeach</tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <div class="panel-body"><h4>No apartment Records found</h4></div>
                        @endif
                    
                                @if (Auth::check())
                                    @role('admin')
                                        @include('import2')
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