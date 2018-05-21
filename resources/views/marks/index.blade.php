@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
         {{--  <p>{{$marks->reg_no}}</p> --}}
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>Reg No</th>
                        <th>Student Name</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($marks as $mark)
                       <tr>
                           <td >{{ $mark->reg_no }}</td>
                           <td>{{ $mark->student_name }}</td>
                           <td>
                             <a href="{{ route('marks.show', $mark) }}">Details</a>
                           </td>
                       </tr>
                   @endforeach 
                </tbody>
            </table>
        </div>
    </div>
@endsection
 
</div>
