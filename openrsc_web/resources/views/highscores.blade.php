@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">Highscores</h2>

			<div class="row">

				<div class="col">
					<table id="itemList"
						   class="container-fluid table-striped table-hover text-primary table-transparent">
						<thead class="border-bottom border-info thead-dark">
						<tr class="row text-info">
							<th class="col text-right pt-1 pb-1">Rank</th>
							<th class="col text-left pt-1 pb-1">Player</th>
							<th class="col text-right pt-1 pb-1">Total Level</th>
							<th class="col text-left pt-1 pb-1">Total XP</th>
							<th class="col text-right pt-1 pb-1">Last Online</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($highscores as $player)
							<tr class="row clickable-row" data-href="player/{{ $player->id }}">
								<td class="col text-right pt-1 pb-1">
									<span>{{ $player->id }}</span>
								</td>
								<td class="col text-left pt-1 pb-1">
									<span>{{ $player->username }}</span>
								</td>
								<td class="col text-right pt-1 pb-1">
									<span>{{ $player->id }}</span>
								</td>
								<td class="col text-left pt-1 pb-1">
									<span>{{ $player->id }}</span>
								</td>
								<td class="col text-right pt-1 pb-1">
									@if($player->login_date != 0)
										<span>{{ Carbon\Carbon::parse($player->login_date)->diffForHumans() }}</span>
									@else
										<span>Never</span>
									@endif
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					{{ $highscores->links('pagination::bootstrap-4') }}
				</div>

				<div class="col-sm-auto">
					<div class="pt-1 mb-3 text-center">
						<label for="inputBox"></label>
						<input type="text" class="text-center" id="inputBox" onkeyup="search()"
							   placeholder="Search for a player">
					</div>

					<div class="float-left"
						 style="background-color: rgba(19, 36, 47, 0.8); width: 160px; border: 1px solid #17a2b8; padding-left: 10px; padding-top: 3px; padding-bottom: 3px; font-size: 16px;">
						@foreach ($skill_array as $skill)
							<a class="text-secondary" style="padding: 0.25rem 1.5rem; white-space: nowrap; display: block;"
							   href="/highscores/{{ $skill }}">
								<img src="/img/skill_icons/{{ $skill }}.svg"
									 alt="{{ $skill }}" height="20px"/>
								{{ ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)) }}
							</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection