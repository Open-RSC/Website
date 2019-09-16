@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">Highscores</h2>
			<div class="row no-gutters">

				<!-- placeholder left column -->
				<div class="col"></div>

				<!-- center column -->
				<div class="col-auto" style="width: 600px;">
					<div class="float-left h3">{{ ucfirst($subpage) }}</div>

					<div class="float-right">
						<nav>
							<ul class="menu skill-dropdown">
								<li>
									<label for="drop-skills" class="toggle">Skills ▾</label>
									<a href="#" style="padding-top: 0; padding-bottom: 0;">
										Skills
									</a>
									<input type="checkbox" id="drop-skills"/>
									<ul style="margin-top: -15px; margin-left: -6px;">
										<li>
											@foreach ($skill_array as $skill)
												<a class="dropdown-item text-secondary"
												   href="/highscores/{{ $skill }}">
													<img src="/img/skill_icons/{{ $skill }}.svg"
														 alt="{{ $skill }}" height="20px"/>
													{{ ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)) }}
												</a>
											@endforeach
										</li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>

					<table id="itemList"
						   class="container-fluid table-striped table-hover text-primary table-transparent">
						<thead class="border-bottom border-info thead-dark">
						<tr class="row text-info">
							<th class="col text-right pt-1 pb-1">Rank</th>
							<th class="col text-left pt-1 pb-1">Player</th>
							<th class="col text-right pt-1 pb-1">Last Login</th>
							<th class="col text-right pt-1 pb-1">Level</th>
							<th class="col text-left pt-1 pb-1">XP</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($highscores as $key=>$player)
							<tr class="row clickable-row" data-href="player/{{ $player->id }}">
								<td class="col text-right pt-1 pb-1">
									<span>
										{{ ($highscores->currentpage()-1) * $highscores->perpage() + $key + 1 }}
									</span>
								</td>
								<td class="col text-left pt-1 pb-1">
									<span>
										{{ ucfirst($player->username) }}
									</span>
								</td>
								<td class="col text-right pt-1 pb-1">
									@if($player->login_date != 0)
										<span>
											{{ Carbon\Carbon::parse($player->login_date)->diffForHumans() }}
										</span>
									@else
										<span>Never</span>
									@endif
								</td>
								<td class="col text-right pt-1 pb-1">
									<span>
										{{ number_format(($subpage == $skill_array[0]) ? $row['skill_total'] : (new App\Http\Controllers\HighscoresController)->experienceToLevel((new App\Http\Controllers\HighscoresController)->totalXP($player)/4.0)) }}
									</span>
								</td>
								<td class="col text-left pt-1 pb-1">
									<span>
										{{ number_format((new App\Http\Controllers\HighscoresController)->totalXP($player)/4.0) }}
									</span>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					{{ $highscores->links('pagination::bootstrap-4') }}
				</div>

				<!-- right column -->
				<div class="col">
					<div class="text-center">
						<label for="inputBox"></label>
						<input type="text" class="text-center" id="inputBox" onkeyup="search()"
							   placeholder="Search this page" style="height: 33px;">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
