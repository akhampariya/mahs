@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-left">
                        <h4>User Requests</h4></div>
                    <br></div>

                    <div class="panel-body">
                        @if (count($userrequests) > 0)

                        <div class="table-responsive">
                             <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                <tr class="bg-info">
                                  <!--   <th>Id</th> -->
                                    <th>Requester Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    
                                  
                                </tr>

                                </thead>
                                <tbody> <!-- Table Body -->
                                @foreach ($userrequests as $userrequest)

                                <tr>

                                        <td class="table-text">{{ $userrequest->name}}</td>
                                     
                                        <td class="table-text">{{ $userrequest->email }}</td>
                                        
                                        <td class="table-text">{{ $userrequest->message }}</td>

                                     
                                        </tr>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <div class="panel-body"><h4>No User Requests found</h4></div>
                        @endif
                    
                                @if (Auth::check())
                                    @role('admin')
                                        @include('import3')
                    
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