@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard - Role based landing page</div>
                <div class="panel-body">
                 You are logged in!
                
				
				     @if (Auth::check())
                    <!-- Left Side Of Navbar -->
                @role('admin')
                <h1> You are logged in admin <h2>
				@endrole
				@role('pmanager')
           <h1> You are logged in pmgr <h2>
				@endrole
            @role('bmanager')
           <h1> You are logged in bmgr <h2>
				@endrole
            
			@endif			
				</div>
            </div>

        </div>
    </div>
</div>
@endsection
