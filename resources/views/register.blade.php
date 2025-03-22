<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #fafafa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 350px;
            text-align: center;
        }
        .logo {
            margin: 20px 0;
        }
        .form-container {
            background-color: #fff;
            border: 1px solid #dbdbdb;
            padding: 20px;
            margin-bottom: 10px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #dbdbdb;
            border-radius: 3px;
            background: #fafafa;
        }
        .form-container input:focus {
            outline: none;
            border-color: #a8a8a8;
        }
        .form-container input[type="submit"] {
            background-color: #0095f6;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        .form-container input[type="submit"]:hover {
            background-color: #007dc1;
        }
        .login-container {
            background-color: #fff;
            border: 1px solid #dbdbdb;
            padding: 20px;
        }
        .login-container a {
            color: #0095f6;
            text-decoration: none;
            font-weight: bold;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin: 10px 0;
        }
        .success-message {
            color: green;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Instagram_logo.svg" alt="Logo" width="200">
        </div>
        <div class="form-container">
            <h1>Register</h1>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="error-message">{{ $error }}</p>
                @endforeach
            @endif

            @if(Session::has('success'))
                <p class="success-message">{{ Session::get('success') }}</p>
            @endif

            <form action="{{ route('studentRegister') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Enter Name" required>
                <input type="email" name="email" placeholder="Enter Email" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <input type="submit" value="Register">
            </form>
        </div>
        <div class="login-container">
            <p>Already have an account? <a href="{{ url('/login') }}">Log in</a></p>
        </div>
    </div>
</body>
</html>
