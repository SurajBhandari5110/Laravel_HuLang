<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #ffffff;
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
        .register-container {
            background-color: #fff;
            border: 1px solid #dbdbdb;
            padding: 20px;
        }
        .register-container a {
            color: #0095f6;
            text-decoration: none;
            font-weight: bold;
        }
        .register-container a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ url('hulang.png')}}" alt="Logo" width="300">
        </div>
        <div class="form-container">
            <h1>Login</h1>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="error-message">{{ $error }}</p>
                @endforeach
            @endif

            @if(Session::has('error'))
                <p class="error-message">{{ Session::get('error') }}</p>
            @endif

            <form action="{{ route('userLogin') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Enter Email" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                <input type="submit" value="Login">
            </form>
        </div>
        <div class="register-container">
            <p>Don't have an account? <a href="{{ url('/register') }}">Sign up</a></p>
        </div>
    </div>
</body>
</html>
