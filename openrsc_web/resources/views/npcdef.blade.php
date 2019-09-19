@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-3 text-capitalize display-3">
				<a href="{{ route('npcs') }}">{{ $npcdef->name }}</a>
			</h2>

			<div class="row align-items-center">
				<div class="col-md d-inline-block text-center">
					<img class="display-glow pb-3" style="transform: scale(1.3);"
						 src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"/>
					<span class="col d-inline-block">{{ $npcdef->description }}</span>
				</div>

				<div class="col-md d-inline-block text-center">
					@if ($npcdef->attack > 0)
						<div class="d-block">
							<img class="mb-1" src="{{ asset('img/skill_icons/attack.svg') }}" alt="attack" height="16px"
								 width="16px"/>
							<span class=" text-primary">{{ $npcdef->attack }}</span>
						</div>
					@endif
					@if ($npcdef->defense > 0)
						<div class="d-block">
							<img class="mb-1" src="{{ asset('img/skill_icons/defense.svg') }}" alt="defense"
								 height="16px" width="16px"/>
							<span class=" text-primary">{{ $npcdef->defense }}</span>
						</div>
					@endif
					@if ($npcdef->strength > 0)
						<div class="d-block">
							<img class="mb-1" src="{{ asset('img/skill_icons/strength.svg') }}" alt="strength"
								 height="16px" width="16px"/>
							<span class=" text-primary">{{ $npcdef->strength }}</span>
						</div>
					@endif
					@if ($npcdef->hits > 0)
						<div class="d-block">
							<img class="mb-1" src="{{ asset('img/skill_icons/hits.svg') }}" alt="hits" height="16px"
								 width="16px"/>
							<span class=" text-primary">{{ $npcdef->hits }}</span>
						</div>
					@endif
					@if ($npcdef->ranged > 0)
						<div class="d-block">
							<img class="mb-1" src="{{ asset('img/skill_icons/ranged.svg') }}" alt="ranged" height="16px"
								 width="16px"/>
							<span class=" text-primary">{{ $npcdef->ranged }}</span>
						</div>
					@endif
				</div>

				<div class="col-md d-inline-block text-center">
					@if ($npcdef->attackable = 1)
						<div class="d-block">
							<span class="">Attackable</span>
						</div>
					@endif
					@if ($npcdef->attackable = 0)
						<div class="d-block">
							<span class="">Not Attackable</span>
						</div>
					@endif
					@if ($npcdef->aggressive = 1)
						<div class="d-block">
							<span class="">Aggressive</span>
						</div>
					@endif
					@if ($npcdef->aggressive = 0)
						<div class="d-block">
							<span class="">Passive</span>
						</div>
					@endif
					@if ($npcdef->respawnTime > 0)
						<div class="d-block">
							<span class="">Respawn Time:</span>
							<span class=" text-primary">{{ $npcdef->respawnTime }} sec</span>
						</div>
					@endif
				</div>
			</div>

			<div class="d-block text-center pt-4">
				<label for="inputBox"></label>
				<input type="text" class="pl-2 pt-1 mb-3 w-25 text-center" id="inputBox" onkeyup="search()"
					   placeholder="Search this page"/>
			</div>

			{{ $npc_drops->links('pagination::bootstrap-4') }}
			<table id="List" class="container table-striped table-hover text-primary table-transparent">
				<thead class="border-bottom border-info">
				<tr class="text-info">
					<th class="pl-3 float-left pl-1">Name (ID)</th>
					<th class="text-center">Picture</th>
					<th class="pr-3 float-right pl-5">Quantity</th>
				</tr>
				</thead>
				<tbody>
				@foreach($npc_drops as $npc_drop)
					<tr class="clickable-row" data-href="/itemdef/{{ $npc_drop->itemID }}">
						<td>
							<span class="pl-3 float-left text-capitalize">
								{{ $npc_drop->itemName }} ({{ $npc_drop->itemID }})
							</span>
						</td>
						<td class="text-center pt-1 pb-1">
							<div class="display-glow">
								<img src="{{ asset('img/items') }}/{{ $npc_drop->itemID }}.png"
									 alt="{{ $npc_drop->itemID }}"/>
							</div>
						</td>
						<td class="pr-3 float-right pl-5">
							{{ $npc_drop->dropAmount }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
