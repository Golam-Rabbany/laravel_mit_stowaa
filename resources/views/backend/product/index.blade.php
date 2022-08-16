@extends('master.dashboard_main')

@section('add_data_table_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('dashboard')
    
@can('author')
  

<div class="my-6 mx-2">
  <table class="table" id="data_table">
      <thead class="thead-dark">
          <tr>
              <th scope="col">Id</th>
              <th>Category Name</th>
              <th>Main Price</th>
              <th>Sale Price</th>
              <th>Quantity</th>
              <th>Short Desc</th>
              <th>Product Photo</th>
              <th>Long Desc</th>
              <th>Information</th>
              <th>Action</th>
            </tr>
      </thead>
      <tbody>
          @foreach ($products as $products)
          <tr>
            <td>{{$products->id}}</td>
            <td>{{$products->product_name}}</td>
            <td>{{$products->main_price}}</td>
            <td>{{$products->sale_price}}</td>
            <td>{{$products->quantity}}</td>
            <td>{{$products->short_desc}}</td>
            <td>
              <img src="{{asset('uploads/product/'.$products->product_photo)}}" height="80px" alt="">
            </td>
            <td>{{$products->long_desc}}</td>
            <td>{{$products->information}}</td>
            <td class="flex">
              <a href="{{route('product.edit',$products->id)}}" class="btn btn-primary btn-sm mr-2">Edit</a>
              <form action="{{route('product.destroy',$products->id)}}" class="d-inline" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" style="background: rgb(187, 1, 1); color:white" type="submit">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        
      </tbody>
    </table>
</div>

@endcan
@endsection

@section('add_data_table_js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#data_table').DataTable();
        });
    </script>
    
@endsection