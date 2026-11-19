<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Login | Juliana's Gourmet</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="flex min-h-screen items-center justify-center bg-[#fff8f0] px-5 font-[Inter] text-[#1e1b16]">
<main class="w-full max-w-md rounded-2xl bg-white p-7 shadow-xl sm:p-9">
    <a href="{{ url('/') }}" class="font-['Playfair_Display'] text-2xl font-bold text-[#2b1406]">Juliana's Gourmet</a>
    <h1 class="mt-8 font-['Playfair_Display'] text-3xl text-[#2b1406]">Welcome back</h1>
    <p class="mt-2 text-sm text-[#6e5c4f]">Log in to manage your orders and saved details.</p>
    @if (session('status'))<p class="mt-4 rounded-lg bg-[#f7dfbf] p-3 text-sm text-[#673d00]">{{ session('status') }}</p>@endif
    <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-4">@csrf
        <div><label for="email" class="mb-1 block text-sm font-semibold">Email address</label><input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email" class="w-full rounded-xl border border-[#eadbca] px-4 py-3 outline-none focus:border-[#855310] focus:ring-2 focus:ring-[#f7dfbf]">@error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror</div>
        <div><label for="password" class="mb-1 block text-sm font-semibold">Password</label><input id="password" name="password" type="password" required autocomplete="current-password" class="w-full rounded-xl border border-[#eadbca] px-4 py-3 outline-none focus:border-[#855310] focus:ring-2 focus:ring-[#f7dfbf]">@error('password')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror</div>
        <label class="flex items-center gap-2 text-sm text-[#6e5c4f]"><input type="checkbox" name="remember" class="rounded"> Remember me</label>
        <button class="w-full rounded-xl bg-[#2b1406] py-3 font-semibold text-white transition hover:bg-[#432818]">Log in</button>
    </form>
    <p class="mt-6 text-center text-sm text-[#6e5c4f]">New customer? <a href="{{ route('register') }}" class="font-semibold text-[#855310]">Create an account</a></p>
</main>
</body>
</html>
