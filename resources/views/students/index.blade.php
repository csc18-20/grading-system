@extends("layouts.app")
@section("content")
<div style="margin-top:100px;" class="card">
	<div class="card-body">
<table class="table datatable table-bordered table-sm">
	<thead>
		<tr>
			<th>Name</th>
			<th>Registration number</th>
			<th>Details</th>
		</tr>
	</thead>
	<tbody>
		@foreach($students as $student)
		<tr  >
			<td>{{$student->student_name}}</td>
			<td>{{$student->reg_no}}</td>
			<td><a href="{{route("students.index",["studentNumber"=>"$student->reg_no"])}}">
				Details
			</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
	</div>
</div>
@endsection