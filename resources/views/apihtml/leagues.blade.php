<ul class="list-unstyled">
	<?php $index = 1 ?>
	@foreach ($leagues as $league)
		<li>
			<h5 class="site-color">
				<a class="site-color site-link site-decoration" href="/leagues/{{ $league->name }}/{{ $league->division }}/{{ lcfirst(formatMode($league->mode)) }}">
					{{ ucfirst($league->name) }} {{ formatRomans($league->division) }}
				</a>
			</h5>
		</li>
		@if ($index % 3 == 0)
			<hr>
		@endif
	<?php $index++ ?>
	@endforeach
</ul>