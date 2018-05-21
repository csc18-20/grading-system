@extends('layouts.app')
@section('show')
<div class="container-fluid">
<div class="card">
    <div class="card-body">
        <h4 class="text-center font-italic font-weight-bold">
            {{ $spreadsheet->course_name }}
        </h4>
        <h6 class="text-left font-italic font-weight-bold">
            RegNo:<span class="font-weight-bold text-primary">{{ $spreadsheet->semester }}</span>
        </h6>
        <h6 style="padding-bottom: 40px;" class="text-right font-italic ">
            Sttudent Name:<span class="font-weight-bold text-primary">{{ $spreadsheet->lecturer }}</span>
        </h6>
         <table class="table table-bordered table-striped table-hover datatable">
           <thead>
               <tr>
                   <th>semester</th>
                   <th>course unit1</th>
                   <th>course unit2</th>
                   <th>course unit3</th>
                   <th>course unit4</th>
                   <th>course unit5</th>
               </tr>
           </thead> 
           <tbody>
               @foreach ($marks as $mark)
                   <tr>
                      <td>{{ $mark->id }}</td>
                       <td>{{ $mark->final_marks }}</td>
                   </tr>
               @endforeach
           </tbody>
        </table>
    
        
    </div>
</div>
@endsection
