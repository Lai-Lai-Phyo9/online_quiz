@extends('btemplate')
@section('title','Levels')
@section('content')
<div class="container-fluid mt-5">
   <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-dark">Level Tables</h5>
        <a href="{{ route('levels.create') }}" class="btn btn-success float-right"><i class="fas fa-plus-circle p-2"></i>Create</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Name</th>
						<th colspan="2">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($levels as $level)
					<tr>
						<td>{{$level->id}}</td>
						<td>{{$level->name}}</td>
						<td class="text-center">
							
							<a href="{{ route('levels.edit',$level->id) }}" class="btn btn-warning mb-2" style="width: 120px;"><i class="far fa-edit p-1 btn-sm"></i>Edit</a>
							<form class="d-inline-block"method="post" action="{{ route('levels.destroy',$level->id) }}" onsubmit="return confirm('Are your sure?')">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger mb-2" style="width: 120px;"><i class="far fa-trash-alt p-1 btn-sm deleteBtn"></i>Delete</button>
						</form>
						</td>
					</tr>
					@endforeach
				</tbody>
          </table>
        </div>
      </div>
   </div>
</div> 

@endsection

