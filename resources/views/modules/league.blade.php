@extends('layout')

@section('title', 'osu!leagues')

@section('content')
	<div class="container-fluid margin-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="site-color">
						{{ $mode }} {{ ucfirst($league->name) }} {{ formatRomans($league->division) }} League
						<small>{{ $league->minpp }}-{{ $league->maxpp }}pp</small> 
					</h2>

					<h4><small>"{{ $league->slug }}"</small></h4>

					<h3><a class="site-color site-link" href="#top-maps">Check the top maps for this legue</a></h3>

					<table class="table table-condensed">
						<tr class="site-background">
							<th>#</th>
							<th>Username</th>
							<th>PP</th>
							<th>Playcount</th>
							<th>Level</th>
							<th>Accuracy</th>
							<th>SS / S / S</th>
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
				<div class="col-sm-6">
					<div id="top-maps">
						<h3 class="site-color">Top maps</h3>
						<table class="table table-condensed">
							<tr class="site-background">
								<th>Artist / Song</th>
								<th>Stars</th>
								<th style="min-width: 80px">PP given</th>
								<th>Played by</th>
							</tr>
							@foreach ($scores as $score)
								<tr>
									<td>
										<a href="https://osu.ppy.sh/b/{{ $score->beatmap->beatmap_id }}" target="_blank">{{ $score->beatmap->artist }} - {{ $score->beatmap->title }}</a>
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
	</div>
@stop