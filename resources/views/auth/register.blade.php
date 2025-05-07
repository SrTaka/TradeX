<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TradeX - Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Nunito', sans-serif; background: #f6f8fb; }
        .btn-blue { background: #2563eb; color: #fff; border-radius: 0.5rem; padding: 0.75rem 2.5rem; font-weight: 700; font-size: 1.1rem; transition: background 0.2s; }
        .btn-blue:hover { background: #1d4ed8; }
        .btn-outline { background: #fff; color: #111; border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 0.75rem 2.5rem; font-weight: 700; font-size: 1.1rem; transition: background 0.2s; }
        .btn-outline:hover { background: #f3f4f6; }
        .nav-link { font-weight: 600; color: #222; margin: 0 1.5rem; transition: color 0.2s; }
        .nav-link:hover { color: #2563eb; }
        .nav-link.active { color: #2563eb; }
        .form-card { background: #fff; border-radius: 1rem; box-shadow: 0 2px 16px 0 #e5e7eb; padding: 2.5rem 2rem; max-width: 480px; margin: 3rem auto 0 auto; }
        .form-title { font-size: 2rem; font-weight: 800; text-align: center; margin-bottom: 0.5rem; }
        .form-subtitle { text-align: center; color: #64748b; margin-bottom: 2rem; }
        .form-label { font-weight: 700; margin-bottom: 0.25rem; display: block; }
        .form-input { width: 100%; border-radius: 0.5rem; border: 1px solid #e5e7eb; background: #f6f8fb; padding: 0.75rem 1rem; font-size: 1rem; margin-bottom: 1.25rem; }
        .form-input:focus { outline: none; border-color: #2563eb; background: #fff; }
        .form-link { color: #2563eb; text-decoration: underline; }
        .form-link:hover { color: #1d4ed8; }
        .form-footer { text-align: center; margin-top: 1.5rem; color: #64748b; }
        .form-checkbox { margin-right: 0.5rem; }
        .form-policy { color: #2563eb; text-decoration: underline; }
    </style>
</head>
<body>
    <nav class="flex justify-between items-center max-w-7xl mx-auto py-6 px-4">
        <div class="text-2xl font-extrabold" style="color:#2563eb;">TradeX</div>
        <div class="flex gap-8 items-center">
            <a href="#features" class="nav-link">Features</a>
            <a href="#pricing" class="nav-link">Pricing</a>
            <a href="#about" class="nav-link">About</a>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('login') }}" class="btn-outline" style="font-size:1rem;padding:0.5rem 1.5rem;">Log in</a>
            <a href="{{ route('register') }}" class="btn-blue" style="font-size:1rem;padding:0.5rem 1.5rem;">Sign up</a>
        </div>
    </nav>
    <div class="form-card">
        <div class="form-title">Create an account</div>
        <div class="form-subtitle">Enter your information to create your account</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name" class="form-label">Name</label>
            <input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" placeholder="********" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="********" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            <div class="flex items-center mb-4">
                <input id="terms" type="checkbox" class="form-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" required>
                <label for="terms" class="text-sm text-gray-700">I agree to the <a href="#" class="form-policy">terms of service</a> and <a href="#" class="form-policy">privacy policy</a>.</label>
            </div>
            <button type="submit" class="btn-blue w-full">Create account</button>
        </form>
        <div class="form-footer mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="form-link">Log in</a>
        </div>
    </div>
</body>
</html>
