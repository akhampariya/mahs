@extends('layouts.app')
@section('content')
<div align="center">
    <h3>Workorders Details </h3>
</div>
<div class="container">
     <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped cds-datatable">
            <tbody>
                <tr class="bg-info">
                <tr>
                    <td class="table-text">Tenant Name</td>
                    <td class="table-text"> {{ $tenant_name}} </td>
               
                </tr>

                    <td class="table-text">Apt name</td>
                    <td class="table-text"> {{ $apartment->apt_name}} </td>
                </tr>    
             
                    <td class="table-text">Apt Type</td>
                    <td class="table-text">{{ $apartment->apt_typ}}</td>
                </tr>
        
               

            </tbody>
        </table>
        </div>
    </div>
  </div>
@stop
