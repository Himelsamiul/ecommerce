@extends('backend.master')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Order Report</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('order.report.search') }}" method="get">
                <div class="row align-items-end mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="from_date">From date:</label>
                            <input name="from_date" type="date" class="form-control" id="from_date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="to_date">To date:</label>
                            <input name="to_date" type="date" class="form-control" id="to_date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success btn-block">Search</button>
                    </div>
                </div>
            </form>

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
                                    <td>{{ $order->name }}</td>
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
            <div class="text-center mt-3">
                <button onclick="printDiv('orderReport')" class="btn btn-success">Print</button>
            </div>
        </div>
    </div>
</div>

<script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection
