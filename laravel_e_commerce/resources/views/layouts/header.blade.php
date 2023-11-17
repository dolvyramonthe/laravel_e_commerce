<!DOCTYPE html>
<html>
<head>
    <title>BubbleMyTea App</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("https://media.licdn.com/dms/image/D5612AQEnnEyzN5eYOg/article-cover_image-shrink_720_1280/0/1677693807803?e=2147483647&v=beta&t=cMvWu9pUsFe01TYLXhz8HnCAIvMfKAq_Hb1JkEP4gYo");
            background-size: cover;
        }

        nav {
            background-color: #333;
            color: white;
            padding: 10px;
            overflow: hidden;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: right;
        }

        nav ul li {
            display: inline;
            margin-left: 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Conteneur pour le contenu dynamique */
        .content-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .user-section{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .user-section div{
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 50px;
            margin: 0;
        }

        .user-section h1{
            color: #fff;
        }

        .user-section p{
            margin-bottom: 20px;
        }

        .user-section ul{
            list-style-type: none;
            padding: 0;
        }

        .user-section li{
            margin-bottom: 10px;
        }

        .user-section a{
            display: inline-block;
            padding: 8px 16px;
            background-color: gray;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .user-section a:hover{
            background-color: #0050a5;
        }

        .profile-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        .profile-form h1 {
            text-align: center;
            color: #0066cc;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type="text"],
        input[type="email"] {
            width: 20%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .profile-form button[type="submit"] {
            padding: 10px 20px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .profile-form button[type="submit"]:hover {
            background-color: #0050a5;
        }

        .admin-section{
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .admin-section h1 {
            color: #fff;
            margin-bottom: 10px;
        }

        .user-avatar {
            margin-bottom: 20px;
        }

        .user-avatar img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
        }

        .admin-section p {
            margin-bottom: 20px;
        }

        .admin-section ul {
            list-style-type: none;
            padding: 0;
        }

        .admin-section li {
            margin-bottom: 10px;
        }

        .admin-section a {
            display: inline-block;
            padding: 8px 16px;
            background-color: gray;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .admin-section a:hover {
            background-color: #0050a5;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            @auth <!-- If the user is authenticated -->
            @if(!Request::is('superadmin', 'admin', 'user')) <!-- If the user is not on superadmin, admin, or user page -->
                <li><a href="{{ auth()->user()->role === 'superadmin' ? route('superadmin') : (auth()->user()->role === 'admin' ? route('admin') : route('user')) }}">Home</a></li>
            @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @else <!-- If the user is not authenticated -->
                <li style="float: right;"><a href="{{ route('login') }}">Login</a></li>
                <li style="float: right;"><a href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </nav>

    <div>
        @yield('content') <!-- Content section to be included in each view -->
    </div>
</body>
</html>
