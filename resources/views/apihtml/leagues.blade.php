<ul class="list-unstyled list-inline">
	<?php $index = 1 ?>
	@foreach ($leagues as $league)
		<li class="league-lookup">
			<h5 class="">
				<a class="mode-{{ $league->mode }} site-link site-decoration" href="/leagues/{{ $league->name }}/{{ $league->division }}/{{ lcfirst(formatMode($league->mode)) }}">
					{{ ucfirst($league->name) }} {{ formatRomans($league->division) }}
				</a>
			</h5>
		</li>
		@if ($index % 3 == 0)
			<br>
		@endif
	<?php $index++ ?>
	@endforeach
</ul>