@extends('master.dashboard_main')

@section('dashboard')
    @can('author')


<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Category Name</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($categorys as $category)
        <tr>
          <td>{{$category->id}}</td>
          <td>{{$category->category_name}}</td>
          <td>{{$category->created_at}}</td>
          <td class="">
            <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{route('category.destroy',$category->id)}}" class="d-inline" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" style="background: rgb(187, 1, 1); color:white" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      
    </tbody>
  </table>
        
  @endcan
@endsection