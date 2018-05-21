@extends('layouts.app')
@section('content')
<div style="margin-top:100px;" class="container-fluid">
    <div  class="card">
      <div class="card-title">
        
      </div>
        <div class="card-body">
            <h4 class="text-primary card-title">
              Loaded Spread sheets
            </h4>
                <div style ="padding-bottom: 15px;"class="d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-primary ml-auto" data-toggle = "modal" data-target="#exampleModal">
                    <i class="fa fa-file-excel-o"></i>
                    Upload New Spread sheet
                </button>
          </div>
        </div>
        <div style="margin-top: 10px;" class="card">
           <div class="card-title">
        
      </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Lecturer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($spreadsheets as $spreadsheet)
                       <tr>
                           <td >{{ $spreadsheet->semester }}</td>
                           <td>{{ $spreadsheet->course_name }}</td>
                           <td>{{ $spreadsheet->course_code }}</td>
                           <td>{{ $spreadsheet->lecturer }}</td>
                           <td>
                             <a href="{{ route('spreadsheets.show',$spreadsheet) }}">
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
 @section('modal')
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Upload A New Spread sheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="/spreadsheets" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="file" class="" name="file">
                        @if ($errors->has("file"))
                           <p class="text-danger form-text">
                               {{ $errors->first("file") }}
                           </p>
                        @endif
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">
                            <i class="fa fa-upload"></i>
                            Upload Spread Sheet
                 </button>
                   </form>
              </div>
            </div>
          </div>
        </div>
@endsection
</div>
