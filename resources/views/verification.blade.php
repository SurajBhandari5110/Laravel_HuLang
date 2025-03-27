<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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
            background: url(https://i.ibb.co/87GbbFP/2799006.jpg) no-repeat;
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
            text-align: center;
        }

        h1 {
            color: #ffffff; /* White text for contrast */
            margin-bottom: 30px;
            font-size: 2.2rem;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .otp-input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            font-size: 1rem;
            color: #ffffff;
            transition: all 0.3s ease;
            text-align: center;
        }

        .otp-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .otp-input:focus {
            outline: none;
            border-color: #00d4ff;
            box-shadow: 0 0 8px rgba(0, 212, 255, 0.4);
            background: rgba(255, 255, 255, 0.15);
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px;
            background: linear-gradient(45deg, #00d4ff, #007bff); /* Cyan to blue gradient */
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
            box-shadow: 0 8px 20px rgba(0, 212, 255, 0.5);
            background: linear-gradient(45deg, #00eaff, #008cff);
        }

        .resend-btn {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: linear-gradient(45deg, #ff6b6b, #ff8e53); /* Red to orange gradient */
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .resend-btn:disabled {
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            cursor: not-allowed;
            box-shadow: none;
            transform: none;
        }

        .resend-btn:not(:disabled):hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.5);
            background: linear-gradient(45deg, #ff8e53, #ff6b6b);
        }

        .timer {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            margin: 20px 0;
        }

        .error-message {
            color: #ff4d4d;
            margin: 15px 0;
            font-size: 0.9rem;
            background: rgba(255, 75, 75, 0.1);
            padding: 8px;
            border-radius: 5px;
        }

        .success-message {
            color: #4dff4d;
            margin: 15px 0;
            font-size: 0.9rem;
            background: rgba(75, 255, 75, 0.1);
            padding: 8px;
            border-radius: 5px;
        }

        .message {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            margin-top: 20px;
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
        <h1>OTP Verification</h1>

        <p id="message_error" class="error-message"></p>
        <p id="message_success" class="success-message"></p>

        <form method="post" id="verificationForm">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="form-group">
                <input type="number" name="otp" class="otp-input" placeholder="Enter OTP" required>
            </div>
            <input type="submit" class="btn" value="Verify">
        </form>

        <p class="timer"></p>

        <button id="resendOtpVerification" class="resend-btn" disabled>Resend Verification OTP</button>
    </div>
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let timerInterval;
            const resendButton = $('#resendOtpVerification');
            const timerDisplay = $('.timer');

            function startTimer(duration) {
                let timer = duration, minutes, seconds;
                timerInterval = setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    timerDisplay.text(`Resend OTP in ${minutes}:${seconds}`);

                    if (--timer < 0) {
                        clearInterval(timerInterval);
                        timerDisplay.text('');
                        resendButton.prop('disabled', false);
                    }
                }, 1000);
            }

            function resetTimer() {
                clearInterval(timerInterval);
                resendButton.prop('disabled', true);
                startTimer(60); // 1 minute timer
            }

            // Start timer on page load
            startTimer(60);

            $('#verificationForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('verifiedOtp') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        if (res.success) {
                            $('#message_success').text(res.msg);
                            setTimeout(() => {
                                window.location.href = "/";
                            }, 2000);
                        } else {
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('');
                            }, 3000);
                        }
                    }
                });
            });

            resendButton.click(function() {
                $(this).prop('disabled', true).text('Wait...');
                var userMail = @json($email);

                $.ajax({
                    url: "{{ route('resendOtp') }}",
                    type: "GET",
                    data: { email: userMail },
                    success: function(res) {
                        resendButton.text('Resend Verification OTP');
                        if (res.success) {
                            $('#message_success').text(res.msg);
                            setTimeout(() => {
                                $('#message_success').text('');
                            }, 3000);
                            resetTimer();
                        } else {
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('');
                            }, 3000);
                            resendButton.prop('disabled', false);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        .container h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .message {
            margin-bottom: 15px;
            font-size: 14px;
        }
        .message.error {
            color: red;
        }
        .message.success {
            color: green;
        }
        .otp-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
        }
        .otp-input:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .timer {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
        .resend-btn {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
        }
        .resend-btn:disabled {
            color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>OTP Verification</h1>

        <p id="message_error" class="message error"></p>
        <p id="message_success" class="message success"></p>

        <form method="post" id="verificationForm">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="number" name="otp" class="otp-input" placeholder="Enter OTP" required>
            <input type="submit" class="btn" value="Verify">
        </form>

        <p class="timer"></p>

        <button id="resendOtpVerification" class="resend-btn" disabled>Resend Verification OTP</button>
        
    </div>
    <div style="text-align: center; margin-top: 15px;">
        <p class="message">If you don’t receive the OTP, please check your spam folder in Gmail.</p>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let timerInterval;
            const resendButton = $('#resendOtpVerification');
            const timerDisplay = $('.timer');

            function startTimer(duration) {
                let timer = duration, minutes, seconds;
                timerInterval = setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    timerDisplay.text(`Resend OTP in ${minutes}:${seconds}`);

                    if (--timer < 0) {
                        clearInterval(timerInterval);
                        timerDisplay.text('');
                        resendButton.prop('disabled', false);
                    }
                }, 1000);
            }

            function resetTimer() {
                clearInterval(timerInterval);
                resendButton.prop('disabled', true);
                startTimer(60); // 1 minute timer
            }

            $('#verificationForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('verifiedOtp') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        if (res.success) {
                            $('#message_success').text(res.msg);
                            setTimeout(() => {
                                window.location.href = "/";
                            }, 2000);
                        } else {
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('');
                            }, 3000);
                        }
                    }
                });
            });

            resendButton.click(function() {
                $(this).prop('disabled', true).text('Wait...');
                var userMail = @json($email);

                $.ajax({
                    url: "{{ route('resendOtp') }}",
                    type: "GET",
                    data: { email: userMail },
                    success: function(res) {
                        resendButton.text('Resend Verification OTP');
                        if (res.success) {
                            $('#message_success').text(res.msg);
                            setTimeout(() => {
                                $('#message_success').text('');
                            }, 3000);
                            resetTimer();
                        } else {
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('');
                            }, 3000);
                            resendButton.prop('disabled', false);
                        }
                    }
                });
            });

            // Initialize timer on page load
            resetTimer();
        });
    </script>
</body>
</html> -->
