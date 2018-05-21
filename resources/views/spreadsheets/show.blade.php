@extends('layouts.app')
@section('show')
<div class="container-fluid">
<div class="card">
    <div class="card-body">
        <h4 class="text-center font-italic font-weight-bold">
            {{ $spreadsheet->course_name }}
        </h4>
        <h6 class="text-left font-italic font-weight-bold">
            Semester:<span class="font-weight-bold text-primary">{{ $spreadsheet->semester }}</span>
        </h6>
        <h6 style="padding-bottom: 40px;" class="text-right font-italic ">
            Lecturer Name:<span class="font-weight-bold text-primary">{{ $spreadsheet->lecturer }}</span>
        </h6>
         <table class="table table-bordered table-striped table-hover datatable">
           <thead>
               <tr>
                   <th>ID No:</th>
                   <th>Reg No:</th>
                   <th>Name</th>
                   <th>Final Assignment</th>
                   <th>Final Exam</th>
                   <th>Final Mark</th>
                   <th>details</th>
               </tr>
           </thead> 
           <tbody>
               @foreach ($marks as $mark)
                   <tr>
                      <td>{{ $mark->id }}</td>
                       <td>{{ $mark->reg_no }}</td>
                       <td>{{ $mark->student_name }}</td>
                       <td>{{ number_format($mark->final_course_work,2) }}</td>
                       <td>{{ $mark->final_exam }}</td>
                       <td>{{ number_format($mark->final_mark,2) }}</td>
                       <td>
                         <a href="">
                           Details
                         </a>
                       </td>
                   </tr>
               @endforeach
           </tbody>
        </table>
    
        
    </div>
</div>
@endsection
