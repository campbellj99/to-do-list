<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	@include('header')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form method="POST" action="/create-task">
                    @csrf
                    <div class="form-group">
                        <input required type="text" class="form-control" id="name" name="name" placeholder="Insert Task Name">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="tasks">
                	<div class="row" style="padding-bottom: 5px; border-bottom: solid; border-color: #ddd; border-width: 2px;">
                		<div class="col-md-1">#</div>
                		<div class="col-md-11">Task</div>
                    </div>
                    @foreach($tasks as $task)
                        
                        <div class="row" style="padding-bottom: 5px; padding-top: 5px; border-bottom: solid; border-color: #ddd; border-width: 1px;">
	                    	<div class="col-md-1">#{{ $loop->iteration }}</div>
	                        <div class="col-md-7" style="{{ $task->complete ? 'text-decoration: line-through;' : '' }}">{{ $task->name }}</div>
	                        <div class="col-md-2">
	                        	<form method="POST" action="/complete-task">
	                        		@csrf
		                        	<input type="hidden" id="id" name="id" value="{{$task->id}}">
                                    @if($task->complete == true)
		                        	<button type="submit" class="btn btn-warning btn-xs">Uncomplete</button>
                                    @else
                                    <button type="submit" class="btn btn-success btn-xs">Complete</button>
                                    @endif
		                    	</form>
		                    </div>
	                        <div class="col-md-2">
	                        	<form method="POST" action="/delete-task">
	                        		@csrf
		                        	<input type="hidden" id="id" name="id" value="{{$task->id}}">
		                        	<button type="submit" class="btn btn-danger btn-xs">Delete</button>
		                    	</form>
		                    </div>
		                    <br>
	                	</div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</body>
</html>
