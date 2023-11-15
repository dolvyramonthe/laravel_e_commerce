<!DOCTYPE html>
<html>
<head>
    <title>BubbleMyTea App</title>
</head>
<body>
    <nav>
        <ul>
            @auth <!-- If the user is authenticated -->
                @if(!Request::is('admin', 'user')) <!-- If the user is not on admin or user page -->
                    <li><a href="{{ auth()->user()->role === 'admin' ? route('admin') : route('user') }}">Home</a></li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @else <!-- If the user is not authenticated -->
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </nav>

    <div>
        @yield('content') <!-- Content section to be included in each view -->
    </div>
</body>
</html>
