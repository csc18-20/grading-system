@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <div class="card card-default">
                <div class="card-header text-center">All classes</div>

                <div class="card-body" style="min-height: 60vh;">
                    <form action="" method="">
                    <div class="form-group">
                      <label for="" class="form-check-label">
                      Add a Class Here
                      </label>
                       <input type="text" class="form-control" name="" value="" placeholder="eg Computer science 1">
                      </div>
                       <div class="form-group">
                         <button type="" class="btn btn-outline-primary">
                         Add
                        </button>   
                       </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
