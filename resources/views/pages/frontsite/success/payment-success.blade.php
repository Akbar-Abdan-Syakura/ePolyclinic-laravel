@extends('layouts.default')

@section('title', 'Your Payment & Booking Success')

@section('content')
<!-- Content -->
<div class="min-h-screen flex justify-center items-center pt-20 py-28">
    <div class="mx-auto text-center">
        <img src="{{ asset('/assets/frontsite/images/sign-up-success-ilustration.svg') }}" class="inline-block"
            alt="Sign up success ilustration" />
        <div class="mt-12">
            <h2 class="text-[#1E2B4F] text-2xl font-semibold">Sukses Booking</h2>
            <p class="text-[#AFAEC3] mt-4">
                Pastikan Anda tidak terlambat untuk
                <br />
                mendapatkan pelayanan yang terbaik
            </p>
            <a href="{{ route('index') }}" class="inline-block mt-10 bg-[#DA1B4F] text-white rounded-full px-14 py-3">
                Home
            </a>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection
