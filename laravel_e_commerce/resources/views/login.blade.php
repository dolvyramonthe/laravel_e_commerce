<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            background-image: url("https://media.istockphoto.com/id/1000167588/fr/photo/divers-bulle-th%C3%A9.jpg?s=612x612&w=0&k=20&c=JvgExUiqzQdMXuw5WaoR6TjE0YMqEYkeb6nSLrN_3xg=");
            background-size: cover;
            background-position: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .user-image {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        label,
        input {
            display: block;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0050a5;
        }

        .error-message {
            color: red;
        }

        .success-message {
            color: green;
        }
    </style>
</head>
<body>
    <img src="https://cours-informatique-gratuit.fr/wp-content/uploads/2014/05/compte-utilisateur-1.png" alt="User" class="user-image">
    <h2>Login</h2>
    
    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
