<x-app-layout>
    <x-slot name="title">Project Dashboard</x-slot>
    <h1 class="text-center m-large">Project Dashboard</h1>

	<table class="mx-auto">
		<caption>
			Project Information
		</caption>
		<thead>
			<tr>
				<th>Project Name</th>
				<th>Project Path</th>
				<th colspan="2">Open project directory in</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$project->label}}</td>
				<td>{{$project->path}}</td>
				<td>
					<a href="{{ route('api.filesystem.open', ['path' => $project->path]) }}">Windows Explorer</a>
				</td>
				<td>
					<a href="/filemanager/index.php" target="_bland">Buddy File Manager</a>
				</td>
			</tr>
		</tbody>
	</table>
</x-app-layout>
