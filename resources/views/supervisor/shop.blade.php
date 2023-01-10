@extends('master')
@section('title', 'All Shop')

@section('content')

    <h1 class="font-bold text-xl text-center mb-3">Semua Toko</h1>
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
        @forelse ($sellers as $seller)
            <div class="border shadow-lg rounded-lg">
                <div class="px-12 py-2 flex items-center justify-between">
                    <img src="https://img.icons8.com/3d-fluency/70/null/shop.png" />
                    <h1 class="text-xl font-semibold text-center">{{ $seller->name }}</h1>
                    <a href="https://wa.me/{{ $seller->no_whatsapp }}" target="_blank"
                        class="hover:underline font-semibold text-md hover:text-emerald-400">{{ $seller->no_whatsapp }}</a>
                </div>
            </div>

        @empty
            <h2 class="font-bold text-2xl text-center">Belum ada penjual !</h2>
        @endforelse
    </div>
@endsection
