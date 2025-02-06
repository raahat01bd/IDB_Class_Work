@extends('master')

@section('content')

<a href="add-flights" class="btn-add-flight">
  <i class="fas fa-plus-circle"></i> Add New Flight
</a>
<hr>

<h2>Flight Details</h2>

<table class="table table-bordered" style="max-width: 1000px; margin: 0 auto;">
  <thead>
    <tr>
      <th>Flight Name</th>
      <th>Departure</th>
      <th>Arrival</th>
      <th>Origin</th>
      <th>Destination</th>
      <th>Price</th>
      <th>Actions</th>
    </tr>
  </thead>
  {{-- <tbody>
    @foreach($flights as $flight)
      <tr>
        <td>{{ $flight->flightName }}</td>
        <td>{{ $flight->departure }}</td>
        <td>{{ $flight->arrival }}</td>
        <td>{{ $flight->origin }}</td>
        <td>{{ $flight->destination }}</td>
        <td>${{ $flight->price }}</td>
        <td>
          <a href="/edit-flight/{{ $flight->id }}" class="btn btn-warning">Edit</a>
          <form action="/delete-flight/{{ $flight->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this flight?')">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody> --}}
</table>

@endsection

@section('styles')
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  h2 {
  color: #2c3e50;
  margin-top: 20px;
  text-align: center; /* Center the text */
  font-size: 28px; /* Optional: Adjust font size for better readability */
  margin-bottom: 30px; /* Optional: Adjust the bottom margin to space out from content */
}


  .btn-add-flight {
    display: inline-block;
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    text-decoration: none;
    margin-bottom: 20px;
    transition: background-color 0.3s ease;
  }

  .btn-add-flight:hover {
    background-color: #2980b9;
  }

  .btn-add-flight i {
    margin-right: 8px;
    font-size: 18px;
    text-align: right
  }

  /* Align button to the right */
  .btn-add-flight {
    float: right;  /* Align to the right */
    direction: rtl; /* Right to left alignment */
  }

  .form-group {
    margin-bottom: 15px;
  }

  label {
    font-weight: bold;
    color: #34495e;
  }

  input[type="text"],
  input[type="number"],
  input[type="datetime-local"],
  select {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .btn {
    padding: 8px 15px;
    font-size: 14px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
  }

  .btn-primary {
    background-color: #3498db;
    color: white;
  }

  .btn-primary:hover {
    background-color: #2980b9;
  }

  .btn-warning {
    background-color: #f39c12;
    color: white;
  }

  .btn-warning:hover {
    background-color: #e67e22;
  }

  .btn-danger {
    background-color: #e74c3c;
    color: white;
  }

  .btn-danger:hover {
    background-color: #c0392b;
  }

  table {
    width: 100%;
    border-collapse: collapse;
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

  .table-container {
    max-width: 1200px;
    margin: 20px auto;
  }
</style>

<!-- Font Awesome CDN for the plus icon -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
