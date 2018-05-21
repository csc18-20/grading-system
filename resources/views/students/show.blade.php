@extends("layouts.app")

@section("content")
<div class="card">
	<div class="card-header d-flex justify-content-between">
		<div>
			<h5>Name</h5>
			<p>{{$student->name()}}</p>
		</div>

		<div>
			<h5>CGPA</h5>
			<p>{{round($student->cgpa(),2)}}</p>
		</div>
		
	</div>
</div>

@foreach($student->data() as $semName=> $semester)
<div class="card my-2">
	<div class="card-header">
		{{$semName}}  (GPA: {{round($semester["gpa"],2)}})
	</div>
	<div class="card-body">
		<table class="table table-bordered table-sm datatable">
			<thead>
				<tr>
					<th>Course Code</th>
					<th>Course Name</th>
					<th>Final Mark</th>
					<th>Points</th>
					<th>Grade</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($semester["marks"] as $mark)
				<tr>
					<td>{{$mark->course_code}}</td>
					<td>{{$mark->course_name}}</td>
					<td>{{$mark->final_mark}}</td>
					<td>{{$mark->points}}</td>
					<td>{{$mark->grade}}</td>

				
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endforeach
@endsection