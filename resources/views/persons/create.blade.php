@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a person</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('persons.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>

          <div class="form-group">
              <label for="birth_year">Birth year:</label>
              <input type="text" class="form-control" name="birth_year"/>
          </div>
          <div class="form-group">
              <label for="sex">Sex:</label>
              <select class="form-control" name="sex" >
				<option value="f">Female</option>
				<option value="m">Male</option>
				</select>
          </div>
          <div class="form-group">
              <label for="parent_id">Parent:</label>
			  <select class="form-control" name="parent_id" >
				<option value="">-</option>
					@foreach ($parents as $parent)
						<option value="{{$parent->id}}">{{$parent->first_name}}</option>
					@endforeach
				</select>
          </div>
          <button type="submit" class="btn btn-primary-outline">Add person</button>
      </form>
  </div>
</div>
</div>
@endsection
