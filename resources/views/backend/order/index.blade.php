@extends('master.dashboard_main')

@section('add_data_table_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection


@section('dashboard')

@can('author')

    <div class="container my-4 p-4">
        <div class="row">
            <table class="table table-hover table-responsive" id="data_table">
                <thead class=" bg-success ">
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>User Mail</th>
                    <th>User Phone Number</th>
                    <th>City</th>
                    <th>Street</th>
                    <th>Locality</th>
                    <th>Address</th>
                    <th>Delivary System</th>
                    <th>Total Amount</th>
                    <th>View</th>
                    <th>Order Status</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->city}}</td>
                        <td>{{$order->street}}</td>
                        <td>{{$order->locality}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->delivary_system}}</td>   
                        <td>{{$order->total}}</td>   
                        <td><a href="{{route('order.show',$order->id)}}"> <i class="fa fa-eye"></i></a></td>  
                        <td>
                            @if ($order->order_status == 1)
                            <p class="text-primary">Delivary</p><a href="{{route('order.edit',$order->id)}}"><i class="fa fa-edit"></i></a>
                                @elseif ($order->order_status ==0)
                                <p class="text-warning">Pending</p><a href="{{route('order.edit',$order->id)}}"><i class="fa fa-edit"></i></a>
                                @elseif ($order->order_status == 2)
                                <div class="text-danger">Cancle</div><a href="{{route('order.edit',$order->id)}}"><i class="fa fa-edit"></i></a>
                            @endif
                        </td>
                        <td>
                            <form action="{{route('order.destroy',$order->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" ><i class="fa-solid fa-trash-can ml-2 text-red-500"  style="border: none"></i></button>
                            </form>
                    </td>

                    </tr>
                        
                    @endforeach

                </tbody>
            </table>
        </div>
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