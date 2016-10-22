@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> {{$user->roles->first()->display_name}} - Dashboard</div>
                <div class="panel-body">
                    <dl>
   <dt>Definition list</dt>
   <dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
commodo consequat.</dd>
   <dt>Lorem ipsum dolor sit amet</dt>
   <dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
commodo consequat.</dd>
</dl>
					<table>
	<thead>
		<tr>
			<th>Heading 1 </th>
			<th>Heading 2 </th>
			<th>Heading 3 </th>
			<th>Heading 4 </th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Data 1 </td>
			<td>Data 2 </td>
			<td>Data 3 </td>
			<td>Data 4 </td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
