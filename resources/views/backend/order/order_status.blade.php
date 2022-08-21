@extends('master.dashboard_main')

@section('dashboard')
@can('author')
    
<section>
    <form action="{{route('order.status.update',$order_status->id)}}"  method="POST">
        @csrf
    <div class="mt-4">
        <label  for="">Change Order Status</label><br>
        <select name="status" id="" class="form-control">
            <option value="0" @if ($order_status->order_status == 0) selected            @endif>Pending</option>
            <option value="1" @if ($order_status->order_status == 1) selected            @endif>Delivary</option>
            <option value="2" @if ($order_status->order_status == 2) selected            @endif>Cancel</option>
        </select>
    </div>
    <button class="btn btn-primary mt-4" style="background:orange; color:white" type="submit">Submit</button>
    </form>
</section>

@endcan
@endsection