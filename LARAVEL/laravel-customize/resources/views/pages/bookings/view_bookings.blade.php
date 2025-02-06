@extends('master')

@section('content')

<div class="bookings-container">
    <h2 class="page-title">View Bookings</h2>

    <div class="booking-search">
        <input type="text" id="search" class="search-input" placeholder="Search by Passenger Name or Flight">
        <button type="button" class="btn-search">Search</button>
    </div>

    <div class="bookings-table">
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Passenger Name</th>
                    <th>Flight</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Booking Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#BK12345</td>
                    <td>John Doe</td>
                    <td>Flight 101</td>
                    <td>New York</td>
                    <td>London</td>
                    <td>2025-02-06</td>
                    <td><span class="status confirmed">Confirmed</span></td>
                    <td>
                        <a href="#" class="btn-edit">Edit</a>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-cancel" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>#BK12346</td>
                    <td>Jane Smith</td>
                    <td>Flight 102</td>
                    <td>Los Angeles</td>
                    <td>Tokyo</td>
                    <td>2025-02-07</td>
                    <td><span class="status pending">Pending</span></td>
                    <td>
                        <a href="#" class="btn-edit">Edit</a>
                        <form action="/cancel-booking/124" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-cancel" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel</button>
                        </form>
                    </td>
                </tr>
                <!-- More rows can be added here -->
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('styles')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f7f9fc;
        margin: 0;
        padding: 20px;
    }

    .bookings-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .page-title {
        text-align: center;
        font-size: 2.5em;
        color: #2c3e50;
        margin-bottom: 30px;
    }

    .booking-search {
        text-align: center;
        margin-bottom: 30px;
    }

    .search-input {
        padding: 10px;
        font-size: 16px;
        width: 50%;
        border-radius: 4px;
        border: 1px solid #ccc;
        margin-right: 10px;
    }

    .btn-search {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-search:hover {
        background-color: #2980b9;
    }

    .bookings-table {
        margin-top: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #2c3e50;
        color: white;
    }

    tr:hover {
        background-color: #ecf0f1;
    }

    .status {
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .status.confirmed {
        background-color: #2ecc71;
        color: white;
    }

    .status.pending {
        background-color: #f39c12;
        color: white;
    }

    .status.cancelled {
        background-color: #e74c3c;
        color: white;
    }

    .btn-edit, .btn-cancel {
        padding: 8px 15px;
        font-size: 14px;
        border-radius: 4px;
        text-decoration: none;
        color: white;
        cursor: pointer;
        margin: 5px;
    }

    .btn-edit {
        background-color: #f39c12;
    }

    .btn-edit:hover {
        background-color: #e67e22;
    }

    .btn-cancel {
        background-color: #e74c3c;
        border: none;
    }

    .btn-cancel:hover {
        background-color: #c0392b;
    }
</style>
@endsection

@section('scripts')
<script>
    // You can add JavaScript for search filtering or pagination if needed
</script>
@endsection
