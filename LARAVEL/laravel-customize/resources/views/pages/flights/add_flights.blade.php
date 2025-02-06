@extends('master')

@section('content')

<h2>Add Flight</h2>

<form action="/add-flight" method="POST" class="flight-form">
  @csrf
  <div class="form-group">
    <label for="flightName">Flight Name</label>
    <input type="text" id="flightName" name="flightName" required class="form-control" placeholder="Enter flight name">
  </div>

  <div class="form-group">
    <label for="departure">Departure Time</label>
    <input type="datetime-local" id="departure" name="departure" required class="form-control">
  </div>

  <div class="form-group">
    <label for="arrival">Arrival Time</label>
    <input type="datetime-local" id="arrival" name="arrival" required class="form-control">
  </div>

  <div class="form-group">
    <label for="origin">Origin</label>
    <input type="text" id="origin" name="origin" required class="form-control" placeholder="Enter origin location">
  </div>

  <div class="form-group">
    <label for="destination">Destination</label>
    <input type="text" id="destination" name="destination" required class="form-control" placeholder="Enter destination location">
  </div>

  <div class="form-group">
    <label for="price">Price ($)</label>
    <input type="number" id="price" name="price" required class="form-control" placeholder="Enter flight price">
  </div>

  <div class="form-group">
    <button type="submit" class="btn-submit">Add Flight</button>
  </div>
</form>

@endsection

@section('styles')
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f7f9fc;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full viewport height */
  }

  h2 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 30px;
    font-size: 2em;
  }

  .flight-form {
    width: 80%; /* Set form width to 80% */
    max-width: 800px;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
    color: #34495e;
    margin-bottom: 8px;
    display: block;
  }

  input[type="text"],
  input[type="number"],
  input[type="datetime-local"] {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size: 16px;
  }

  input[type="text"]:focus,
  input[type="number"]:focus,
  input[type="datetime-local"]:focus {
    border-color: #3498db;
    outline: none;
  }

  .btn-submit {
    background-color: #3498db;
    color: white;
    padding: 14px 20px;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    width: 100%;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .btn-submit:hover {
    background-color: #2980b9;
  }

  .btn-submit:focus {
    outline: none;
  }

  .form-control {
    padding: 12px;
    margin-top: 5px;
    font-size: 16px;
    color: #34495e;
    border-radius: 8px;
    border: 1px solid #ccc;
  }

  .form-control:focus {
    border-color: #3498db;
    outline: none;
  }
</style>
@endsection
