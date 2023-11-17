<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px; 
            background-image: url("https://t3.ftcdn.net/jpg/04/64/30/76/360_F_464307620_CYWfA00cdwwtYPxXMfFpbTjVjaFYmP93.jpg");
            background-size: cover;
        }

        
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #0066cc;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0050a5;
        }

        p {
            text-align: center;
            margin-top: 10px;
        }

        p a {
            color: #0066cc;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Sign In</h2>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>
