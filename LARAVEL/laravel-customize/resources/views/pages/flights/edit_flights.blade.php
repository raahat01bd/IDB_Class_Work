@extends('master')

@section('content')

<h2>Edit Flight</h2>

<form action="/update-flight/{{ $flight->id }}" method="POST" class="flight-form">
  @csrf
  @method('POST')
  
  <div class="form-group">
    <label for="flightName">Flight Name</label>
    <input type="text" id="flightName" name="flightName" value="{{ $flight->flightName }}" required class="form-control" placeholder="Enter flight name">
  </div>

  <div class="form-group">
    <label for="departure">Departure Time</label>
    <input type="datetime-local" id="departure" name="departure" value="{{ \Carbon\Carbon::parse($flight->departure)->format('Y-m-d\TH:i') }}" required class="form-control">
  </div>

  <div class="form-group">
    <label for="arrival">Arrival Time</label>
    <input type="datetime-local" id="arrival" name="arrival" value="{{ \Carbon\Carbon::parse($flight->arrival)->format('Y-m-d\TH:i') }}" required class="form-control">
  </div>

  <div class="form-group">
    <label for="origin">Origin</label>
    <input type="text" id="origin" name="origin" value="{{ $flight->origin }}" required class="form-control" placeholder="Enter origin location">
  </div>

  <div class="form-group">
    <label for="destination">Destination</label>
    <input type="text" id="destination" name="destination" value="{{ $flight->destination }}" required class="form-control" placeholder="Enter destination location">
  </div>

  <div class="form-group">
    <label for="price">Price ($)</label>
    <input type="number" id="price" name="price" value="{{ $flight->price }}" required class="form-control" placeholder="Enter flight price">
  </div>

  <div class="form-group">
    <button type="submit" class="btn-submit">Update Flight</button>
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
  }

  h2 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 30px;
  }

  .flight-form {
    max-width: 600px;
    margin: 0 auto;
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
    padding: 10px;
    border-radius: 4px;
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
    padding: 12px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    width: 100%;
    cursor: pointer;
  }

  .btn-submit:hover {
    background-color: #2980b9;
  }

  .btn-submit:focus {
    outline: none;
  }

  .form-control {
    padding: 10px;
    margin-top: 5px;
    font-size: 14px;
    color: #34495e;
    border-radius: 4px;
    border: 1px solid #ccc;
  }

  .form-control:focus {
    border-color: #3498db;
    outline: none;
  }
</style>
@endsection
