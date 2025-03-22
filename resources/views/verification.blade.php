<!DOCTYPE html>
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
</html>
