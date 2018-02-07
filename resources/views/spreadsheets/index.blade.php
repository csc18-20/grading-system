@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="text-center text-primary card-title">Loaded Spread sheets
                <a class="btn btn-outline-primary ml-auto" href="/spreadsheets/create">
                    <i class="fa fa-file-excel-o"></i>
                    Upload New Spread sheet
                </a>
            </h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Lecture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($spreadsheets as $spreadsheet)
                       <tr>
                           <td>{{ $spreadsheet->semester }}</td>
                           <td>{{ $spreadsheet->course_name }}</td>
                           <td>{{ $spreadsheet->course_code }}</td>
                           <td>{{ $spreadsheet->lecturer }}</td>
                           <td>
                               <a href="{{ $spreadsheet->marksLink() }}">
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