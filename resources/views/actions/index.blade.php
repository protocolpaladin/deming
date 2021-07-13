@extends("layout")

@section("title")
Liste des plans d'action
@endsection

@section("content")

	<div class="grid">
		<div class="row">
			<div class="cell">

	<table class="table striped row-hover cell-border"
       data-role="table"
       data-rows="10"
	   data-show-search="false"
       data-show-activity="true"
       data-rownum="false"
       data-check="false"
       data-check-style="1">
	    <thead>
	    <tr>
			<th class="sortable-column sort-asc" width="10%">Titre</th>
			<th class="sortable-column sort-asc" width="60%">Action</th>
			<th class="sortable-column sort-asc" width="10%">Date de la mesure</th>
			<th class="sortable-column sort-asc" width="10%">Prochaine revue</th>
			<th class="sortable-column sort-asc" width="10%">Note</th>
	    </tr>
	    </thead>
	    <tbody>
	@foreach($actions as $action)
		<tr>
			<td valign="top">
				<a href="/controls/{{$action->control_id}}">
					{{ $action->clause }}
				</a>
			</td>
			<td>
				<b>{{ $action->name }}</b>
				<pre>{{ $action->action_plan }}</pre>
			</td>
			<td><a href="/action/{{ $action->id }}">{{ $action->plan_date }}</a></td>
			<td><a href="/measurements/{{ $action->next_id }}">{{ $action->next_date }}</a></td>
			<td>
                @if ($action->score==1)
                    &#128545;
                @elseif ($action->score==2)
                    &#128528;
                @elseif ($action->score==3)
                    <span style="filter: sepia(1) saturate(5) hue-rotate(70deg)">&#128512;</span>
                @else
                    &#9675; <!-- &#9899; -->
                @endif
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>

@endsection