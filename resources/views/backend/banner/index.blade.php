@extends('master.dashboard_main')

@section('dashboard')



<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Category Name</th>
            <th>Created At</th>
            <th>Action</th>
            <th>Download</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($banners as $banner)            
        <tr>
          <td>{{$banner->banner_title}}</td>
          <td></td>
          <td>
            <img src="{{asset('storage/'.$banner->banner_photo)}}" style="height: 50px;" alt="">
          </td>
          
          <td class="">
            <a href="" class="btn btn-primary btn-sm">Edit</a>
            <form action="" class="d-inline" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" style="background: rgb(187, 1, 1); color:white" type="submit">Delete</button>
            </form>
          </td>
          <td><a href="{{route('banner.download',$banner->id)}}"><i class="fas fa-download"></i></a></td>
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection