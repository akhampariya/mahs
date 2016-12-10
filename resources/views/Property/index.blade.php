@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('Property/create') }}" method="GET">{{ csrf_field() }}
                                 @if (Auth::check())
                                        @role('admin')
                                        <button type="submit" id="create-Property" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                                         @endrole
                                         @endif

                            </form>
                        </div>
                        <div><h4>Property List</h4></div>
                    </div>
                    <div class="panel-body">
                        @if (count($Property) > 0)

                        <div class="table-responsive">
                             <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <tr class="bg-info">
                                  <!--   <th>Id</th> -->
                                    <th>Property Name</th>
                                    <!-- <th>Tenant ID</th> -->
                                <!--     <th>Apartment Number</th> -->
                                    <th>Address</th>
                                      @if (Auth::check())
                                        @role('admin')<th colspan="3">Actions</th>@endrole
                                         @endif
                                </tr>
                                </tr>

                                </thead>
                                <tbody> <!-- Table Body -->
                                @foreach ($Property as $Property)

                                <tr>


                                       <td class="table-text">{{ $Property->property_name}}</td>
                                     <!--    <td class="table-text">{{ $Property->tenant_id}}</td> -->
                                      <!--   <td class="table-text"><a href="{{url('Property',$Property->id)}}">{{ $Property->apt_no }}</a></td> -->
                                        <td class="table-text">{{ $Property->address }}</td>
                                       @if (Auth::check())
                                        @role('admin')
                                        <td class="table-text"><a href="{{route('Property.edit',$Property->id)}}">Update</a></td> 
                                        
                                        <td class="table-text">
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['Property.destroy', $Property->id]]) !!}

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
                            <div class="panel-body"><h4>No Property Records found</h4></div>
                        @endif
                    
                                @if (Auth::check())
                                    @role('admin')
                                    @include('importp')
                    
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