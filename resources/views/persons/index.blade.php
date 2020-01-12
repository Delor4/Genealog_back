@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
	</div>
    
<h1 class="display-3">Persons</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Birth Year</td>
          <td>Sex</td>
          <td>Parent</td>
		  <td>Childrens</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($persons as $person)
        <tr>
            <td>{{$person->id}}</td>
            <td>{{$person->first_name}} {{$person->last_name}}</td>
            <td>{{$person->birth_year}}</td>
            <td>{{$person->sex}}</td>
            <td>{{$person->parent->first_name ?? ''}}</td>
			<td>@foreach($person->childrens as $children)
				{{$children->first_name}}
				@endforeach
			</td>
            <td>
                <a href="{{ route('persons.edit',$person->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('persons.destroy', $person->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
