<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hulang Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        /* Background Animation */
        .bg {
            background: url(https://images.unsplash.com/photo-1598644656788-c77be17dfc56?q=80&w=2102&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D) no-repeat;
            background-size: cover;
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -3;
        }

        .bg:before {
            content: "";
            width: 100%;
            height: 100%;
            background: #000;
            position: fixed;
            z-index: -1;
            top: 0;
            left: 0;
            opacity: 0.3;
        }

        @keyframes sf-fly-by-1 {
            from {
                transform: translateZ(-600px);
                opacity: 0.5;
            }
            to {
                transform: translateZ(0);
                opacity: 0.5;
            }
        }

        @keyframes sf-fly-by-2 {
            from {
                transform: translateZ(-1200px);
                opacity: 0.5;
            }
            to {
                transform: translateZ(-600px);
                opacity: 0.5;
            }
        }

        @keyframes sf-fly-by-3 {
            from {
                transform: translateZ(-1800px);
                opacity: 0.5;
            }
            to {
                transform: translateZ(-1200px);
                opacity: 0.5;
            }
        }

        .star-field {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            perspective: 600px;
            -webkit-perspective: 600px;
            z-index: -1;
        }

        .star-field .layer {
            box-shadow: -411px -476px #cccccc, 777px -407px #d4d4d4, -387px -477px #fcfcfc, -91px -235px #d4d4d4, 491px -460px #f7f7f7, 892px -128px #f7f7f7, 758px -277px #ededed, 596px 378px #cccccc, 647px 423px whitesmoke, 183px 389px #c7c7c7,
                524px -237px #f0f0f0, 679px -535px #e3e3e3, 158px 399px #ededed, 157px 249px #ededed, 81px -450px #ebebeb, 719px -360px #c2c2c2, -499px 473px #e8e8e8, -158px -349px #d4d4d4, 870px -134px #cfcfcf, 446px 404px #c2c2c2,
                440px 490px #d4d4d4, 414px 507px #e6e6e6, -12px 246px #fcfcfc, -384px 369px #e3e3e3, 641px -413px #fcfcfc, 822px 516px #dbdbdb, 449px 132px #c2c2c2, 727px 146px #f7f7f7, -315px -488px #e6e6e6, 952px -70px #e3e3e3,
                -869px -29px #dbdbdb, 502px 80px #dedede, 764px 342px #e0e0e0, -150px -380px #dbdbdb, 654px -426px #e3e3e3, -325px -263px #c2c2c2, 755px -447px #c7c7c7, 729px -177px #c2c2c2, -682px -391px #e6e6e6, 554px -176px #ededed,
                -85px -428px #d9d9d9, 714px 55px #e8e8e8, 359px -285px #cfcfcf, -362px -508px #dedede, 468px -265px #fcfcfc, 74px -500px #c7c7c7, -514px 383px #dbdbdb, 730px -92px #cfcfcf, -112px 287px #c9c9c9, -853px 79px #d6d6d6,
                828px 475px #d6d6d6, -681px 13px #fafafa, -176px 209px #f0f0f0, 758px 457px #fafafa, -383px -454px #ededed, 813px 179px #d1d1d1, 608px 98px whitesmoke, -860px -65px #c4c4c4, -572px 272px #f7f7f7, 459px 533px #fcfcfc,
                624px -481px #e6e6e6, 790px 477px #dedede, 731px -403px #ededed, 70px -534px #cccccc, -23px 510px #cfcfcf, -652px -237px whitesmoke, -690px 367px #d1d1d1, 810px 536px #d1d1d1, 774px 293px #c9c9c9, -362px 97px #c2c2c2,
                563px 47px #dedede, 313px 475px #e0e0e0, 839px -491px #e3e3e3, -217px 377px #d4d4d4, -581px 239px #c2c2c2, -857px 72px #cccccc, -23px 340px #dedede, -837px 246px white, 170px -502px #cfcfcf, 822px -443px #e0e0e0, 795px 497px #e0e0e0,
                -814px -337px #cfcfcf, 206px -339px #f2f2f2, -779px 108px #e6e6e6, 808px 2px #d4d4d4, 665px 41px #d4d4d4, -564px 64px #cccccc, -380px 74px #cfcfcf, -369px -60px #f7f7f7, 47px -495px #e3e3e3, -383px 368px #f7f7f7, 419px 288px #d1d1d1,
                -598px -50px #c2c2c2, -833px 187px #c4c4c4, 378px 325px whitesmoke, -703px 375px #d6d6d6, 392px 520px #d9d9d9, -492px -60px #c4c4c4, 759px 288px #ebebeb, 98px -412px #c4c4c4, -911px -277px #c9c9c9;
            transform-style: preserve-3d;
            position: absolute;
            top: 50%;
            left: 50%;
            height: 4px;
            width: 4px;
            border-radius: 2px;
        }

        .star-field .layer:nth-child(1) {
            animation: sf-fly-by-1 5s linear infinite;
        }

        .star-field .layer:nth-child(2) {
            animation: sf-fly-by-2 5s linear infinite;
        }

        .star-field .layer:nth-child(3) {
            animation: sf-fly-by-3 5s linear infinite;
        }

        /* Form Styles */
        .container {
            width: 400px;
            background: rgba(30, 30, 50, 0.2); /* Smoky dark translucent background */
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(15px); /* Enhanced blur for smoky effect */
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
        }

        .logo {
            margin: 0 0 30px;
            text-align: center;
        }

        .logo img {
            max-width: 200px;
            transition: transform 0.3s ease;
            filter: brightness(1.2); /* Makes logo pop against dark background */
        }

        .logo img:hover {
            transform: scale(1.05);
        }

        h1 {
            text-align: center;
            color: #ffffff; /* White text for contrast */
            margin-bottom: 30px;
            font-size: 2.2rem;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1); /* Slight transparency */
            font-size: 1rem;
            color: #ffffff; /* White text */
            transition: all 0.3s ease;
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.7); /* Light placeholder text */
        }

        .form-group input:focus {
            outline: none;
            border-color: #00d4ff; /* Cyan border on focus */
            box-shadow: 0 0 8px rgba(0, 212, 255, 0.4);
            background: rgba(255, 255, 255, 0.15);
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #00d4ff; /* Cyan color for visibility */
            font-size: 0.9rem;
            font-weight: 500;
            user-select: none;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: #ffffff;
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px;
            background: linear-gradient(45deg, #0048a1, #232b40); /* Vibrant gradient */
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.5);
            background: linear-gradient(45deg, #ff8e53, #ff6b6b);
        }

        .login-container {
            text-align: center;
            margin-top: 25px;
        }

        .login-container a {
            color: #ff8e53; /* Warm orange link color */
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-container a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .login-container p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
        }

        .error-message {
            color: #ff4d4d; /* Vibrant red for errors */
            margin: 15px 0;
            font-size: 0.9rem;
            text-align: center;
            background: rgba(255, 75, 75, 0.1);
            padding: 8px;
            border-radius: 5px;
        }

        .success-message {
            color: #4dff4d; /* Vibrant green for success */
            margin: 15px 0;
            font-size: 0.9rem;
            text-align: center;
            background: rgba(75, 255, 75, 0.1);
            padding: 8px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="bg"></div>
    <div class="star-field">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
    </div>

    <div class="container">
        <div class="logo">
       <img src="{{ url('logo/white_logo.png')}}" alt="Logo" width="300">
        </div>

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
            <div class="form-group">
                <input type="text" name="name" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="form-group password-container">
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
                <span class="toggle-password" onclick="togglePassword('password')">Show</span>
            </div>
            <div class="form-group password-container">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                <span class="toggle-password" onclick="togglePassword('password_confirmation')">Show</span>
            </div>
            <input type="submit" value="Register">
        </form>

        <div class="login-container">
            <p>Already have an account? <a href="{{ url('/login') }}">Log in</a></p>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleText = passwordInput.nextElementSibling;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleText.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleText.textContent = 'Show';
            }
        }
    </script>
</body>
</html>

<!-- <!DOCTYPE html>
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
</html> -->
