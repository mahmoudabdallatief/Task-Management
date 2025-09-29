


@extends('layouts-dashboard.app')

@section('title' , 'Tasks' )
@section('content')
@if (session()->has('success'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{session('success')}}",
                    type: "success"
                })
            }

        </script>
    @endif

  <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Tasks </h1>
           
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if($task->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($task->status == 'in-progress')
                                <span class="badge bg-info">In Progress</span>
                            @else
                                <span class="badge bg-success">Completed</span>
                            @endif

                            <form action="{{ route('update_task_status') }}" method="GET" class="status-form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $task->id }}">
                                <p class="text-primary">Update Task Status</p>
                                <select name="status" class="task_status form-select">
                                    <option value="pending" @if($task->status == 'pending') selected @endif disabled>Pending</option>
                                    <option value="in-progress" @if($task->status == 'in-progress') selected @endif>In Progress</option>
                                    <option value="completed" @if($task->status == 'completed') selected @endif>Completed</option>
                                </select>
                            </form>
                        </td>

                        <td>{{ $task->due_date  }}</td>

                        <td>
                    
                          <a href="{{route('tasks.edit',$task->id)}}"><button class="btn btn-success">Edit</button></a>
                        
                         
                         <a class="modal-effect btn  btn-danger" data-effect="effect-scale"
                                                
                                                data-toggle="modal" href="#modaldemo8{{$task->id}}">Delete</a>
                                               </td>
                                                <div class="modal" id="modaldemo8{{$task->id}}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Delete Task</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>Are you sure to delete this task?</p><br>
                        {{ $task->title}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
                    </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      
    </section>
  @endsection
