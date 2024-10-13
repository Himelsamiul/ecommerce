@extends('frontend.master')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Dashboard</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">My Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="user-dashboard page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Centered Welcome Message --}}
                <div class="text-center welcome-message">
                    <h2 class="welcome-text">Welcome, {{ auth()->user()->name }}!</h2>
                    <p class="location-info">Your current address: {{ auth()->user()->address }}</p>
                </div>

                <ul class="list-inline dashboard-menu text-center">
                    <li><a class="active" href="#">Profile</a></li>
                </ul>

                <div class="dashboard-wrapper user-dashboard">
                    <div class="total-order mt-20">
                        <div class="table-responsive">
                            <table class="table" id="orderTable">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Product Name</th>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Address</th>
                                        <th>Email Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (empty($order))
                                        <tr>
                                            <td colspan="9">No Order History</td>
                                        </tr>
                                    @else
                                        @foreach ($order as $index => $item)
                                        <tr class="table-row">
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->full_name }}</td>
                                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $item->price }} Tk</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('order.payslip', $item->id) }}" class="btn btn-primary print-button">Print</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CSS Styles --}}
<style>
    /* Welcome Message */
    .welcome-message {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .welcome-text {
        font-size: 28px;
        color: #007bff;
        animation: welcomeAnimation 3s ease-in-out infinite; /* Animation applied */
        display: inline-block; /* Helps in animating scale */
    }

    @keyframes welcomeAnimation {
        0% {
            transform: scale(1);
            color: #007bff;
        }
        50% {
            transform: scale(1.1); /* Slightly increase size */
            color: #ff4500; /* Change color */
        }
        100% {
            transform: scale(1);
            color: #007bff; /* Reset to original */
        }
    }

    .location-info {
        font-size: 16px;
        color: #6c757d;
    }

    /* Table Styling */
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
        transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for background and text color */
    }

    .table thead th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    .table-row:hover {
        background-color: #9aaed9; /* Change to a specific color when hovered */
        color: #fff; /* Change text color to white on hover */
    }

    /* Fire Effect for Print Button */
    .print-button {
        background-color: #111; /* Dark button to enhance fire effect */
        color: white;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
        box-shadow: 0px 0px 15px rgba(255, 69, 0, 0); /* Initial shadow */
    }

    .print-button::before,
    .print-button::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 120%;
        height: 120%;
        background: rgba(255, 69, 0, 0.4); /* Orange fire color */
        border-radius: 50%;
        filter: blur(15px);
        opacity: 0;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .print-button::after {
        background: rgba(255, 140, 0, 0.5); /* Lighter yellow fire color */
        filter: blur(25px);
    }

    .print-button:hover {
        transform: scale(1.05);
        background-color: #ff4500; /* Button turns bright fiery orange on hover */
        box-shadow: 0px 0px 25px rgba(255, 69, 0, 0.6); /* Glowing shadow on hover */
    }

    .print-button:hover::before,
    .print-button:hover::after {
        opacity: 1;
        transform: scale(1.2);
    }

    /* Centered Dashboard Menu */
    .dashboard-menu li a {
        font-weight: bold;
        color: #007bff;
        transition: color 0.3s;
    }

    .dashboard-menu li a:hover {
        color: #0056b3;
    }

    /* Dashboard Wrapper Styling */
    .dashboard-wrapper {
        background-color: #ffffff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Table Hover Effect */
    .table-row:hover {
        background-color: #9aaed9; /* Change to a specific color when hovered */
        color: #d1113a; /* Change text color to white on hover */
    }
</style>

{{-- JavaScript for Table Effects --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tableRows = document.querySelectorAll('#orderTable tbody tr');

        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function () {
                this.style.backgroundColor = '#9aaed9'; // Highlight color on hover (soft blue)
                this.style.color = '#d1113a'; // Change text color to white on hover
            });

            row.addEventListener('mouseleave', function () {
                this.style.backgroundColor = ''; // Reset to original color
                this.style.color = ''; // Reset to original text color
            });
        });
    });
</script>

@endsection
