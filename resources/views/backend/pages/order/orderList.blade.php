@extends('backend.master')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Order Report</h1>
        </div>
        <div class="card-body">
           

            <div id="orderReport">
                <h2 class="text-center">Order Reports - {{ date('Y-m-d') }}</h2>
                <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($orders))
                            @foreach($orders as $key => $order)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->total_price }} Tk.</td>
                                    <td>{{ $order->full_name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td class="text-danger">{{ $order->status }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>



@endsection
