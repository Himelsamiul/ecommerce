@extends('frontend.master')

@section('content')

<!-- Payslip Header Section -->
<section class="payslip-header text-center my-4">
    <h1 id="payslip-title">Payslip for Order ID: {{ $order->id }}</h1>
</section>

<!-- Payslip Details Table -->
<section class="payslip-details container">
    <table class="table table-bordered">
        <thead>
            <tr class="table-primary">
                <th>Field</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover-row">
                <td>Product Name</td>
                <td>{{ $order->product->name }}</td>
            </tr>
            <tr class="hover-row">
                <td>Customer Name</td>
                <td>{{ $order->full_name }}</td>
            </tr>
            <tr class="hover-row">
                <td>Date</td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
            </tr>
            <tr class="hover-row">
                <td>Price</td>
                <td>{{ $order->price }} Tk</td>
            </tr>
            <tr class="hover-row">
                <td>Address</td>
                <td>{{ $order->address }}</td>
            </tr>
            <tr class="hover-row">
                <td>Email</td>
                <td>{{ $order->email }}</td>
            </tr>
            <tr class="hover-row">
                <td>Status</td>
                <td>{{ $order->status }}</td>
            </tr>
        </tbody>
    </table>
</section>

<!-- Print Button -->
<div class="text-center mt-4">
    <button id="print-button" onclick="scrollToPrint()" class="btn print-button">Print </button>
</div>

<!-- Additional Styles -->
<style>
/* Payslip Title with Color Animation */
#payslip-title {
    font-size: 32px;
    color: #007bff;
    animation: color-change 5s infinite;
    cursor: pointer;
}

/* Keyframes for Color Animation */
@keyframes color-change {
    0% { color: #007bff; }
    25% { color: #ff4500; }
    50% { color: #28a745; }
    75% { color: #6f42c1; }
    100% { color: #007bff; }
}

/* Title Shake Animation */
@keyframes shake {
    0% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    50% { transform: translateX(5px); }
    75% { transform: translateX(-5px); }
    100% { transform: translateX(0); }
}

#payslip-title:hover {
    animation: shake 0.5s;
}

/* Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 1.1em;
    min-width: 400px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.table thead tr {
    background-color: #007bff; /* Header background color */
    color: white;
}

.table th, .table td {
    padding: 12px 15px;
    border: 1px solid #dddddd;
}

/* Row hover effect */
.hover-row:hover {
    background-color: #f0f8ff; /* Light blue background */
    color: #007bff; /* Text color change */
}

/* Dynamic Fire Effect for Print Button */
.print-button {
    background-color: #111;
    color: white;
    position: relative;
    z-index: 1;
    padding: 10px 20px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    transition: all 0.3s ease;
    box-shadow: 0px 0px 15px rgba(255, 69, 0, 0);
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
    background-color: #ff4500; /* Button turns fiery orange on hover */
    box-shadow: 0px 0px 25px rgba(255, 69, 0, 0.6); /* Glowing shadow on hover */
}

.print-button:hover::before,
.print-button:hover::after {
    opacity: 1;
    transform: scale(1.2);
}
</style>

<!-- JavaScript -->
<script>
    // Smooth scroll to print area
    function scrollToPrint() {
        document.querySelector('#print-button').scrollIntoView({ behavior: 'smooth' });
        setTimeout(() => window.print(), 800); // Delays the print slightly for smooth effect
    }
</script>

@endsection
