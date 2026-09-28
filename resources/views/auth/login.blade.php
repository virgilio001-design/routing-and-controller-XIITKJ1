@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mx-auto max-w-md">
        <div class="mb-8 border-b border-[#E5E3DB] pb-5">
            <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">Akun Sekolah</p>
            <h1 class="font-display text-3xl font-semibold text-[#16213A]">Masuk</h1>
        </div>

        <form action="{{ route('login-post') }}" method="POST" class="space-y-5 border border-[#E5E3DB] bg-white p-8">
            @csrf
            <div>
                <label for="email" class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('email') <p class="mt-1 text-sm text-red-700">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="password" class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Kata Sandi</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('password') <p class="mt-1 text-sm text-red-700">{{ $message }}</p> @enderror
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" value="1" @checked(old('remember')) class="border-[#D9D6CD]">
                Ingat saya
            </label>
            <div class="flex items-center justify-between border-t border-[#EFEDE6] pt-5">
                <a href="{{ route('register-view') }}" class="text-sm text-slate-500 hover:text-[#16213A]">Buat akun</a>
                <button type="submit" class="bg-[#16213A] px-6 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">Masuk</button>
            </div>
        </form>
    </div>
@endsection