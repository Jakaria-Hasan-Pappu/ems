@extends('backend.welcome')

@section('contents')

<h1>Employee list</h1>
<a href="{{route('employee.create')}}" class="btn btn-primary">Create employee</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>

      <th scope="col">image</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>


    @foreach($list as $key=>$data )

    <tr>

    <td>{{$key+1}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      

      <td>


                <img width="100px" style="border-radius: 10px" src="{{url('/uploads/'.$data->image)}}" alt="Employee_image">
            </td>
      <td>{{$data->department->name}}</td>

      <td>
        <a href="{{route('employee.edit',$data->id)}}" class="btn btn-warning">Edit</a>
        <a href="{{route('employee.delete',$data->id)}}" class="btn btn-danger">Delete</a>
        <a href="{{route('employee.view',$data->id)}}" class="btn btn-primary">View</a>
      </td>

    </tr>
    @endforeach

  </tbody>
</table>



@endsection
