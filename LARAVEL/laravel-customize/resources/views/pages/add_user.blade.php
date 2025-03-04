@extends('master')

@section('content')

<h2>Add Flight</h2>
<form action="/add-flight" method="POST" style="max-width: 600px; margin: 0 auto;">
  @csrf
  <div class="form-group">
    <label for="flightName">Flight Name:</label>
    <input type="text" id="flightName" name="flightName" required class="form-control">
  </div>
  <div class="form-group">
    <label for="departure">Departure Time:</label>
    <input type="datetime-local" id="departure" name="departure" required class="form-control">
  </div>
  <div class="form-group">
    <label for="arrival">Arrival Time:</label>
    <input type="datetime-local" id="arrival" name="arrival" required class="form-control">
  </div>
  <div class="form-group">
    <label for="origin">Origin:</label>
    <input type="text" id="origin" name="origin" required class="form-control">
  </div>
  <div class="form-group">
    <label for="destination">Destination:</label>
    <input type="text" id="destination" name="destination" required class="form-control">
  </div>
  <div class="form-group">
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required class="form-control">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add Flight</button>
  </div>
</form>

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
    text-align: center;
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
@endsection
