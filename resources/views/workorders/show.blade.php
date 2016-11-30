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
                    <td class="table-text">Created By</td>
                    <td class="table-text"><?php echo ($workorders['createdBy']); ?></td>
                </tr>

               <tr>
                    <td class="table-text">Tenant Name</td>
                    <!-- <td class="table-text"> {{ $tenant_name}} </td> -->
                    <td class="table-text"><?php echo ($workorders['tenantname']); ?></td>
                </tr>

              
                    <td class="table-text">workorders Description</td>
                    <td class="table-text"><?php echo ($workorders['desc']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">workorders Status</td>
                    <td class="table-text"><?php echo ($workorders['status']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">workorders Expected Date</td>
                    <td class="table-text"><?php echo ($workorders['expecteddate']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">workorders Estimated Cost</td>
                    <td class="table-text"><?php echo ($workorders['estmtdcost']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">workorders Actual Date </td>
                    <td class="table-text"><?php echo ($workorders['actualdate']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">workorders Actual Cost</td>
                    <td class="table-text"><?php echo ($workorders['actualcost']); ?></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
  </div>
@stop
