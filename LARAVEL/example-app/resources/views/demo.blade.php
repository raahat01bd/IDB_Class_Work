<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Signup Page</title>
  <style>
    /* Reset default margins and paddings */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .signup-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      box-sizing: border-box;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .input-group {
      margin-bottom: 15px;
    }

    .input-group label {
      display: block;
      font-size: 14px;
      color: #333;
      margin-bottom: 5px;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .input-group input:focus {
      outline: none;
      border-color: #4CAF50;
    }

    .btn-submit {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      color: #fff;
      background-color: #4CAF50;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
      background-color: #45a049;
    }

    .footer-text {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }

    .footer-text a {
      text-decoration: none;
      color: #4CAF50;
    }

    /* Responsive Styles */
    @media (max-width: 480px) {
      .signup-container {
        padding: 20px;
      }

      .input-group input {
        padding: 8px;
      }

      .btn-submit {
        padding: 10px;
      }
    }
  </style>
</head>
<body>

  <div class="signup-container">
    <h2>Create an Account</h2>
    <form action="#" method="POST">
      <div class="input-group">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="first-name" required placeholder="Enter your first name">
      </div>

      <div class="input-group">
        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" name="last-name" required placeholder="Enter your last name">
      </div>

      <div class="input-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email">
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Create a password">
      </div>

      <div class="input-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" required placeholder="Confirm your password">
      </div>

      <button type="submit" class="btn-submit">Sign Up</button>
    </form>

    <div class="footer-text">
      <p>Already have an account? <a href="#">Login here</a></p>
    </div>
  </div>

</body>
</html>
