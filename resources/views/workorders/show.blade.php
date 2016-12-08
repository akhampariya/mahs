@extends('layouts.app')
@section('content')
<div align="center">
    <h3>Workorders Details </h3>
                <div class="bg-info">W/O Raised By - <?php echo ($workorders['createdBy']); ?>
</div>
</div>
<div class="container">
     <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped cds-datatable">
            <tbody>

             <tr class="bg-info">
                    <td class="table-text">Tenant Name</td>
                    <!-- <td class="table-text"> {{ $tenant_name}} </td> -->
                    <td class="table-text"><?php echo ($workorders['tenantname']); ?></td>
                </tr>

                    <!-- <tr class="bg-info">
                     --><td class="table-text">Apt Name</td>
                    <td class="table-text"><?php echo ($aptname); ?></td>
                </tr>

                    <td class="table-text">W/O Description</td>
                    <td class="table-text"><?php echo ($workorders['desc']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">W/O Status</td>
                    <td class="table-text"><?php echo ($workorders['status']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">W/O Expected Date</td>
                    <td class="table-text"><?php echo ($workorders['expecteddate']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">W/O Estimated Cost</td>
                    <td class="table-text"><?php echo ($workorders['estmtdcost']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">W/O Actual Date</td>
                    <td class="table-text"><?php echo ($workorders['actualdate']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">W/O Actual Cost</td>
                    <td class="table-text"><?php echo ($workorders['actualcost']); ?></td>
                </tr>
               

            </tbody>
        </table>
        </div>
    </div>
  </div>
@stop
