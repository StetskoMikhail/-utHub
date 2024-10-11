<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('resources/css/styleRegForm.css')}}">
</head>
<body>
<div class="wrapper">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <h2>Login</h2>
        <div class="input-field">
        <input type="text" name="telephoneNumber" required>
        <label>Enter your telephone number</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="#">Register</a></p>
      </div>
    </form>
</div>
<style>
body::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url("{{ asset('public/images/backgroundReg.jpg') }}"), #000;
  background-position: center;
  background-size: cover;
}
</style>
</body>
</html>