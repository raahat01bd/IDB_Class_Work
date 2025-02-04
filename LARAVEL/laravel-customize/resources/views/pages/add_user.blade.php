@extends('master')
@section('content')



  <h2>Add User Data</h2>
  <form action="/submit" method="POST">
    <table border="1">
      <tr>
        <td><label for="firstName">First Name:</label></td>
        <td><input type="text" id="firstName" name="firstName" required></td>
      </tr>
      <tr>
        <td><label for="lastName">Last Name:</label></td>
        <td><input type="text" id="lastName" name="lastName" required></td>
      </tr>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><input type="email" id="email" name="email" required></td>
      </tr>
      <tr>
        <td><label for="phone">Phone Number:</label></td>
        <td><input type="tel" id="phone" name="phone" required></td>
      </tr>
      <tr>
        <td><label for="dob">Date of Birth:</label></td>
        <td><input type="date" id="dob" name="dob" required></td>
      </tr>
      <tr>
        <td><label for="address">Address:</label></td>
        <td><input type="text" id="address" name="address" required></td>
      </tr>
      <tr>
        <td><label for="gender">Gender:</label></td>
        <td>
          <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="country">Country:</label></td>
        <td><input type="text" id="country" name="country" required></td>
      </tr>
      <tr>
        <td><label for="password">Password:</label></td>
        <td><input type="password" id="password" name="password" required></td>
      </tr>
      <tr>
        <td><label for="confirmPassword">Confirm Password:</label></td>
        <td><input type="password" id="confirmPassword" name="confirmPassword" required></td>
      </tr>
    </table>
    <br>
    <button type="submit">Submit</button>
  </form>

@endsection