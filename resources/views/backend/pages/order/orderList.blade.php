@extends('backend.master')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center text-success mb-0">Order List</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id = 1;
                    @endphp
                    @foreach ($orders as $item)
                        <tr>
                            <th scope="row">{{ $id++ }}</th>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->price }} Tk.</td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
