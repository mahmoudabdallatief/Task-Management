@extends('layouts-dashboard.app')
@section('title' , 'Tasks')
@section('content')

<section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tasks</h1>
           
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
     
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="card-body">
          @if ($errors->any())
    <div class="alert alert-danger">
    <p>Errors</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-12">
        <div class="card">
            <div class="card-body">
                <br>
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('tasks.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="">

                        <div class="row mg-b-20">
                            <div class="col-12">
                                    @include('tasks._form')
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button class="btn btn-primary pd-x-20" type="submit">Confirm</button>
                                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>

                    </div>

               

                    

                    
                    
                </form>
            </div>
        </div>
    </div>
</div>
              </div>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      
    </section>
@endsection