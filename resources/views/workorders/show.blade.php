@extends('layouts.app')
@section('content')
    <div align="center">
    <h3>Workorders Details </h3>
        </div>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
                <tr>
                <td>workorders Description</td>
                <td><?php echo ($workorders['desc']); ?></td>
            </tr>
            <tr>
                <td>workorders Status</td>
                <td><?php echo ($workorders['status']); ?></td>
            </tr>
            <tr>
                <td>workorders Expected Date</td>
                <td><?php echo ($workorders['expecteddate']); ?></td>
            </tr>
            <tr>
                <td>workorders Estimated Cost</td>
                <td><?php echo ($workorders['estmtdcost']); ?></td>
            </tr>
            <tr>
                <td>workorders Actual Date </td>
                <td><?php echo ($workorders['actualdate']); ?></td>
            </tr>
            <tr>
                <td>workorders Actual Cost</td>
                <td><?php echo ($workorders['actualcost']); ?></td>
            </tr>
              </tbody>
        </table>
    </div>
@stop
