@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="text-center">
            {{ $spreadsheet->course_name }}
        </h4>
    <div class="table-responsive">
        <table class="table-bordered table-sm table">
           <thead>
               <tr>
                   <th>Reg No:</th>
                   <th>Name</th>
                   <th>Assignments</th>
                   <th>Final Assignment</th>
                   <th>Exams</th>
                   <th>Final Exam</th>
                   <th>Final Mark</th>
               </tr>
           </thead> 
           <tbody>
               @foreach ($spreadsheet->marks as $mark)
                   <tr>
                       <td>{{ $mark->reg_no }}</td>
                       <td>{{ $mark->assignments }}</td>
                       <td>{{ $mark->final_course_work }}</td>
                       <td>{{ $mark->exam }}</td>
                       <td>{{ $mark->final_exam }}</td>
                       <td>{{ $mark->final_mark }}</td>
                   </tr>
               @endforeach
           </tbody>
        </table>
    </div>
        
    </div>
</div>
@endsection