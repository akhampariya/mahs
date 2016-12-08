@extends('layouts.app')
@section('content')
<div align="center">
    <h3>Property Details </h3>
</div>
<div class="container">
     <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped cds-datatable">
            <tbody>


               <tr>
                    <td class="table-text">Property Name</td>
                    <td class="table-text"><?php echo ($Property['property_name']); ?></td>
                </tr>

              
                    <td class="table-text">Apartment Number</td>
                    <td class="table-text"><?php echo ($Property['apt_no']); ?></td>
                </tr>
        
                <tr>
                    <td class="table-text">Property Address</td>
                    <td class="table-text"><?php echo ($Property['adress']); ?></td>
                </tr>
           </tbody>
        </table>
        </div>
    </div>
  </div>
@stop
