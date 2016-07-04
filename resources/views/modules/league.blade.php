@extends('layout')

@section('title', 'osu!leagues')

@section('content')
	<div class="container-fluid margin-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="site-color">
						{{ $mode }} {{ ucfirst($league->name) }} League
						<small>{{ $league->minpp }}-{{ $league->maxpp }}pp</small> 
						<span class="pull-right"><a class="site-color site-link" href="#top-maps">Check the top maps for this legue</a></span>
					</h2>

					<h4><small>"{{ $league->slug }}"</small></h4>

					<table class="table table-condensed">
						<tr class="site-background">
							<th>#</th>
							<th>Username</th>
							<th>PP</th>
							<th>Playcount</th>
							<th>Level / Accuracy</th>
							<th>SS / S / S</th>
							<th>Global rank</th>
						</tr>
						@foreach ($users as $user)
							<tr class="@if ($user->username == $requestedUser) hover @endif">
								<td>1</td>
								<td>
									<img class="flag" src="/assets/flags/{{ strtolower($user->country) }}.png" alt="{{ $user->country }}">
									<a target="_blank" href="https://osu.ppy.sh/u/{{ $user->user_id }}">{{ $user->username }}</a>
								</td>
								<td>{{ $user->pp_raw }}</td>
								<td>{{ $user->playcount }}</td>
								<td>{{ $user->level }} / {{ $user->accuracy }}%</td>
								<td>{{ $user->count_rank_ss }} / {{ $user->count_rank_s }} / {{ $user->count_rank_a }}</td>
								<td>{{ $user->pp_rank }}</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div id="top-maps">
						<h3 class="site-color">Top maps</h3>
						<table class="table table-condensed">
							<tr class="site-background">
								<th>Artist / Song</th>
								<th>Stars</th>
								<th style="min-width: 80px">PP given</th>
							</tr>
							@foreach ($scores as $score)
								<tr>
									<td>
										<a href="https://osu.ppy.sh/b/{{ $score->beatmap->beatmap_id }}" target="_blank">{{ $score->beatmap->artist }} - {{ $score->beatmap->title }}</a>
									</td>
									<td>{{ $score->beatmap->difficultyrating }}</td>
									<td>{{ $score->pp }}</td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop