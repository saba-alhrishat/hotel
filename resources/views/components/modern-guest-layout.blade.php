<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'LUXLODGE') }}</title> --}}
    <title>LUXLODGE</title>

  <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Styles -->
    <style>
        .auth-bg {
            background: #f8f1e9; /* لون خلفية بني فاتح */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background-image: url('https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
        }
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(139, 69, 19, 0.15);
            width: 100%;
            max-width: 450px;
            padding: 2.5rem;
            border: 1px solid #e0c9b8;
        }
        .auth-logo {
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .auth-logo img {
            height: 70px;
        }
        .auth-title {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1.75rem;
            text-align: center;
            color: #8B4513; /* لون بني */
            font-family: 'Poppins', sans-serif;
        }
        .auth-input {
            width: 100%;
            padding: 0.85rem 1.25rem;
            border: 1px solid #d4b996;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
            background-color: #fffdfa;
            color: #5a3e36;
        }
        .auth-input:focus {
            outline: none;
            border-color: #a0522d;
            box-shadow: 0 0 0 3px rgba(160, 82, 45, 0.2);
        }
        .auth-button {
            background: #a0522d; /* لون بني محمر */
            color: white;
            padding: 0.85rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-family: 'Poppins', sans-serif;
        }
        .auth-button:hover {
            background: #8B4513; /* لون بني داكن */
            transform: translateY(-2px);
        }
        .auth-link {
            color: #a0522d;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        .auth-link:hover {
            color: #8B4513;
            text-decoration: underline;
        }
        .auth-footer {
            margin-top: 1.75rem;
            text-align: center;
            font-size: 0.9rem;
            color: #8B4513;
        }
        .remember-me {
            color: #5a3e36;
        }
        .checkbox:checked {
            background-color: #a0522d;
            border-color: #a0522d;
        }

        .error-message {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}



    </style>
</head>
<body class="auth-bg">
    {{ $slot }}
</body>
</html>