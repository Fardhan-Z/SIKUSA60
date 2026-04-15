{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - E-Store</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        .left {
            width: 50%;
            background: #f0f4ff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            width: 80%;
            max-width: 400px;
        }

        .form-container h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 6px;
            color: #34495e;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .form-container button {
            width: 100%;
            background: #5177ff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
        }

        .estore-logo {
            font-size: 24px;
            font-weight: bold;
            color: #5177ff;
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            justify-content: center;
        }

        .right {
            width: 50%;
            background: linear-gradient(135deg, #5177ff, #4fc3f7);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px;
        }

        .right img {
            width: 200px;
            margin-bottom: 20px;
        }

        .right p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .right .login-btn {
            background-color: white;
            color: #5177ff;
            padding: 12px 40px;
            border: none;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="left">
        <div class="form-container">
            <div class="estore-logo">
                 <span>SIKUSA</span>
            </div>
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <label for="name">NAME</label>
                <input type="text" id="name" name="name" required>

                <label for="email">EMAIL</label>
                <input type="email" id="email" name="email" required>

                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" required>

                <label for="password_confirmation">CONFIRM PASSWORD</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>

                <button type="submit">SIGN UP</button>
            </form>
        </div>
    </div>
    <div class="right">
        <p>Already have an account?</p>
        <a href="{{ route('login') }}">
            <button class="login-btn">LOG IN</button>
        </a>
    </div>
</body>
</html> --}}
