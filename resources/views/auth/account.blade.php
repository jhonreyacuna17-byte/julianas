<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Account | Juliana's Gourmet</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-[#fff8f0] font-[Inter] text-[#1e1b16]"><main class="mx-auto max-w-2xl px-5 py-12"><div class="flex items-center justify-between"><a href="{{ url('/') }}" class="font-['Playfair_Display'] text-2xl font-bold text-[#2b1406]">Juliana's Gourmet</a><form method="POST" action="{{ route('logout') }}">@csrf<button class="text-sm font-semibold text-[#855310]">Log out</button></form></div><section class="mt-10 rounded-2xl bg-white p-7 shadow-xl"><p class="text-xs font-bold uppercase tracking-widest text-[#855310]">Customer account</p><h1 class="mt-2 font-['Playfair_Display'] text-3xl text-[#2b1406]">Hello, {{ auth()->user()->name }}!</h1><p class="mt-3 text-[#6e5c4f]">You are logged in as {{ auth()->user()->email }}.</p>@if (session('status'))<p class="mt-5 rounded-lg bg-[#f7dfbf] p-3 text-sm text-[#673d00]">{{ session('status') }}</p>@endif<a href="{{ route('shop') }}" class="mt-6 inline-block rounded-xl bg-[#2b1406] px-5 py-3 font-semibold text-white">Continue shopping</a></section></main></body>
</html>
