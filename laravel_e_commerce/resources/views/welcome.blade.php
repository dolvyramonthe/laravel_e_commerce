@extends('layouts.header')

@section('content')
<div>
    <style>

            h1 {
                color: white;
                font-size: 28px;
                text-align: center;
            }

            p {
                color: #333;
                font-size: 16px;
                text-align: center;
            }
        </style>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Welcome to the BubbleMyTea App</h1>
    <p>Please login to continue:</p>
</div>
@endsection
