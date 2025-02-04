@extends('master')
@section('content')


  <h2>Manage User Data</h2>
  
  <!-- Table for displaying user data -->
  <table border="1" cellpadding="10">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Country</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john.doe@example.com</td>
        <td>+1 234 567 8901</td>
        <td>1990-05-01</td>
        <td>Male</td>
        <td>USA</td>
        <td>
          <button onclick="editUser()">Edit</button>
          <button onclick="deleteUser()">Delete</button>
        </td>
      </tr>
      <tr>
        <td>Jane</td>
        <td>Smith</td>
        <td>jane.smith@example.com</td>
        <td>+1 987 654 3210</td>
        <td>1992-07-20</td>
        <td>Female</td>
        <td>UK</td>
        <td>
          <button onclick="editUser()">Edit</button>
          <button onclick="deleteUser()">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>

  <br>
  <button onclick="addUser()">Add New User</button>

  <script>
    // Function to simulate user editing
    function editUser() {
      alert('Edit user functionality');
    }

    // Function to simulate user deletion
    function deleteUser() {
      alert('Delete user functionality');
    }

    // Function to simulate adding a new user
    function addUser() {
      alert('Add new user functionality');
    }
  </script>


@endsection