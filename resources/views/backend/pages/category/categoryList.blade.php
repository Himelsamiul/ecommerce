@extends('backend.master')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0" style="color: black">Category List</h4>
            <a class="btn btn-success" href="{{ route('category.form') }}">Add Category</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $serial = 1;
                    @endphp
                    @foreach ($category as $item)
                        <tr>
                            <th scope="row">{{ $serial++ }}</th>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('category.delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Do you want to delete?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
