@extends('layouts.header')

@section('content')

<style>
        
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            vertical-align: middle; 
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: gray;
        }

    </style>
    <div>
        @auth
            <h1 style="font-size: 24px; color: #fff; margin-bottom: 20px;">Manage Users</h1>

            <table>
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->isActive === 1 ? "Active" : "Inactive" }}</td>
                            <td>
                                @if($user->id !== auth()->user()->id)
                                    <a href="{{ route('users.edit', $user->id) }}" style="text-decoration: none; color: blue; margin-right: 10px;">Update</a>
                                    <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $user->id }})" style="padding: 5px 10px; background-color: red; color: white; border: none; cursor: pointer;">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('addadmin') }}" style="text-decoration: none; display: block; color: violet; margin-top: 20px; font-size: 20px;">Add +</a>
        @endauth
    </div>

    <script>
        function confirmDelete(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
@endsection
