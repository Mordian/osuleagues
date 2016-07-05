@extends('layout')

@section('title', 'osu!leagues')

@section('content')
	
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h3>osu leagues is an alternative ranking system for osu!</h3>

			<p>Based on League of Legends, players are assigned into a league based on their PP.</p>
			<p></p>

			<h4>Check your league: </h4>

			<div class="col-sm-6">
				<form method="POST" action="/placement" onsubmit="formSubmit()">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Username">
					</div>

					<div class="form-group">
						<select class="form-control" name="mode" id="">
							<option value="0">Standard</option>
							<option value="1">Taiko</option>
							<option value="2">Catch the Beat</option>
							<option value="3">Mania</option>
						</select>
					</div>
					<input type="submit" id="placement-button" class="btn btn-site" value="Check my league">
				</form>
			</div>
			@if (count($errors))
				<div class="col-sm-offset-6 site-background" style="padding: 15px; margin-top: 20px;">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</div>
			@endif
		</div>
	</div>
</div>

<div class="container margin-top">
	<div class="row">
		<div class="col-sm-12">
			<h3>Peak the Leagues</h3>
			
			<div class="col-sm-4">
				<ul class="list-unstyled">
					<li>
						<h4><a href="#leaguesContainer" onclick="lookupLeagues(0)" class="site-color site-link site-decoration">Standard</a></h4>
					</li>
					<li>
						<h4><a href="#leaguesContainer" onclick="lookupLeagues(1)" class="site-color site-link site-decoration">Taiko</a></h4>
					</li>
					<li>
						<h4><a href="#leaguesContainer" onclick="lookupLeagues(2)" class="site-color site-link site-decoration">Catch the Beat</a></h4>
					</li>
					<li>
						<h4><a href="#leaguesContainer" onclick="lookupLeagues(3)" class="site-color site-link site-decoration">Mania</a></h4>
					</li>
				</ul>
			</div>

			<div id="leaguesContainer" class="col-sm-4 collapse">
				<h4 class="site-color"><span id="leagueName"></span> leagues</h4>
				<span id="leagues">
					
				</span>
			</div>
		</div>
	</div>
</div>


@stop