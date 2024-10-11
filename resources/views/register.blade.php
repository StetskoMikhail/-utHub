<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('resources/css/styleRegForm.css') }}">
</head>
<body>
<div class="wrapper">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <h2>Sign up</h2>
        <div class="input-field">
            <input type="text" name="name" required>
            <label>Enter your name</label>
        </div>
        <div class="input-field">
            <input type="email" name="email" required>
            <label>Enter your email</label>
        </div>
        <div class="input-field">
        <input type="text" id="telephoneNumber" name="telephoneNumber" required placeholder="+375 (__) ___-__-__">
            <label>Enter your telephone number</label>
        </div>

        <div class="input-field">
            <input type="password" name="password" required>
            <label>Enter your password</label>
        </div>
        <div class="input-field">
            <input type="password" name="password_confirmation" required>
            <label>Confirm your password</label>
        </div>
        <button type="submit">Create account</button>
    </form>
</div>
<style>
body::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url("{{ asset('public/images/background3.jpg') }}"), #000;
  background-position: center;
  background-size: cover;
}
</style>
</body>
</html>
