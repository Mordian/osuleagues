@extends('layout')

@section('title', 'osu!leagues')

@section('content')
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h4>osuleagues is an alternative ranking system for osu!.</h4>
					<p>Based on League of Legends, each player is assigend into a "league" based on their elo (in osu! case, PP).</p>
					<h4>Check your league:</h4>
					<div class="col-sm-6">
						<form method="POST" action="/placement">
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

							<input type="submit" class="btn btn-site" value="Check my league">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop