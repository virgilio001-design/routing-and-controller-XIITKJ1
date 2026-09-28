@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mx-auto max-w-md">
        <div class="mb-8 border-b border-[#E5E3DB] pb-5">
            <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">Akun Sekolah</p>
            <h1 class="font-display text-3xl font-semibold text-[#16213A]">Buat Akun Siswa</h1>
        </div>

        <form action="{{ route('register-post') }}" method="POST" class="space-y-5 border border-[#E5E3DB] bg-white p-8">
            @csrf
            <div>
                <label for="name" class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('name') <p class="mt-1 text-sm text-red-700">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="email" class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('email') <p class="mt-1 text-sm text-red-700">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="password" class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Kata Sandi</label>
                <input type="password" id="password" name="password" required autocomplete="new-password" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('password') <p class="mt-1 text-sm text-red-700">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="password_confirmation" class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Ulangi Kata Sandi</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
            </div>
            <div class="flex items-center justify-between border-t border-[#EFEDE6] pt-5">
                <a href="{{ route('login-view') }}" class="text-sm text-slate-500 hover:text-[#16213A]">Sudah punya akun?</a>
                <button type="submit" class="bg-[#16213A] px-6 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">Daftar</button>
            </div>
        </form>
    </div>
@endsection