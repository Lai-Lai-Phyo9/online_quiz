@extends('btemplate')
@section('title','Subjects')
@section('content')
<div class="container-fluid my-5">
   <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-dark">Subject Tables</h5>
        <a href="{{ route('subjects.create') }}" class="btn btn-success float-right"><i class="fas fa-plus-circle p-2"></i>Create</a>
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
					@foreach ($subjects as $subject)
					<tr>
						<td>{{$subject->id}}</td>
						<td>{{$subject->name}}</td>
						<td class="text-center">
							<a href="{{ route('subjects.edit',$subject->id) }}" class="btn btn-warning mb-2" style="width: 120px;"><i class="far fa-edit p-1 btn-sm"></i>Edit</a>
							<form class="d-inline-block"method="post" action="{{ route('subjects.destroy',$subject->id) }}" onsubmit="return confirm('Are your sure?')">
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

