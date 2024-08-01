@extends('backend.master')

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center text-dark mb-0">Contack</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Name</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $serial = 1;
                    @endphp

                    @foreach ($feedback as $item)
                        <tr>
                            <th scope="row">{{ $serial++ }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('contact.view', $item->id) }}"><b>View Message</b></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
