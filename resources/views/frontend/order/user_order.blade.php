@extends('master.frontend_main')

@section('frontend')
    <div>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Order No</th>
                </tr>
            </thead>
            @foreach ($user_orders as $user_order)
            
            <tbody>
                <tr>
                    <td>{{$user_order->product_id}}</td>
                </tr>
            </tbody>
                
            @endforeach
        </table>
    </div>
@endsection