@extends('layout')

@section('title', 'osu!leagues')

@section('content')
	
	<div class="container margin-top">
		<div class="row">
			<div class="col-md-2 hidden-xs hidden-sm">
				<h3 class="site-color">
					{{ $mode }}
					<br>
					{{ ucfirst($league->name) }} {{ formatRomans($league->division) }}
					<br>
					<small>
						{{ $league->minpp }}-{{ $league->maxpp }}pp
						<br>
						"{{ $league->slug }}"
					</small> 
				</h3>
				<h4><a class="site-color site-link" href="#top-maps">Scroll down to maps</a></h4>
				@if ($league->name != 'major')
					<hr class="site-border">

					<h4>Related leagues</h4>

					@for ($i = 1; $i < 4; $i++)
						<a href="/leagues/{{ $league->name }}/{{ $i }}/{{ lcfirst($mode) }}" class="site-color site-link">
							{{ ucfirst($league->name) }} {{ formatRomans($i) }}
						</a>
						<br>
					@endfor
				@endif
			</div>
			<div class="col-md-10">

				<div class="pull-right hidden-xs">
					<form class="form-inline" method="POST" action="/placement">
						<div class="form-group">
							{{ csrf_field() }}
							<input type="text" name="username" class="form-control" placeholder="Search a user">
						</div>

						<div class="form-group">
							<select class="form-control" name="mode" id="">
								<option value="0">Standard</option>
								<option value="1">Taiko</option>
								<option value="2">Catch the Beat</option>
								<option value="3">Mania</option>
							</select>
						</div>

						<input type="submit" class="btn btn-site" value="Search">
					</form>
					@if (count($errors))
						<div class="col-sm-offset-6 site-background" style="padding: 15px; margin-top: 20px;">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</div>
					@endif
				</div>

				<div class="clearfix"></div>

				<table class="table table-hover table-condensed margin-top">
					<tr class="site-background">
						<th>#</th>
						<th>Username</th>
						<th>PP</th>
						<th>Playcount</th>
						<th>Level</th>
						<th>Accuracy</th>
						<th>SS / S / A</th>
						<th>Global rank</th>
					</tr>
					<?php $rank = 1 ?>
					@foreach ($users as $user)
						<tr class="@if ($user->canonical_username == $requestedUser) hover @endif">
							<td>{{ $rank }}</td>
							<td>
								<img class="flag" src="/assets/flags/{{ strtolower($user->country) }}.png" alt="{{ $user->country }}">
								<a target="_blank" href="https://osu.ppy.sh/u/{{ $user->user_id }}">{{ $user->username }}</a>
							</td>
							<td>{{ $user->pp_raw }}</td>
							<td>{{ $user->playcount }}</td>
							<td>{{ $user->level }}</td>
							<td>{{ $user->accuracy }}%</td>
							<td>{{ $user->count_rank_ss }} / {{ $user->count_rank_s }} / {{ $user->count_rank_a }}</td>
							<td>{{ $user->pp_rank }}</td>
						</tr>
						<?php $rank++ ?>
					@endforeach
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="top-maps">
					<h3 class="site-color">Top maps</h3>
					<table class="table table-hover table-condensed">
						<tr class="site-background">
							<th>Artist / Song</th>
							<th>Stars</th>
							<th style="min-width: 80px">PP given</th>
							<th>Played by</th>
						</tr>
						@foreach ($scores as $score)
							<tr>
								<td>
									<a href="https://osu.ppy.sh/b/{{ $score->beatmap->beatmap_id }}" target="_blank">
										{{ $score->beatmap->artist }} - {{ $score->beatmap->title }}
									</a>
									<strong>{{ formatBitwise($score->enabled_mods) }}</strong>
								</td>
								<td>{{ $score->beatmap->difficultyrating }}</td>
								<td>{{ round($score->pp) }}</td>
								<td>{{ $score->user->username }}</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
	
@stop