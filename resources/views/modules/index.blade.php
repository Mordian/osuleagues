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
			<div class="row">
				<div class="col-sm-12">
					<hr>
					<p>made by <a href="https://osu.ppy.sh/u/arihosu" class="site-color site-link" target="_blank">arihosu</a></p>
				</div>
			</div>
		</div>
	</div>

	<script>
		function formSubmit() {
			var button = document.getElementById('placement-button');
			button.disabled = true;
			button.value = "Working... it could take a while";
		}
	</script>
@stop