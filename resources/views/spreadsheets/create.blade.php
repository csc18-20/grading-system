@extends('layouts.app')
@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="card-title text-center">Upload A New Spread sheet</h4>

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
                   

                    <div class="form-group">
                        <button class="btn btn-primary">
                            <i class="fa fa-upload"></i>
                            Upload Spread Sheet
                        </button>
                        
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection