@extends('master.dashboard_main')


@section('dashboard')
@can('author')

    <div class="container">
        <div class="row">
            <table class="table table-hover" id="data_table">
                <thead class=" bg-success ">
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Date</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($product_orders->product_order as $order)
                    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{App\Models\Order::find($order->order_id)->full_name}}</td>
                        <td>{{App\Models\Product::find($order->product_id)->product_name}}</td>
                        <td>{{$order->quantity}}</td>

                        <td>{{$order->created_at}}</td>
                    </tr>
                            
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endcan
@endsection