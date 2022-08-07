@extends('master.dashboard_main')

@section('dashboard')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Sub Category</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($category as $categorys)
        <tr>
          <td></td>
          <td>{{$categorys->category_name}}</td>
          <td>
            @foreach ($categorys->subcategory as $scategory)
            <li>{{$scategory->subcategory_name}}</li>
                
            @endforeach
          </td>
          <td>{{$categorys->created_at}}</td>
          <td class="">
            <a href="" class="btn btn-primary btn-sm">Edit</a>
            <form action="" class="d-inline" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" style="background: rgb(187, 1, 1); color:white" type="submit">Delete</button>
            </form>
          </td>
        </tr>            
        @endforeach
    </tbody>
  </table>
@endsection